<?php
/**
 * The front page template for TradeNova.
 *
 * Market prices, watchlist rows, positions and transactions are shown
 * as illustrative DEMO data. Education and Blog sections pull real
 * content from the WordPress admin (Lessons CPT and Posts).
 *
 * @package TradeNova
 */

get_header();
?>

<main id="primary">

<!-- ============ HERO ============ -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-chart-bg" id="heroChartBg"></div>
  <div class="hero-inner">
    <div class="hero-content">
      <div class="eyebrow"><?php echo esc_html( get_theme_mod( 'hero_eyebrow', 'Live demo · NSE · NASDAQ · Crypto' ) ); ?></div>
      <h1><?php echo wp_kses_post( get_theme_mod( 'hero_headline', 'Trade Smarter. Invest With Confidence.' ) ); ?></h1>
      <p class="hero-sub"><?php echo esc_html( get_theme_mod( 'hero_subtitle', 'Track markets, analyze opportunities and manage your portfolio from one powerful platform.' ) ); ?></p>
      <div class="hero-ctas">
        <a href="#markets" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'hero_cta_primary', 'Explore Markets' ) ); ?></a>
        <a href="#dashboard" class="btn btn-secondary"><?php echo esc_html( get_theme_mod( 'hero_cta_secondary', 'View Demo' ) ); ?></a>
      </div>
      <div class="hero-note"><span class="dot"></span> <?php esc_html_e( 'Markets open · Data simulated for demo purposes', 'tradenova' ); ?></div>
    </div>
  </div>

  <div class="ticker-wrap" aria-label="<?php esc_attr_e( 'Live market ticker', 'tradenova' ); ?>">
    <div class="ticker-track" id="tickerTrack"></div>
  </div>
</section>

<!-- ============ MARKET OVERVIEW ============ -->
<section class="section" id="markets">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <div class="eyebrow"><?php esc_html_e( 'Market Overview', 'tradenova' ); ?></div>
        <h2><?php esc_html_e( "Today's market snapshot", 'tradenova' ); ?></h2>
        <p><?php esc_html_e( 'A quick read on the indices and assets that move your portfolio.', 'tradenova' ); ?></p>
      </div>
      <a href="#watchlist" class="pill-link"><?php esc_html_e( 'Open full watchlist', 'tradenova' ); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>

    <div class="market-grid reveal">
      <?php
      $markets = array(
        array( 'NIFTY 50', 'NSE Index', '24,812.35', '+0.84%', 'up' ),
        array( 'SENSEX', 'BSE Index', '81,467.90', '+0.71%', 'up' ),
        array( 'NASDAQ', 'US Composite', '19,285.10', '-0.42%', 'down' ),
        array( 'S&amp;P 500', 'US Index', '5,822.64', '+0.18%', 'up' ),
        array( 'BTC', 'Bitcoin · USD', '$67,240', '+2.14%', 'up' ),
        array( 'ETH', 'Ethereum · USD', '$3,412', '-1.05%', 'down' ),
      );
      foreach ( $markets as $m ) :
        list( $sym, $name, $val, $chg, $trend ) = $m;
        ?>
        <div class="market-card">
          <div class="market-card-top">
            <div><div class="market-card-sym"><?php echo wp_kses_post( $sym ); ?></div><div class="market-card-name"><?php echo esc_html( $name ); ?></div></div>
            <span class="badge <?php echo esc_attr( $trend ); ?>"><?php echo esc_html( $chg ); ?></span>
          </div>
          <div class="market-card-val"><?php echo esc_html( $val ); ?></div>
          <svg class="mini-chart" data-trend="<?php echo esc_attr( $trend ); ?>"></svg>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ TRADING DASHBOARD ============ -->
