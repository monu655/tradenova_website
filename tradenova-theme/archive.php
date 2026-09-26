<?php
/**
 * Archive template — used for blog category/tag archives and the
 * Lesson (education) post type archive.
 *
 * @package TradeNova
 */

get_header();

$is_lesson_archive = is_post_type_archive( 'lesson' );
?>

<main id="primary">
  <section class="page-hero">
    <div class="container">
      <div class="eyebrow" style="justify-content:center;"><?php echo $is_lesson_archive ? esc_html__( 'Education', 'tradenova' ) : esc_html__( 'Blog', 'tradenova' ); ?></div>
      <h1><?php echo $is_lesson_archive ? esc_html__( 'All lessons', 'tradenova' ) : wp_kses_post( get_the_archive_title() ); ?></h1>
      <?php if ( ! $is_lesson_archive ) : ?>
        <p><?php echo wp_kses_post( get_the_archive_description() ); ?></p>
      <?php else : ?>
        <p><?php esc_html_e( 'Everything you need to know before you deploy capital.', 'tradenova' ); ?></p>
      <?php endif; ?>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <?php if ( have_posts() ) : ?>
        <div class="grid-3">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php if ( $is_lesson_archive ) : ?>
              <a href="<?php the_permalink(); ?>" class="edu-card" style="text-decoration:none; color:inherit;">
                <?php
                $levels = get_the_terms( get_the_ID(), 'lesson_level' );
                $level  = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : __( 'Beginner', 'tradenova' );
                ?>
                <span class="edu-level"><?php echo esc_html( $level ); ?></span>
                <h3><?php the_title(); ?></h3>
                <p><?php tradenova_card_excerpt(); ?></p>
                <div class="edu-meta"><span><?php esc_html_e( 'Lesson', 'tradenova' ); ?></span><span><?php echo esc_html( get_the_date() ); ?></span></div>
              </a>
            <?php else : ?>
              <article class="blog-card">
                <a href="<?php the_permalink(); ?>" class="blog-thumb" style="text-decoration:none;">
                  <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); else : ?>
                    <svg width="46" height="46" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="10" width="4" height="11" stroke="#3B82F6" stroke-width="1.6"/><rect x="10" y="4" width="4" height="17" stroke="#3B82F6" stroke-width="1.6"/><rect x="17" y="7" width="4" height="14" stroke="#3B82F6" stroke-width="1.6"/></svg>
                  <?php endif; ?>
                </a>
                <div class="blog-body">
                  <?php $cats = get_the_category(); ?>
                  <span class="blog-cat"><?php echo esc_html( ! empty( $cats ) ? $cats[0]->name : __( 'Market Insights', 'tradenova' ) ); ?></span>
                  <h3><a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a></h3>
                  <span class="blog-meta"><?php echo esc_html( tradenova_reading_time() ); ?> min read · <?php echo esc_html( get_the_date() ); ?></span>
                </div>
              </article>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>

        <div style="margin-top:40px; display:flex; justify-content:center; gap:12px;">
          <?php the_posts_pagination( array( 'prev_text' => __( '← Previous', 'tradenova' ), 'next_text' => __( 'Next →', 'tradenova' ) ) ); ?>
        </div>
      <?php else : ?>
        <p style="color:var(--text-secondary);"><?php esc_html_e( 'Nothing has been published here yet.', 'tradenova' ); ?></p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
