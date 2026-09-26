<?php
/**
 * The main template file — fallback used when no more specific
 * template (front-page.php, page.php, single.php, archive.php)
 * matches the current request. Required in every WordPress theme.
 *
 * @package TradeNova
 */

get_header();
?>

<main id="primary">
  <section class="section">
    <div class="container">
      <?php if ( have_posts() ) : ?>
        <div class="grid-3">
          <?php while ( have_posts() ) : the_post(); ?>
            <article class="blog-card">
              <a href="<?php the_permalink(); ?>" class="blog-thumb" style="text-decoration:none;">
                <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); else : ?>
                  <svg width="46" height="46" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="10" width="4" height="11" stroke="#3B82F6" stroke-width="1.6"/><rect x="10" y="4" width="4" height="17" stroke="#3B82F6" stroke-width="1.6"/><rect x="17" y="7" width="4" height="14" stroke="#3B82F6" stroke-width="1.6"/></svg>
                <?php endif; ?>
              </a>
              <div class="blog-body">
                <h3><a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a></h3>
                <span class="blog-meta"><?php echo esc_html( get_the_date() ); ?></span>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
        <div style="margin-top:40px; display:flex; justify-content:center;">
          <?php the_posts_pagination(); ?>
        </div>
      <?php else : ?>
        <p style="color:var(--text-secondary);"><?php esc_html_e( 'Nothing found.', 'tradenova' ); ?></p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