<section class="section" id="dashboard" style="background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <div class="eyebrow"><?php esc_html_e( 'Trading Dashboard', 'tradenova' ); ?></div>
        <h2><?php esc_html_e( 'Everything you need, one screen', 'tradenova' ); ?></h2>
        <p><?php esc_html_e( 'Watchlist, live chart, positions and order entry — a real terminal layout, sample data only.', 'tradenova' ); ?></p>
      </div>
    </div>

    <div class="dashboard-grid reveal">
      <!-- Watchlist -->
      <div class="panel" id="watchlist">
        <div class="panel-head">
          <h3><?php esc_html_e( 'Market Watchlist', 'tradenova' ); ?></h3>
          <span class="status"><span class="dash-dot"></span><?php esc_html_e( 'Live', 'tradenova' ); ?></span>
        </div>
        <div class="panel-body">
          <?php
          $watchlist = array(
            array( 'RELIANCE', 'NSE · Open', '₹2,946.10', '+1.24%', 'up' ),
            array( 'TCS', 'NSE · Open', '₹4,152.55', '-0.38%', 'down' ),
            array( 'HDFC BANK', 'NSE · Open', '₹1,678.30', '+0.62%', 'up' ),
            array( 'INFOSYS', 'NSE · Open', '₹1,842.75', '+0.91%', 'up' ),
            array( 'ICICI BANK', 'NSE · Open', '₹1,214.90', '-0.15%', 'down' ),
            array( 'TATA MOTORS', 'NSE · Open', '₹968.45', '+2.08%', 'up' ),
            array( 'BTC', 'Crypto · 24h', '$67,240', '+2.14%', 'up' ),
            array( 'ETH', 'Crypto · 24h', '$3,412', '-1.05%', 'down' ),
          );
          foreach ( $watchlist as $w ) :
            list( $sym, $status, $price, $chg, $trend ) = $w;
            ?>
            <div class="watchlist-row">
              <div class="wl-left"><span class="wl-sym"><?php echo esc_html( $sym ); ?></span><span class="wl-status"><?php echo esc_html( $status ); ?></span></div>
              <div class="wl-right"><div class="wl-price"><?php echo esc_html( $price ); ?></div><div class="wl-chg <?php echo esc_attr( $trend ); ?>"><?php echo esc_html( $chg ); ?></div></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Chart -->
      <div class="panel">
        <div class="panel-head">
          <h3><?php esc_html_e( 'RELIANCE · NSE', 'tradenova' ); ?></h3>
          <span class="status"><span class="dash-dot"></span><?php esc_html_e( 'Market open', 'tradenova' ); ?></span>
        </div>
        <div class="panel-body">
          <div class="chart-toolbar">
            <div class="tf-group">
              <button class="tf-btn" data-tf="1D">1D</button>
              <button class="tf-btn" data-tf="1W">1W</button>
              <button class="tf-btn active" data-tf="1M">1M</button>
              <button class="tf-btn" data-tf="1Y">1Y</button>
              <button class="tf-btn" data-tf="5Y">5Y</button>
            </div>
            <div class="chart-tools">
              <button type="button"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 17L9 11L13 15L21 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php esc_html_e( 'Indicators', 'tradenova' ); ?></button>
              <button type="button"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 7V3M16 7V3M4 11H20M6 5H18C19.1 5 20 5.9 20 7V19C20 20.1 19.1 21 18 21H6C4.9 21 4 20.1 4 19V7C4 5.9 4.9 5 6 5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php esc_html_e( 'Compare', 'tradenova' ); ?></button>
              <button type="button"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 3H5C3.9 3 3 3.9 3 5V8M16 3H19C20.1 3 21 3.9 21 5V8M8 21H5C3.9 21 3 20.1 3 19V16M16 21H19C20.1 21 21 20.1 21 19V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php esc_html_e( 'Fullscreen', 'tradenova' ); ?></button>
            </div>
          </div>
          <div class="chart-canvas-wrap">
            <div>
              <span class="chart-price-now" id="chartPriceNow">₹2,946.10</span>
              <div class="chart-price-chg" id="chartPriceChg">+1.24% today</div>
            </div>
            <canvas id="mainChart" style="margin-top:8px;"></canvas>
          </div>
        </div>
      </div>

      <!-- Right column -->
      <div style="display:flex; flex-direction:column; gap:16px;">
        <div class="panel">
          <div class="panel-head"><h3><?php esc_html_e( 'Portfolio Summary', 'tradenova' ); ?></h3></div>
          <div class="panel-body">
            <div class="summary-row"><span class="summary-label"><?php esc_html_e( 'Portfolio Value', 'tradenova' ); ?></span><span class="summary-val"><?php echo esc_html( get_theme_mod( 'portfolio_value', '₹8,45,250' ) ); ?></span></div>
            <div class="summary-row"><span class="summary-label"><?php esc_html_e( "Today's P&L", 'tradenova' ); ?></span><span class="summary-val up"><?php echo esc_html( get_theme_mod( 'portfolio_today_pl', '+₹12,450' ) ); ?></span></div>
            <div class="divider"></div>
            <div class="summary-row"><span class="summary-label"><?php esc_html_e( 'Total Returns', 'tradenova' ); ?></span><span class="summary-val up"><?php echo esc_html( get_theme_mod( 'portfolio_returns', '+18.6%' ) ); ?></span></div>
            <div class="summary-row"><span class="summary-label"><?php esc_html_e( 'Available Balance', 'tradenova' ); ?></span><span class="summary-val"><?php echo esc_html( get_theme_mod( 'portfolio_balance', '₹64,120' ) ); ?></span></div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-head"><h3><?php esc_html_e( 'Open Positions', 'tradenova' ); ?></h3></div>
          <div class="panel-body">
            <div class="position-row"><div class="position-top"><span>RELIANCE</span><span style="color:var(--profit)">+₹4,120</span></div><div class="position-bottom"><span>24 shares · Avg ₹2,774</span><span>+6.2%</span></div></div>
            <div class="position-row"><div class="position-top"><span>TCS</span><span style="color:var(--loss)">-₹860</span></div><div class="position-bottom"><span>8 shares · Avg ₹4,260</span><span>-2.6%</span></div></div>
            <div class="position-row"><div class="position-top"><span>BTC</span><span style="color:var(--profit)">+₹9,340</span></div><div class="position-bottom"><span>0.12 BTC · Avg $59,100</span><span>+13.7%</span></div></div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-head"><h3><?php esc_html_e( 'Recent Transactions', 'tradenova' ); ?></h3></div>
          <div class="panel-body">
            <div class="txn-row"><span class="txn-badge buy">Buy</span><div class="txn-meta"><div class="txn-sym">RELIANCE</div><div class="txn-time">Today · 10:42 AM</div></div><span class="txn-amt">₹29,461</span></div>
            <div class="txn-row"><span class="txn-badge sell">Sell</span><div class="txn-meta"><div class="txn-sym">INFOSYS</div><div class="txn-time">Today · 9:58 AM</div></div><span class="txn-amt">₹9,214</span></div>
            <div class="txn-row"><span class="txn-badge buy">Buy</span><div class="txn-meta"><div class="txn-sym">ETH</div><div class="txn-time">Yesterday · 6:20 PM</div></div><span class="txn-amt">₹28,940</span></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Trading Panel -->
    <div class="reveal" style="margin-top:16px;">
      <div class="panel" style="max-width:480px;">
        <div class="panel-head"><h3><?php esc_html_e( 'Trading Panel', 'tradenova' ); ?></h3><span class="dash-tag" style="margin:0;"><?php esc_html_e( 'Demo only', 'tradenova' ); ?></span></div>
        <div class="panel-body">
          <div class="order-tabs">
            <button type="button" class="order-tab buy active" id="tabBuy">BUY</button>
            <button type="button" class="order-tab sell" id="tabSell">SELL</button>
          </div>
          <div class="field">
            <label for="ordAsset"><?php esc_html_e( 'Asset', 'tradenova' ); ?></label>
            <select id="ordAsset" class="field-input">
              <option>RELIANCE</option><option>TCS</option><option>HDFC BANK</option><option>INFOSYS</option><option>BTC</option><option>ETH</option>
            </select>
          </div>
          <div class="field-row">
            <div class="field"><label for="ordType"><?php esc_html_e( 'Order Type', 'tradenova' ); ?></label>
              <select id="ordType" class="field-input"><option>Market</option><option>Limit</option><option>Stop</option></select>
            </div>
            <div class="field"><label for="ordQty"><?php esc_html_e( 'Quantity', 'tradenova' ); ?></label><input id="ordQty" class="field-input" type="number" value="10" min="1"></div>
          </div>
          <div class="field-row">
            <div class="field"><label for="ordPrice"><?php esc_html_e( 'Price', 'tradenova' ); ?></label><input id="ordPrice" class="field-input" type="text" value="2,946.10"></div>
            <div class="field"><label for="ordSL"><?php esc_html_e( 'Stop Loss', 'tradenova' ); ?></label><input id="ordSL" class="field-input" type="text" value="2,850.00"></div>
          </div>
          <div class="field">
            <label for="ordTgt"><?php esc_html_e( 'Target Price', 'tradenova' ); ?></label><input id="ordTgt" class="field-input" type="text" value="3,080.00">
          </div>
          <button class="btn btn-buy btn-block" id="orderSubmitBtn"><?php esc_html_e( 'Place Demo Buy Order', 'tradenova' ); ?></button>
          <div class="demo-note">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8V13M12 16H12.01M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="currentColor" stroke-width="1.7"/></svg>
            <?php esc_html_e( 'This is a DEMO interface only. No real financial transactions or real money are processed.', 'tradenova' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ PORTFOLIO ============ -->
<section class="section" id="portfolio">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <div class="eyebrow"><?php esc_html_e( 'Portfolio', 'tradenova' ); ?></div>
        <h2><?php esc_html_e( 'Your holdings, at a glance', 'tradenova' ); ?></h2>
        <p><?php esc_html_e( 'Track performance and allocation across every asset class in one view.', 'tradenova' ); ?></p>
      </div>
    </div>

    <div class="portfolio-stats reveal">
      <div class="stat-card"><div class="label"><?php esc_html_e( 'Portfolio Value', 'tradenova' ); ?></div><div class="value"><?php echo esc_html( get_theme_mod( 'portfolio_value', '₹8,45,250' ) ); ?></div><div class="sub"><?php esc_html_e( 'as of today, 2:40 PM', 'tradenova' ); ?></div></div>
      <div class="stat-card"><div class="label"><?php esc_html_e( "Today's P&L", 'tradenova' ); ?></div><div class="value up"><?php echo esc_html( get_theme_mod( 'portfolio_today_pl', '+₹12,450' ) ); ?></div><div class="sub">+1.49% today</div></div>
      <div class="stat-card"><div class="label"><?php esc_html_e( 'Total Returns', 'tradenova' ); ?></div><div class="value up"><?php echo esc_html( get_theme_mod( 'portfolio_returns', '+18.6%' ) ); ?></div><div class="sub"><?php esc_html_e( 'since inception', 'tradenova' ); ?></div></div>
      <div class="stat-card"><div class="label"><?php esc_html_e( 'Available Balance', 'tradenova' ); ?></div><div class="value"><?php echo esc_html( get_theme_mod( 'portfolio_balance', '₹64,120' ) ); ?></div><div class="sub"><?php esc_html_e( 'ready to deploy', 'tradenova' ); ?></div></div>
    </div>

    <div class="panel reveal" style="padding:32px;">
      <h3 style="margin-bottom:24px; font-size:16px;"><?php esc_html_e( 'Asset Allocation', 'tradenova' ); ?></h3>
      <div class="allocation-wrap">
        <div id="allocDonut" style="display:flex; justify-content:center;"></div>
        <div class="alloc-legend">
          <div class="alloc-item"><span class="alloc-dot" style="background:#3B82F6;"></span><span class="alloc-name"><?php esc_html_e( 'Stocks', 'tradenova' ); ?></span><span class="alloc-pct">52%</span></div>
          <div class="alloc-item"><span class="alloc-dot" style="background:#8B5CF6;"></span><span class="alloc-name"><?php esc_html_e( 'Crypto', 'tradenova' ); ?></span><span class="alloc-pct">24%</span></div>
          <div class="alloc-item"><span class="alloc-dot" style="background:#22C55E;"></span><span class="alloc-name"><?php esc_html_e( 'Mutual Funds', 'tradenova' ); ?></span><span class="alloc-pct">16%</span></div>
          <div class="alloc-item"><span class="alloc-dot" style="background:#94A3B8;"></span><span class="alloc-name"><?php esc_html_e( 'Cash', 'tradenova' ); ?></span><span class="alloc-pct">8%</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ FEATURES ============ -->
<section class="section" style="background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="section-head reveal">
      <div><div class="eyebrow"><?php esc_html_e( 'Features', 'tradenova' ); ?></div><h2><?php esc_html_e( 'Built for how you actually trade', 'tradenova' ); ?></h2></div>
    </div>
    <div class="grid-3 reveal">
      <?php
      $features = array(
        array( 'Real-Time Market Tracking', 'Live prices across NSE, US indices and major crypto — updated continuously, no refresh needed.', '<path d="M3 3V21H21M7 15L11 10L14 13L20 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>' ),
        array( 'Advanced Charts', 'Candlestick charts with volume, indicators and multi-timeframe views built for real analysis.', '<rect x="3" y="10" width="4" height="11" stroke="currentColor" stroke-width="2"/><rect x="10" y="4" width="4" height="17" stroke="currentColor" stroke-width="2"/><rect x="17" y="7" width="4" height="14" stroke="currentColor" stroke-width="2"/>' ),
        array( 'Portfolio Analytics', 'Understand your allocation, returns and risk exposure with clear, honest breakdowns.', '<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><path d="M12 7V12L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>' ),
        array( 'Watchlists', "Build focused lists for stocks, crypto or sectors you're tracking closely.", '<path d="M12 2L4 6V12C4 16.4 7.4 20.5 12 22C16.6 20.5 20 16.4 20 12V6L12 2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>' ),
        array( 'Market Insights', "Concise notes on what's moving markets, without the noise or hype.", '<path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>' ),
        array( 'Risk Management', 'Set stop-loss and target levels on every order to keep risk in check.', '<path d="M12 22C17 20 20 16 20 11V5L12 2L4 5V11C4 16 7 20 12 22Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>' ),
      );
      foreach ( $features as $f ) : ?>
        <div class="feature-card">
          <div class="feature-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><?php echo $f[2]; // phpcs:ignore -- static trusted SVG markup ?></svg></div>
          <h3><?php echo esc_html( $f[0] ); ?></h3><p><?php echo esc_html( $f[1] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ WHY TRADENOVA ============ -->
<section class="section">
  <div class="container">
    <div class="why-wrap">
      <div class="reveal">
        <div class="eyebrow"><?php esc_html_e( 'Why TradeNova', 'tradenova' ); ?></div>
        <h2 style="font-size:clamp(26px,3vw,36px); margin-bottom:28px;"><?php esc_html_e( 'Serious tools, without the learning curve', 'tradenova' ); ?></h2>
        <div class="why-list">
          <?php
          $why = array(
            array( 'Simple trading experience', "A clean order flow that gets out of your way." ),
            array( 'Powerful analytics', 'Portfolio and market data broken down clearly.' ),
            array( 'Secure platform', 'Built with security-conscious practices throughout.' ),
            array( 'Fast market information', 'Live-feeling data with minimal latency in the UI.' ),
            array( 'Professional tools', 'Charting and order tools modeled on real terminals.' ),
            array( 'Beginner-friendly interface', 'Approachable for a first-time investor, powerful enough for a pro.' ),
          );
          foreach ( $why as $i => $w ) : ?>
            <div class="why-item"><div class="why-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></div><div><h4><?php echo esc_html( $w[0] ); ?></h4><p><?php echo esc_html( $w[1] ); ?></p></div></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="why-visual reveal">
        <div class="dash-tag"><?php esc_html_e( 'Live snapshot', 'tradenova' ); ?></div>
        <div style="display:flex; justify-content:space-between; align-items:baseline; margin-bottom:6px;">
          <span class="mono" style="font-size:28px; font-weight:700;"><?php echo esc_html( get_theme_mod( 'portfolio_value', '₹8,45,250' ) ); ?></span>
          <span class="badge up"><?php echo esc_html( get_theme_mod( 'portfolio_returns', '+18.6%' ) ); ?></span>
        </div>
        <p style="color:var(--text-secondary); font-size:13px; margin-bottom:22px;"><?php esc_html_e( 'Portfolio value, all accounts', 'tradenova' ); ?></p>
        <svg viewBox="0 0 400 140" width="100%" height="140" aria-hidden="true">
          <defs><linearGradient id="whyGrad" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#3B82F6" stop-opacity="0.35"/><stop offset="100%" stop-color="#3B82F6" stop-opacity="0"/></linearGradient></defs>
          <path d="M0 110 L40 95 L80 100 L120 70 L160 80 L200 55 L240 60 L280 35 L320 42 L360 18 L400 25 L400 140 L0 140 Z" fill="url(#whyGrad)"/>
          <path d="M0 110 L40 95 L80 100 L120 70 L160 80 L200 55 L240 60 L280 35 L320 42 L360 18 L400 25" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
  </div>
</section>

<!-- ============ EDUCATION (Lesson CPT — admin editable) ============ -->
<section class="section" id="education" style="background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="section-head reveal">
      <div><div class="eyebrow"><?php esc_html_e( 'Education', 'tradenova' ); ?></div><h2><?php esc_html_e( 'Learn before you deploy capital', 'tradenova' ); ?></h2></div>
    </div>
    <div class="grid-3 reveal">
      <?php
      $lessons_query = new WP_Query( array(
        'post_type'      => 'lesson',
        'posts_per_page' => 6,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
      ) );

      if ( $lessons_query->have_posts() ) :
        while ( $lessons_query->have_posts() ) : $lessons_query->the_post();
          $levels = get_the_terms( get_the_ID(), 'lesson_level' );
          $level  = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : __( 'Beginner', 'tradenova' );
          ?>
          <a href="<?php the_permalink(); ?>" class="edu-card" style="text-decoration:none; color:inherit;">
            <span class="edu-level"><?php echo esc_html( $level ); ?></span>
            <h3><?php the_title(); ?></h3>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
            <div class="edu-meta"><span><?php esc_html_e( 'Lesson', 'tradenova' ); ?></span><span><?php echo esc_html( get_the_date() ); ?></span></div>
          </a>
        <?php endwhile;
        wp_reset_postdata();
      else :
        // Fallback demo cards shown until lessons are added in the admin.
        $demo_lessons = array(
          array( 'Beginner', 'Stock Market Basics', 'How markets work, order types, and the vocabulary you need to get started.' ),
          array( 'Intermediate', 'Technical Analysis', 'Reading charts, trends and indicators to inform entry and exit decisions.' ),
          array( 'Intermediate', 'Candlestick Patterns', 'The common candlestick formations and what they typically signal.' ),
          array( 'Beginner', 'Risk Management', 'Position sizing, stop-losses and protecting capital on every trade.' ),
          array( 'Advanced', 'Portfolio Management', 'Diversification, rebalancing and thinking in allocations, not single trades.' ),
          array( 'Advanced', 'Trading Psychology', 'Managing emotion, discipline and bias in high-pressure decisions.' ),
        );
        foreach ( $demo_lessons as $l ) : ?>
          <div class="edu-card"><span class="edu-level"><?php echo esc_html( $l[0] ); ?></span><h3><?php echo esc_html( $l[1] ); ?></h3><p><?php echo esc_html( $l[2] ); ?></p><div class="edu-meta"><span><?php esc_html_e( 'Lesson', 'tradenova' ); ?></span><span><?php esc_html_e( 'Add via Education in wp-admin', 'tradenova' ); ?></span></div></div>
        <?php endforeach;
      endif;
      ?>
    </div>
  </div>
</section>

<!-- ============ BLOG (native posts — admin editable) ============ -->
<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <div><div class="eyebrow"><?php esc_html_e( 'From the Blog', 'tradenova' ); ?></div><h2><?php esc_html_e( 'Notes on markets & investing', 'tradenova' ); ?></h2></div>
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>" class="pill-link"><?php esc_html_e( 'View all articles', 'tradenova' ); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
    <div class="grid-2 reveal" style="grid-template-columns:repeat(4,1fr);">
      <?php
      $blog_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4 ) );
      if ( $blog_query->have_posts() ) :
        while ( $blog_query->have_posts() ) : $blog_query->the_post();
          $cats = get_the_category();
          $cat  = ! empty( $cats ) ? $cats[0]->name : __( 'Market Insights', 'tradenova' );
          ?>
          <article class="blog-card">
            <a href="<?php the_permalink(); ?>" class="blog-thumb" style="text-decoration:none;">
              <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); else : ?>
                <svg width="46" height="46" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="10" width="4" height="11" stroke="#3B82F6" stroke-width="1.6"/><rect x="10" y="4" width="4" height="17" stroke="#3B82F6" stroke-width="1.6"/><rect x="17" y="7" width="4" height="14" stroke="#3B82F6" stroke-width="1.6"/></svg>
              <?php endif; ?>
            </a>
            <div class="blog-body">
              <span class="blog-cat"><?php echo esc_html( $cat ); ?></span>
              <h3><a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a></h3>
              <span class="blog-meta"><?php echo esc_html( tradenova_reading_time() ); ?> min read · <?php echo esc_html( get_the_date() ); ?></span>
            </div>
          </article>
        <?php endwhile;
        wp_reset_postdata();
      else :
        $demo_posts = array(
          array( 'Technical Analysis', 'How to Read a Candlestick Chart', '6' ),
          array( 'Strategy', 'Understanding Support and Resistance', '5' ),
          array( 'Getting Started', "Beginner's Guide to Stock Investing", '8' ),
          array( 'Risk', 'How to Manage Trading Risk', '7' ),
        );
        foreach ( $demo_posts as $p ) : ?>
          <article class="blog-card">
            <div class="blog-thumb"><svg width="46" height="46" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="10" width="4" height="11" stroke="#3B82F6" stroke-width="1.6"/><rect x="10" y="4" width="4" height="17" stroke="#3B82F6" stroke-width="1.6"/><rect x="17" y="7" width="4" height="14" stroke="#3B82F6" stroke-width="1.6"/></svg></div>
            <div class="blog-body"><span class="blog-cat"><?php echo esc_html( $p[0] ); ?></span><h3><?php echo esc_html( $p[1] ); ?></h3><span class="blog-meta"><?php echo esc_html( $p[2] ); ?> min read · <?php esc_html_e( 'Add via Posts in wp-admin', 'tradenova' ); ?></span></div>
          </article>
        <?php endforeach;
      endif;
      ?>
    </div>
  </div>
