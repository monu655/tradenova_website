<?php
/**
 * Template Name: Contact TradeNova
 * Description: Used automatically for a page with the slug "contact",
 * or assignable to any page from the WordPress editor's Template panel.
 *
 * @package TradeNova
 */

get_header();

$status = isset( $_GET['tradenova_contact'] ) ? sanitize_key( $_GET['tradenova_contact'] ) : '';
?>

<main id="primary">

<section class="page-hero">
  <div class="container">
    <div class="eyebrow" style="justify-content:center;"><?php esc_html_e( 'Contact', 'tradenova' ); ?></div>
    <?php
    while ( have_posts() ) : the_post();
      the_title( '<h1>', '</h1>' );
    endwhile;
    wp_reset_postdata();
    ?>
    <p><?php esc_html_e( 'Questions about the platform, the demo, or a partnership — send a message and the team will get back to you.', 'tradenova' ); ?></p>
  </div>
</section>

<section class="section" id="contact-form">
  <div class="container">
    <div class="contact-grid">

      <div class="reveal">
        <div class="panel" style="padding:32px;">
          <h3 style="font-size:18px; margin-bottom:22px;"><?php esc_html_e( 'Send a message', 'tradenova' ); ?></h3>

          <?php if ( 'success' === $status ) : ?>
            <div class="form-notice success">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <?php esc_html_e( "Thanks — your message has been sent. We'll get back to you soon.", 'tradenova' ); ?>
            </div>
          <?php elseif ( 'error' === $status ) : ?>
            <div class="form-notice error">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 8V13M12 16H12.01" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
              <?php esc_html_e( 'Please fill in your name, a valid email and a message, then try again.', 'tradenova' ); ?>
            </div>
          <?php endif; ?>

          <form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="tradenova_contact">
            <?php wp_nonce_field( 'tradenova_contact_submit', 'tradenova_contact_nonce' ); ?>

            <div class="field-row">
              <div class="field"><label for="cName"><?php esc_html_e( 'Name', 'tradenova' ); ?></label><input id="cName" name="name" class="field-input" type="text" placeholder="<?php esc_attr_e( 'Your full name', 'tradenova' ); ?>" required></div>
              <div class="field"><label for="cEmail"><?php esc_html_e( 'Email', 'tradenova' ); ?></label><input id="cEmail" name="email" class="field-input" type="email" placeholder="you@email.com" required></div>
            </div>
            <div class="field"><label for="cPhone"><?php esc_html_e( 'Phone', 'tradenova' ); ?></label><input id="cPhone" name="phone" class="field-input" type="tel" placeholder="+91 00000 00000"></div>
            <div class="field"><label for="cMsg"><?php esc_html_e( 'Message', 'tradenova' ); ?></label><textarea id="cMsg" name="message" class="field-input" placeholder="<?php esc_attr_e( 'How can we help?', 'tradenova' ); ?>" required></textarea></div>
            <button type="submit" class="btn btn-primary btn-block"><?php esc_html_e( 'Send Message', 'tradenova' ); ?></button>
          </form>
        </div>
      </div>

      <div class="reveal">
        <div class="contact-info-card">
          <div class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 4H20V20H4V4Z" stroke="currentColor" stroke-width="1.7"/><path d="M4 6L12 13L20 6" stroke="currentColor" stroke-width="1.7"/></svg></div>
          <div><h4><?php esc_html_e( 'Support Email', 'tradenova' ); ?></h4><p><?php echo esc_html( get_theme_mod( 'support_email', 'support@tradenova.demo' ) ); ?></p></div>
        </div>
        <div class="contact-info-card">
          <div class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 22C17 20 20 16 20 11V5L12 2L4 5V11C4 16 7 20 12 22Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg></div>
          <div><h4><?php esc_html_e( 'Office Location', 'tradenova' ); ?></h4><p><?php echo esc_html( get_theme_mod( 'office_location', 'BKC, Bandra East, Mumbai, Maharashtra, India' ) ); ?></p></div>
        </div>
        <div class="contact-info-card">
          <div class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M12 7V12L15 15" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></div>
          <div><h4><?php esc_html_e( 'Response Time', 'tradenova' ); ?></h4><p><?php esc_html_e( 'Typically within 1–2 business days', 'tradenova' ); ?></p></div>
        </div>

        <div style="margin-top:32px;">
          <h3 style="font-size:16px; margin-bottom:6px;"><?php esc_html_e( 'Frequently asked questions', 'tradenova' ); ?></h3>
          <?php
          $faqs = array(
            array( 'Is TradeNova a real trading platform?', 'No. TradeNova is a demo interface built to showcase a fintech dashboard design and front-end engineering. No real trades or real money are involved.' ),
            array( 'Is the market data real-time?', 'Prices, charts and portfolio figures shown across the site are simulated for demonstration purposes, not live market feeds.' ),
            array( 'Can I use this as a starting point for my own project?', 'Yes — reach out through this form and we can talk through adapting the design and code for a real product.' ),
            array( 'Does creating an account cost anything?', 'The Free plan has no cost. Pro and Premium are paid tiers shown for demonstration on the pricing section.' ),
          );
          foreach ( $faqs as $i => $faq ) : ?>
            <div class="faq-item<?php echo 0 === $i ? ' open' : ''; ?>">
              <div class="faq-q"><?php echo esc_html( $faq[0] ); ?>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
              </div>
              <div class="faq-a"><p><?php echo esc_html( $faq[1] ); ?></p></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
