<?php
/**
 * TradeNova theme functions and definitions.
 *
 * @package TradeNova
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'TRADENOVA_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function tradenova_setup() {
	load_theme_textdomain( 'tradenova', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 40,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'tradenova' ),
		'footer'  => __( 'Footer Links', 'tradenova' ),
	) );

	// Editors get the same type scale as the front end.
	add_editor_style( 'assets/css/tradenova.css' );
}
add_action( 'after_setup_theme', 'tradenova_setup' );

/**
 * Enqueue styles and scripts.
 */
function tradenova_scripts() {
	wp_enqueue_style( 'tradenova-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'tradenova-style', get_template_directory_uri() . '/assets/css/tradenova.css', array(), TRADENOVA_VERSION );

	wp_enqueue_script( 'tradenova-app', get_template_directory_uri() . '/assets/js/app.js', array(), TRADENOVA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tradenova_scripts' );

/**
 * Register the "Lesson" custom post type for the Education section,
 * so lessons (Stock Market Basics, Technical Analysis, etc.) are
 * fully manageable from the WordPress admin.
 */
function tradenova_register_lesson_cpt() {
	$labels = array(
		'name'               => __( 'Lessons', 'tradenova' ),
		'singular_name'      => __( 'Lesson', 'tradenova' ),
		'add_new_item'       => __( 'Add New Lesson', 'tradenova' ),
		'edit_item'          => __( 'Edit Lesson', 'tradenova' ),
		'all_items'          => __( 'All Lessons', 'tradenova' ),
		'menu_name'          => __( 'Education', 'tradenova' ),
	);

	register_post_type( 'lesson', array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'education' ),
		'menu_icon'     => 'dashicons-welcome-learn-more',
		'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'show_in_rest'  => true,
	) );

	register_taxonomy( 'lesson_level', 'lesson', array(
		'labels'       => array(
			'name'          => __( 'Levels', 'tradenova' ),
			'singular_name' => __( 'Level', 'tradenova' ),
		),
		'hierarchical' => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => array( 'slug' => 'lesson-level' ),
	) );
}
add_action( 'init', 'tradenova_register_lesson_cpt' );

/**
 * Register a "Market Insights" category for blog posts on first install,
 * so the Blog section has a sensible default without manual setup.
 */
function tradenova_register_default_terms() {
	if ( ! term_exists( 'Market Insights', 'category' ) ) {
		wp_insert_term( 'Market Insights', 'category' );
	}
	if ( ! term_exists( 'Technical Analysis', 'category' ) ) {
		wp_insert_term( 'Technical Analysis', 'category' );
	}
	if ( ! term_exists( 'Getting Started', 'category' ) ) {
		wp_insert_term( 'Getting Started', 'category' );
	}
	if ( ! term_exists( 'Risk Management', 'category' ) ) {
		wp_insert_term( 'Risk Management', 'category' );
	}
}
add_action( 'after_switch_theme', 'tradenova_register_default_terms' );

/**
 * Theme Customizer — lets an admin edit the hero, ticker, portfolio
 * demo figures and risk disclaimer without touching code.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Reusable template helper functions (icons, reading time, excerpts).
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Contact form handler (wp_mail-based, nonce-protected).
 */
require get_template_directory() . '/inc/contact-form.php';

/**
 * Helper: format a theme mod with a fallback default.
 */
function tradenova_mod( $key, $default = '' ) {
	return get_theme_mod( $key, $default );
}

/**
 * Register footer widget area (used for the "Resources" footer column
 * so it stays admin-editable independent of the main menu).
 */
function tradenova_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Resources', 'tradenova' ),
		'id'            => 'footer-resources',
		'description'   => __( 'Optional widgets shown in the footer "Resources" column.', 'tradenova' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'tradenova_widgets_init' );

/**
 * Trim excerpt length for lesson & blog cards.
 */
function tradenova_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'tradenova_excerpt_length' );

/**
 * Security: this is a DEMO trading interface. No real order, payment
 * or brokerage integration exists anywhere in this theme.
 */