</section>

<!-- ============ PRICING ============ -->
<section class="section" id="pricing" style="background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="section-head reveal" style="justify-content:center; text-align:center; flex-direction:column; align-items:center;">
      <div class="eyebrow"><?php esc_html_e( 'Pricing', 'tradenova' ); ?></div>
      <h2><?php esc_html_e( 'Start free, upgrade when you need more', 'tradenova' ); ?></h2>
    </div>
    <div class="pricing-grid reveal">
      <div class="price-card">
        <h3><?php esc_html_e( 'Free', 'tradenova' ); ?></h3>
        <div class="price-amt">₹0<span>/month</span></div>
        <p class="price-desc"><?php esc_html_e( 'For anyone getting started with the markets.', 'tradenova' ); ?></p>
        <ul class="price-features">
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Market Watchlist', 'tradenova' ); ?></li>
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Basic Charts', 'tradenova' ); ?></li>
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Portfolio Tracking', 'tradenova' ); ?></li>
        </ul>
        <button class="btn btn-secondary btn-block"><?php esc_html_e( 'Get Started', 'tradenova' ); ?></button>
      </div>
      <div class="price-card featured">
        <span class="price-featured-tag"><?php esc_html_e( 'Most Popular', 'tradenova' ); ?></span>
        <h3><?php esc_html_e( 'Pro', 'tradenova' ); ?></h3>
        <div class="price-amt">₹499<span>/month</span></div>
        <p class="price-desc"><?php esc_html_e( 'For active traders who want deeper analysis.', 'tradenova' ); ?></p>
        <ul class="price-features">
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Advanced Charts', 'tradenova' ); ?></li>
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Advanced Analytics', 'tradenova' ); ?></li>
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Multiple Watchlists', 'tradenova' ); ?></li>
        </ul>
        <button class="btn btn-primary btn-block"><?php esc_html_e( 'Upgrade to Pro', 'tradenova' ); ?></button>
      </div>
      <div class="price-card">
        <h3><?php esc_html_e( 'Premium', 'tradenova' ); ?></h3>
        <div class="price-amt">₹999<span>/month</span></div>
        <p class="price-desc"><?php esc_html_e( 'For serious investors managing larger portfolios.', 'tradenova' ); ?></p>
        <ul class="price-features">
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Advanced Market Insights', 'tradenova' ); ?></li>
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Portfolio Analytics', 'tradenova' ); ?></li>
          <li><?php echo tradenova_check_icon(); ?> <?php esc_html_e( 'Priority Support', 'tradenova' ); ?></li>
        </ul>
        <button class="btn btn-secondary btn-block"><?php esc_html_e( 'Go Premium', 'tradenova' ); ?></button>
      </div>
    </div>
  </div>
