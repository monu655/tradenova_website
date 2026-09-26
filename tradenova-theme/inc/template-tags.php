<?php
/**
 * Reusable template tags for TradeNova.
 *
 * @package TradeNova
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the small green checkmark SVG used in the pricing tables.
 */
function tradenova_check_icon() {
	return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
}

/**
 * Rough reading time estimate (words / 200wpm) for the current post in the loop.
 */
function tradenova_reading_time() {
	$content    = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( wp_strip_all_tags( $content ) );
	$minutes    = max( 1, (int) ceil( $word_count / 200 ) );
	return $minutes;
}

/**
 * Outputs post/lesson excerpt trimmed to a fixed word count, falling back
 * to a trimmed version of the content when no excerpt is set.
 */
function tradenova_card_excerpt( $words = 18 ) {
	$excerpt = get_the_excerpt();
	echo esc_html( wp_trim_words( $excerpt, $words ) );
}
