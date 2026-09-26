<?php
/**
 * The header for the TradeNova theme.
 *
 * @package TradeNova
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="demo-banner">DEMO PLATFORM — for portfolio &amp; demonstration purposes only. No real trades or real money are involved.</div>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tradenova' ); ?></a>

<header class="site-header">
  <div class="header-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <span class="logo-mark">
          <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 17L9 11L13 15L21 6" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 6H21V12" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
      <?php endif; ?>
      <?php bloginfo( 'name' ); ?>
    </a>

    <nav class="main-nav" id="mainNav" aria-label="<?php esc_attr_e( 'Primary', 'tradenova' ); ?>">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '%3$s',
          'fallback_cb'    => false,
        ) );
      } else {
        // Fallback menu so the site is usable before a menu is assigned in Appearance → Menus.
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <a href="<?php echo esc_url( home_url( '/#markets' ) ); ?>">Markets</a>
        <a href="<?php echo esc_url( home_url( '/#watchlist' ) ); ?>">Stocks</a>
        <a href="<?php echo esc_url( home_url( '/#watchlist' ) ); ?>">Crypto</a>
        <a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>">Portfolio</a>
        <a href="<?php echo esc_url( home_url( '/#watchlist' ) ); ?>">Watchlist</a>
        <a href="<?php echo esc_url( home_url( '/#education' ) ); ?>">Education</a>
        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
        <?php
      }
      ?>
    </nav>

    <div class="header-actions">
      <button class="btn btn-secondary btn-sm" type="button"><?php esc_html_e( 'Log In', 'tradenova' ); ?></button>
      <button class="btn btn-primary btn-sm" type="button"><?php esc_html_e( 'Create Account', 'tradenova' ); ?></button>
      <button class="nav-toggle" id="navToggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'tradenova' ); ?>" aria-expanded="false">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 6H21M3 12H21M3 18H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
      </button>
    </div>
  </div>
</header>
