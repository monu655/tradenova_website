<?php
/**
 * Single template — used for both blog posts and Lesson (education) items.
 *
 * @package TradeNova
 */

get_header();
?>

<main id="primary">
  <section class="page-hero" style="padding:64px 0 40px;">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="eyebrow" style="justify-content:center;">
          <?php
          if ( 'lesson' === get_post_type() ) {
            $levels = get_the_terms( get_the_ID(), 'lesson_level' );
            echo esc_html( ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : __( 'Lesson', 'tradenova' ) );
          } else {
            $cats = get_the_category();
            echo esc_html( ! empty( $cats ) ? $cats[0]->name : __( 'Article', 'tradenova' ) );
          }
          ?>
        </div>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <p><?php echo esc_html( get_the_date() ); ?> <?php echo ( 'post' === get_post_type() ) ? '· ' . esc_html( tradenova_reading_time() ) . ' ' . esc_html__( 'min read', 'tradenova' ) : ''; ?></p>
      <?php endwhile; ?>
    </div>
  </section>

  <section class="section">
    <div class="container" style="max-width:760px;">
      <?php
      wp_reset_postdata();
      while ( have_posts() ) : the_post();
        ?>
        <?php if ( has_post_thumbnail() ) : ?>
          <div style="border-radius:var(--radius-md); overflow:hidden; margin-bottom:32px; border:1px solid var(--border);">
            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; display:block;' ) ); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <?php if ( 'post' === get_post_type() ) : ?>
          <div style="margin-top:32px; padding-top:24px; border-top:1px solid var(--border);">
            <?php the_tags( '<span class="blog-cat">', ' ', '</span>' ); ?>
          </div>
        <?php endif; ?>

        <?php
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      endwhile;
      ?>

      <div style="margin-top:40px;">
        <a href="<?php echo esc_url( 'lesson' === get_post_type() ? get_post_type_archive_link( 'lesson' ) : home_url( '/#education' ) ); ?>" class="pill-link">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="transform:rotate(180deg);"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <?php esc_html_e( 'Back to overview', 'tradenova' ); ?>
        </a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
