// ============================================================
// TradeNova — shared front-end behaviour (DEMO data only)
// ============================================================

document.addEventListener('DOMContentLoaded', () => {

  /* ---------- Mobile nav ---------- */
  const navToggle = document.querySelector('.nav-toggle');
  const mainNav = document.querySelector('.main-nav');
  if (navToggle && mainNav) {
    navToggle.addEventListener('click', () => {
      const open = mainNav.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', open);
    });
    mainNav.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
      mainNav.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
    }));
  }

  /* ---------- Reveal on scroll ---------- */
  const revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealEls.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.12 });
    revealEls.forEach(el => io.observe(el));
  } else {
    revealEls.forEach(el => el.classList.add('in'));
  }

  /* ---------- Mini sparklines (market cards) ---------- */
  function drawSparkline(svg) {
    const trend = svg.dataset.trend === 'down' ? -1 : 1;
    const points = 24;
    const w = 200, h = 60;
    let y = h / 2;
    const vals = [];
    for (let i = 0; i < points; i++) {
      y += (Math.random() - 0.42 * trend * -1) * 8;
      y = Math.max(6, Math.min(h - 6, y));
      vals.push(y);
    }
    // bias the overall direction
    const start = vals[0], end = trend > 0 ? Math.min(...vals) - 2 : Math.max(...vals) + 2;
    vals[vals.length - 1] = trend > 0 ? Math.min(...vals) - 4 : Math.max(...vals) + 4;
    const step = w / (points - 1);
    const path = vals.map((v, i) => `${i === 0 ? 'M' : 'L'} ${(i * step).toFixed(1)} ${v.toFixed(1)}`).join(' ');
    const color = trend > 0 ? 'var(--profit)' : 'var(--loss)';
    const areaPath = `${path} L ${w} ${h} L 0 ${h} Z`;
    const gradId = 'grad-' + Math.random().toString(36).slice(2, 8);
    svg.setAttribute('viewBox', `0 0 ${w} ${h}`);
    svg.innerHTML = `
      <defs>
        <linearGradient id="${gradId}" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="${color}" stop-opacity="0.35"/>
          <stop offset="100%" stop-color="${color}" stop-opacity="0"/>
        </linearGradient>
      </defs>
      <path d="${areaPath}" fill="url(#${gradId})" stroke="none"/>
      <path d="${path}" fill="none" stroke="${color}" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
    `;
  }
  document.querySelectorAll('.mini-chart').forEach(drawSparkline);

  /* ---------- Hero abstract candlestick backdrop ---------- */
  const heroBg = document.getElementById('heroChartBg');
  if (heroBg) {
    const w = 1200, h = 460, n = 46;
    let price = 220;
    let candles = [];
    for (let i = 0; i < n; i++) {
      const open = price;
      const drift = (Math.random() - 0.47) * 22;
      const close = open + drift;
      const high = Math.max(open, close) + Math.random() * 10;
      const low = Math.min(open, close) - Math.random() * 10;
      candles.push({ open, close, high, low });
      price = close;
    }
    const allVals = candles.flatMap(c => [c.high, c.low]);
    const min = Math.min(...allVals), max = Math.max(...allVals);
    const cw = w / n;
    const scaleY = v => h - ((v - min) / (max - min)) * h;
    let svg = `<svg viewBox="0 0 ${w} ${h}" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%;height:100%;">`;
    candles.forEach((c, i) => {
      const x = i * cw + cw / 2;
      const up = c.close >= c.open;
      const color = up ? '#22C55E' : '#EF4444';
      const bodyTop = scaleY(Math.max(c.open, c.close));
      const bodyBot = scaleY(Math.min(c.open, c.close));
      svg += `<line x1="${x}" y1="${scaleY(c.high)}" x2="${x}" y2="${scaleY(c.low)}" stroke="${color}" stroke-opacity="0.35" stroke-width="1"/>`;
      svg += `<rect x="${x - cw * 0.28}" y="${bodyTop}" width="${cw * 0.56}" height="${Math.max(2, bodyBot - bodyTop)}" fill="${color}" opacity="0.28" rx="1"/>`;
    });
    // overlay line
    let linePath = candles.map((c, i) => `${i === 0 ? 'M' : 'L'} ${(i * cw + cw / 2).toFixed(1)} ${scaleY(c.close).toFixed(1)}`).join(' ');
    svg += `<path d="${linePath}" fill="none" stroke="#3B82F6" stroke-width="1.4" stroke-opacity="0.55"/>`;
    svg += `</svg>`;
    heroBg.innerHTML = svg;
  }

  /* ---------- Main trading chart (candlestick + volume) ---------- */
  const mainChartCanvas = document.getElementById('mainChart');
  if (mainChartCanvas) {
    const ctx = mainChartCanvas.getContext('2d');

    function genCandles(n) {
      let price = 2840;
      const out = [];
      for (let i = 0; i < n; i++) {
        const open = price;
        const drift = (Math.random() - 0.48) * 26;
        const close = Math.max(10, open + drift);
        const high = Math.max(open, close) + Math.random() * 14;
        const low = Math.max(1, Math.min(open, close) - Math.random() * 14);
        const volume = 40 + Math.random() * 100;
        out.push({ open, close, high, low, volume });
        price = close;
      }
      return out;
    }

    let currentData = genCandles(60);

    function resizeCanvas() {
      const rect = mainChartCanvas.parentElement.getBoundingClientRect();
      const dpr = window.devicePixelRatio || 1;
      mainChartCanvas.width = rect.width * dpr;
      mainChartCanvas.height = 320 * dpr;
      mainChartCanvas.style.width = rect.width + 'px';
      mainChartCanvas.style.height = '320px';
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      render();
    }

    function render() {
      const w = mainChartCanvas.clientWidth;
      const h = 320;
      ctx.clearRect(0, 0, w, h);

      const data = currentData;
      const priceH = h * 0.72;
      const volH = h * 0.2;
      const volTop = priceH + 14;

      const highs = data.map(d => d.high), lows = data.map(d => d.low);
      const max = Math.max(...highs), min = Math.min(...lows);
      const maxVol = Math.max(...data.map(d => d.volume));

      const cw = w / data.length;
      const scaleY = v => 10 + priceH - ((v - min) / (max - min)) * (priceH - 20);

      // grid lines
      ctx.strokeStyle = 'rgba(148,163,184,0.08)';
      ctx.lineWidth = 1;
      for (let i = 0; i <= 4; i++) {
        const y = 10 + (priceH - 20) * (i / 4);
        ctx.beginPath(); ctx.moveTo(0, y); ctx.lineTo(w, y); ctx.stroke();
      }

      // candles
      data.forEach((c, i) => {
        const x = i * cw + cw / 2;
        const up = c.close >= c.open;
        ctx.strokeStyle = up ? '#22C55E' : '#EF4444';
        ctx.fillStyle = up ? '#22C55E' : '#EF4444';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(x, scaleY(c.high));
        ctx.lineTo(x, scaleY(c.low));
        ctx.stroke();
        const bodyTop = scaleY(Math.max(c.open, c.close));
        const bodyBot = scaleY(Math.min(c.open, c.close));
        ctx.fillRect(x - cw * 0.32, bodyTop, cw * 0.64, Math.max(1.5, bodyBot - bodyTop));
      });

      // volume bars
      data.forEach((c, i) => {
        const x = i * cw + cw / 2;
        const up = c.close >= c.open;
        const barH = (c.volume / maxVol) * volH;
        ctx.fillStyle = up ? 'rgba(34,197,94,0.35)' : 'rgba(239,68,68,0.35)';
        ctx.fillRect(x - cw * 0.32, volTop + (volH - barH), cw * 0.64, barH);
      });

      // last price line
      const last = data[data.length - 1];
      const lastY = scaleY(last.close);
      ctx.strokeStyle = 'rgba(59,130,246,0.6)';
      ctx.setLineDash([4, 4]);
      ctx.beginPath(); ctx.moveTo(0, lastY); ctx.lineTo(w, lastY); ctx.stroke();
      ctx.setLineDash([]);

      // update price readout
      const priceNow = document.getElementById('chartPriceNow');
      const priceChg = document.getElementById('chartPriceChg');
      if (priceNow) priceNow.textContent = '₹' + last.close.toFixed(2);
      if (priceChg) {
        const chg = ((last.close - data[0].open) / data[0].open) * 100;
        priceChg.textContent = (chg >= 0 ? '+' : '') + chg.toFixed(2) + '% today';
        priceChg.style.color = chg >= 0 ? 'var(--profit)' : 'var(--loss)';
      }
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    document.querySelectorAll('.tf-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.tf-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const counts = { '1D': 30, '1W': 42, '1M': 60, '1Y': 80, '5Y': 100 };
        currentData = genCandles(counts[btn.dataset.tf] || 60);
        render();
      });
    });
  }

  /* ---------- Allocation donut ---------- */
  const donut = document.getElementById('allocDonut');
  if (donut) {
    const segments = [
      { pct: 52, color: '#3B82F6' },
      { pct: 24, color: '#8B5CF6' },
      { pct: 16, color: '#22C55E' },
      { pct: 8, color: '#94A3B8' },
    ];
    const r = 80, cx = 100, cy = 100, sw = 26;
    const circumference = 2 * Math.PI * r;
    let offset = 0;
    let svg = `<svg viewBox="0 0 200 200" width="220" height="220">
      <circle cx="${cx}" cy="${cy}" r="${r}" fill="none" stroke="var(--bg-secondary)" stroke-width="${sw}"/>`;
    segments.forEach(seg => {
      const len = (seg.pct / 100) * circumference;
      svg += `<circle cx="${cx}" cy="${cy}" r="${r}" fill="none" stroke="${seg.color}" stroke-width="${sw}"
        stroke-dasharray="${len} ${circumference - len}" stroke-dashoffset="${-offset}"
        transform="rotate(-90 ${cx} ${cy})" stroke-linecap="butt"/>`;
      offset += len;
    });
    svg += `<text x="100" y="94" text-anchor="middle" font-family="JetBrains Mono, monospace" font-size="13" fill="var(--text-secondary)">Total</text>
      <text x="100" y="118" text-anchor="middle" font-family="Space Grotesk, sans-serif" font-size="22" font-weight="700" fill="var(--text)">₹8.45L</text>
    </svg>`;
    donut.innerHTML = svg;
  }

  /* ---------- Order tabs (Buy/Sell) ---------- */
  const buyTab = document.getElementById('tabBuy');
  const sellTab = document.getElementById('tabSell');
  const orderBtn = document.getElementById('orderSubmitBtn');
  if (buyTab && sellTab && orderBtn) {
    buyTab.addEventListener('click', () => {
      buyTab.classList.add('active'); sellTab.classList.remove('active');
      orderBtn.textContent = 'Place Demo Buy Order';
      orderBtn.className = 'btn btn-buy btn-block';
    });
    sellTab.addEventListener('click', () => {
      sellTab.classList.add('active'); buyTab.classList.remove('active');
      orderBtn.textContent = 'Place Demo Sell Order';
      orderBtn.className = 'btn btn-sell btn-block';
    });
    orderBtn.addEventListener('click', (e) => {
      e.preventDefault();
      orderBtn.textContent = '✓ Demo order simulated';
      setTimeout(() => {
        orderBtn.textContent = buyTab.classList.contains('active') ? 'Place Demo Buy Order' : 'Place Demo Sell Order';
      }, 1800);
    });
  }

  /* ---------- FAQ accordion ---------- */
  document.querySelectorAll('.faq-item').forEach(item => {
    const q = item.querySelector('.faq-q');
    q.addEventListener('click', () => item.classList.toggle('open'));
  });

  /* ---------- Contact form (demo) ---------- */
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      document.getElementById('formSuccess').classList.add('show');
      contactForm.reset();
    });
  }

});
