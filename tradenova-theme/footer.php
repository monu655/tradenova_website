<?php
/**
 * The footer for the TradeNova theme.
 *
 * @package TradeNova
 */
?>

<footer class="site-footer" id="colophon">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
          <span class="logo-mark">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 17L9 11L13 15L21 6" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 6H21V12" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
          <?php bloginfo( 'name' ); ?>
        </a>
        <p><?php echo esc_html( get_theme_mod( 'footer_tagline', 'A modern fintech concept for tracking markets and managing a portfolio from one screen. Demo interface — no real trades are placed.' ) ); ?></p>
        <div class="social-row">
          <a href="<?php echo esc_url( get_theme_mod( 'social_twitter', '#' ) ); ?>" aria-label="Twitter / X"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M21 4.6C20.3 4.9 19.5 5.2 18.7 5.3C19.6 4.7 20.2 3.9 20.5 2.9C19.7 3.4 18.8 3.7 17.9 3.9C17.1 3.1 16 2.6 14.8 2.6C12.5 2.6 10.6 4.5 10.6 6.8C10.6 7.1 10.6 7.4 10.7 7.7C7.3 7.6 4.2 5.9 2.2 3.4C1.8 4 1.6 4.7 1.6 5.5C1.6 6.9 2.3 8.1 3.4 8.8C2.7 8.8 2.1 8.6 1.6 8.3V8.4C1.6 10.4 3 12.1 4.9 12.5C4.5 12.6 4.2 12.6 3.8 12.6C3.5 12.6 3.3 12.6 3 12.5C3.5 14.2 5.1 15.4 6.9 15.4C5.5 16.5 3.7 17.2 1.8 17.2C1.5 17.2 1.2 17.2 0.9 17.1C2.7 18.3 4.9 19 7.2 19C14.8 19 19 12.7 19 7.2V6.7C19.8 6.1 20.5 5.4 21 4.6Z" fill="currentColor"/></svg></a>
          <a href="<?php echo esc_url( get_theme_mod( 'social_linkedin', '#' ) ); ?>" aria-label="LinkedIn"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="3" stroke="currentColor" stroke-width="1.6"/><path d="M7 10V17M7 7V7.01M12 17V13C12 11.3 13 10 14.5 10C16 10 17 11.3 17 13V17M12 10V17" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg></a>
          <a href="<?php echo esc_url( get_theme_mod( 'social_youtube', '#' ) ); ?>" aria-label="YouTube"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="4" stroke="currentColor" stroke-width="1.6"/><path d="M10 9.5L15 12L10 14.5V9.5Z" fill="currentColor"/></svg></a>
          <a href="<?php echo esc_url( get_theme_mod( 'social_instagram', '#' ) ); ?>" aria-label="Instagram"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6"/><circle cx="17.2" cy="6.8" r="1" fill="currentColor"/></svg></a>
        </div>
      </div>

      <div class="footer-col">
        <h4><?php esc_html_e( 'Markets', 'tradenova' ); ?></h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/#markets' ) ); ?>"><?php esc_html_e( 'Indices', 'tradenova' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#watchlist' ) ); ?>"><?php esc_html_e( 'Stocks', 'tradenova' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#watchlist' ) ); ?>"><?php esc_html_e( 'Crypto', 'tradenova' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#dashboard' ) ); ?>"><?php esc_html_e( 'Trading Dashboard', 'tradenova' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>"><?php esc_html_e( 'Portfolio', 'tradenova' ); ?></a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4><?php esc_html_e( 'Resources', 'tradenova' ); ?></h4>
        <?php if ( is_active_sidebar( 'footer-resources' ) ) : ?>
          <?php dynamic_sidebar( 'footer-resources' ); ?>
        <?php else : ?>
          <ul>
            <li><a href="<?php echo esc_url( get_post_type_archive_link( 'lesson' ) ); ?>"><?php esc_html_e( 'Education', 'tradenova' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'tradenova' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>"><?php esc_html_e( 'Pricing', 'tradenova' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'tradenova' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'tradenova' ); ?></a></li>
          </ul>
        <?php endif; ?>
      </div>

      <div class="footer-col">
        <h4><?php esc_html_e( 'Legal', 'tradenova' ); ?></h4>
        <?php
        if ( has_nav_menu( 'footer' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'footer',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
          ) );
        } else {
          ?>
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'tradenova' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'tradenova' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/risk-disclaimer/' ) ); ?>"><?php esc_html_e( 'Risk Disclaimer', 'tradenova' ); ?></a></li>
          </ul>
          <?php
        }
        ?>
      </div>
    </div>

    <div class="risk-disclaimer">
      <strong><?php esc_html_e( 'Risk disclaimer:', 'tradenova' ); ?></strong>
      <?php echo esc_html( get_theme_mod( 'risk_disclaimer', 'TradeNova is a demo interface built for portfolio and demonstration purposes. All prices, positions and transactions shown are simulated. Trading in financial markets involves risk, including loss of capital, and past performance does not guarantee future results. No returns are guaranteed.' ) ); ?>
    </div>

    <div class="footer-bottom">
      <p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'tradenova' ); ?></p>
      <p><?php esc_html_e( 'Design & concept for portfolio demonstration.', 'tradenova' ); ?></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
