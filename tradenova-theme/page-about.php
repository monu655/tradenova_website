<?php
/**
 * Template Name: About TradeNova
 * Description: Used automatically for a page with the slug "about",
 * or assignable to any page from the WordPress editor's Template panel.
 *
 * @package TradeNova
 */

get_header();
?>

<main id="primary">

<section class="page-hero">
  <div class="container">
    <div class="eyebrow" style="justify-content:center;"><?php esc_html_e( 'About TradeNova', 'tradenova' ); ?></div>
    <?php
    while ( have_posts() ) : the_post();
      the_title( '<h1>', '</h1>' );
    endwhile;
    wp_reset_postdata();
    ?>
    <p><?php esc_html_e( 'TradeNova is a modern financial technology concept focused on making market analysis and portfolio tracking simple — built as a demo platform, not a live brokerage.', 'tradenova' ); ?></p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="about-grid">
      <div class="reveal">
        <div class="eyebrow"><?php esc_html_e( 'Our Concept', 'tradenova' ); ?></div>
        <h2 style="font-size:clamp(26px,3vw,36px); margin-bottom:16px;"><?php esc_html_e( 'Built for clarity, not clutter', 'tradenova' ); ?></h2>

        <?php
        // If the admin has written page content in the editor, show it here;
        // otherwise fall back to the default demo copy.
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            if ( trim( get_the_content() ) !== '' ) :
              the_content();
            else :
              ?>
              <p style="color:var(--text-secondary); margin-bottom:16px;"><?php esc_html_e( "Most trading interfaces try to show everything at once. TradeNova starts from the opposite question: what does a person actually need to see to make a confident decision? The result is a dashboard that favors clean typography, calm color use and information that's grouped the way you actually think about your money — by market, by position, by risk.", 'tradenova' ); ?></p>
              <p style="color:var(--text-secondary);"><?php esc_html_e( 'This site is presented as a design and engineering concept for a fintech dashboard experience — every price, position and transaction shown across the platform is simulated demo data.', 'tradenova' ); ?></p>
              <?php
            endif;
          endwhile;
          wp_reset_postdata();
        endif;
        ?>

        <div class="stat-strip">
          <div><div class="num">6</div><div class="lbl"><?php esc_html_e( 'Markets covered', 'tradenova' ); ?></div></div>
          <div><div class="num">3</div><div class="lbl"><?php esc_html_e( 'Plan tiers', 'tradenova' ); ?></div></div>
          <div><div class="num">24/7</div><div class="lbl"><?php esc_html_e( 'Demo availability', 'tradenova' ); ?></div></div>
        </div>
      </div>

      <div class="why-visual reveal">
        <div class="dash-tag"><?php esc_html_e( 'Concept snapshot', 'tradenova' ); ?></div>
        <div style="display:flex; justify-content:space-between; align-items:baseline; margin-bottom:6px;">
          <span class="mono" style="font-size:26px; font-weight:700;">TradeNova</span>
          <span class="badge up"><?php esc_html_e( 'Demo build', 'tradenova' ); ?></span>
        </div>
        <p style="color:var(--text-secondary); font-size:13px; margin-bottom:22px;"><?php esc_html_e( 'A fintech dashboard concept — designed, not brokered.', 'tradenova' ); ?></p>
        <svg viewBox="0 0 400 140" width="100%" height="140" aria-hidden="true">
          <defs><linearGradient id="aboutGrad" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#8B5CF6" stop-opacity="0.35"/><stop offset="100%" stop-color="#8B5CF6" stop-opacity="0"/></linearGradient></defs>
          <path d="M0 90 L40 100 L80 75 L120 85 L160 60 L200 68 L240 40 L280 50 L320 28 L360 35 L400 15 L400 140 L0 140 Z" fill="url(#aboutGrad)"/>
          <path d="M0 90 L40 100 L80 75 L120 85 L160 60 L200 68 L240 40 L280 50 L320 28 L360 35 L400 15" fill="none" stroke="#8B5CF6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background:var(--bg-secondary); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="section-head reveal">
      <div><div class="eyebrow"><?php esc_html_e( 'What We Value', 'tradenova' ); ?></div><h2><?php esc_html_e( 'The principles behind the design', 'tradenova' ); ?></h2></div>
    </div>
    <div class="grid-3 reveal">
      <?php
      $values = array(
        array( 'Clarity over clutter', "Every screen shows what matters and nothing that doesn't." ),
        array( 'Honest by default', 'No inflated numbers, no promises of guaranteed returns.' ),
        array( 'Fast and dependable', 'An interface that responds instantly, even on slower connections.' ),
        array( 'Accessible to beginners', 'Powerful tools presented in plain, approachable language.' ),
        array( 'Security-minded', 'Designed with security-conscious patterns throughout.' ),
        array( 'Detail-obsessed', 'Spacing, type and color chosen deliberately, not defaulted.' ),
      );
      foreach ( $values as $v ) : ?>
        <div class="value-card"><h4><?php echo esc_html( $v[0] ); ?></h4><p><?php echo esc_html( $v[1] ); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <div><div class="eyebrow"><?php esc_html_e( 'Behind the Concept', 'tradenova' ); ?></div><h2><?php esc_html_e( 'Designed & built as a portfolio project', 'tradenova' ); ?></h2></div>
    </div>
    <div class="grid-3 reveal">
      <div class="value-card team-card"><div class="team-avatar">M</div><h4>Monu</h4><span><?php esc_html_e( 'Frontend Developer & Designer', 'tradenova' ); ?></span></div>
      <div class="value-card team-card"><div class="team-avatar">TN</div><h4><?php esc_html_e( 'Product Concept', 'tradenova' ); ?></h4><span><?php esc_html_e( 'Fintech dashboard direction', 'tradenova' ); ?></span></div>
      <div class="value-card team-card"><div class="team-avatar">UI</div><h4><?php esc_html_e( 'Design System', 'tradenova' ); ?></h4><span><?php esc_html_e( 'Dark-mode trading interface', 'tradenova' ); ?></span></div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <h2><?php esc_html_e( 'Curious how the dashboard works?', 'tradenova' ); ?></h2>
    <p><?php esc_html_e( 'Walk through the full trading demo — markets, portfolio, and order entry.', 'tradenova' ); ?></p>
    <div class="hero-ctas">
      <a href="<?php echo esc_url( home_url( '/#dashboard' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'View Demo', 'tradenova' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary"><?php esc_html_e( 'Contact Us', 'tradenova' ); ?></a>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
