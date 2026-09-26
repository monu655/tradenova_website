<?php
/**
 * The default template for any WordPress Page (falls back here unless
 * a page-{slug}.php or Template Name override applies).
 *
 * @package TradeNova
 */

get_header();
?>

<main id="primary">
  <section class="page-hero">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_title( '<h1>', '</h1>' ); ?>
      <?php endwhile; ?>
    </div>
  </section>

  <section class="section">
    <div class="container" style="max-width:860px;">
      <?php
      wp_reset_postdata();
      while ( have_posts() ) : the_post();
        ?>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <?php
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      endwhile;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
