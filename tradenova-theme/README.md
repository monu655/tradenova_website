# TradeNova — WordPress Theme

A premium, dark-mode fintech/trading dashboard WordPress theme.

**Live Demo:** https://tradenovademo.rf.gd/wordpress/

> **Demo interface only** — no real trades, payments, or brokerage integrations are included anywhere in this theme.

## Install

1. Zip the `tradenova-theme` folder itself (not its contents) if it isn't already zipped, or upload this folder to `wp-content/themes/tradenova-theme/` via FTP/SFTP.

2. In wp-admin: **Appearance → Themes → Activate** TradeNova.

3. **Appearance → Menus**: create a menu with your desired links (Home, Markets, Stocks, Crypto, Portfolio, Watchlist, Education, About, Contact) and assign it to the **Primary Navigation** location. If you skip this, the theme falls back to a sensible default menu automatically.

4. **Settings → Permalinks**: click Save once (no change needed) so the Lesson archive (`/education/`) and post permalinks resolve correctly.

## Create the Required Pages

* Add a Page titled **About**, slug `about` → the theme automatically uses `page-about.php` for it. Anything you type in the page editor replaces the default "Our Concept" copy.

* Add a Page titled **Contact**, slug `contact` → uses `page-contact.php` automatically. The form emails whatever address is set in **Appearance → Customize → Footer & Legal → Support email**.

* In **Settings → Reading**, you can optionally set a "Posts page" for a dedicated `/blog/` page; otherwise blog posts are reachable from their own permalinks and the homepage Blog section.

## Editable from wp-admin (No Code Required)

* **Posts** (with Categories) → the homepage "Blog" section and the site blog. Add a featured image for the card thumbnail.

* **Education → Lessons** (custom post type, with Levels taxonomy: Beginner/Intermediate/Advanced) → the homepage "Education" section and `/education/` archive.

* **Appearance → Customize**

  * **Hero Section** — eyebrow, headline, subtitle, button labels
  * **Portfolio Demo Figures** — the four demo numbers shown in the dashboard/portfolio sections
  * **Footer & Legal** — tagline, risk disclaimer text, support email, office location
  * **Social Links** — Twitter/X, LinkedIn, YouTube, Instagram URLs

* **Appearance → Widgets → Footer Resources** (optional) — add widgets here to override the default "Resources" footer links.

* **Appearance → Menus → Footer Links** (optional) — a second menu location for the footer "Legal" column (Privacy Policy, Terms, Risk Disclaimer, etc.) once you've created those pages.

## What's Demo Data (By Design)

Market prices, the ticker, the watchlist, open positions and recent transactions on the homepage are illustrative numbers, not a live feed.

This is a portfolio/demo interface and must not process real financial transactions. Wiring these to a real market-data API or brokerage is intentionally left out of scope.

## File Map

```text
tradenova-theme/

├── style.css               # Theme header (required by WP)
├── functions.php           # Setup, enqueue, CPT, taxonomy, default terms
├── header.php / footer.php # Shared chrome
├── front-page.php          # Homepage (hero → pricing)
├── page-about.php          # /about/
├── page-contact.php        # /contact/ (real contact form)
├── page.php                # Fallback for any other WP page
├── single.php              # Single blog post & single lesson
├── archive.php             # Blog category archive & /education/ archive
├── index.php               # Required fallback template
│
├── inc/
│   ├── customizer.php      # Appearance → Customize settings
│   ├── contact-form.php    # admin-post.php handler + wp_mail()
│   └── template-tags.php   # Small helper functions
│
└── assets/
    ├── css/tradenova.css   # Full design system (all component styles)
    └── js/app.js           # Sparklines, candlestick chart, donut, tabs, FAQ
```

## Live Demo

**TradeNova WordPress Demo:**
https://tradenovademo.rf.gd/wordpress/

The live demo showcases the complete TradeNova interface, including the dark-mode trading dashboard, market sections, portfolio interface, education section, blog, contact page and responsive layout.

## Disclaimer

TradeNova is a demonstration WordPress theme created for portfolio and development purposes.

All market prices, portfolio figures, charts, watchlists, positions and transaction data shown in the demo are illustrative only and do not represent real financial data or transactions.

No brokerage, payment processing or real trading functionality is included.