</section>

<!-- ============ CTA ============ -->
<section class="cta-band">
  <div class="container">
    <h2><?php esc_html_e( 'See your portfolio the way it deserves to be seen', 'tradenova' ); ?></h2>
    <p><?php esc_html_e( 'Explore the full demo dashboard — no signup required.', 'tradenova' ); ?></p>
    <div class="hero-ctas">
      <a href="#dashboard" class="btn btn-primary"><?php esc_html_e( 'View Demo', 'tradenova' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary"><?php esc_html_e( 'Talk to Us', 'tradenova' ); ?></a>
    </div>
  </div>
</section>

</main>

<script>
  // Live market ticker (illustrative demo data, duplicated for a seamless marquee).
  document.addEventListener('DOMContentLoaded', function () {
    var tickerData = [
      { sym: 'NIFTY 50', val: '24,812.35', chg: '+0.84%', up: true },
      { sym: 'SENSEX', val: '81,467.90', chg: '+0.71%', up: true },
      { sym: 'NASDAQ', val: '19,285.10', chg: '-0.42%', up: false },
      { sym: 'S&P 500', val: '5,822.64', chg: '+0.18%', up: true },
      { sym: 'BTC', val: '$67,240', chg: '+2.14%', up: true },
      { sym: 'ETH', val: '$3,412', chg: '-1.05%', up: false }
    ];
    var track = document.getElementById('tickerTrack');
    if (track) {
      var html = tickerData.map(function (t) {
        return '<div class="ticker-item"><span class="sym">' + t.sym + '</span><span class="val">' + t.val + '</span><span class="chg ' + (t.up ? 'up' : 'down') + '">' + t.chg + '</span></div>';
      }).join('');
      track.innerHTML = html + html;
    }
  });
</script>

<?php get_footer(); ?>
