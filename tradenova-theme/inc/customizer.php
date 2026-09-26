<?php
/**
 * TradeNova Theme Customizer.
 *
 * Exposes the demo/editable content (hero copy, ticker values, portfolio
 * summary figures, risk disclaimer) as Customizer settings so an admin
 * can update them without editing template files.
 *
 * @package TradeNova
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tradenova_customize_register( $wp_customize ) {

	/* ---------------- Hero ---------------- */
	$wp_customize->add_section( 'tradenova_hero', array(
		'title'    => __( 'Hero Section', 'tradenova' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'hero_eyebrow', array( 'default' => 'Live demo · NSE · NASDAQ · Crypto', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_eyebrow', array( 'label' => __( 'Eyebrow label', 'tradenova' ), 'section' => 'tradenova_hero', 'type' => 'text' ) );

	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Trade Smarter. Invest With Confidence.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => __( 'Headline', 'tradenova' ), 'section' => 'tradenova_hero', 'type' => 'text' ) );

	$wp_customize->add_setting( 'hero_subtitle', array( 'default' => 'Track markets, analyze opportunities and manage your portfolio from one powerful platform.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'hero_subtitle', array( 'label' => __( 'Subtitle', 'tradenova' ), 'section' => 'tradenova_hero', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'hero_cta_primary', array( 'default' => 'Explore Markets', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_primary', array( 'label' => __( 'Primary button label', 'tradenova' ), 'section' => 'tradenova_hero', 'type' => 'text' ) );

	$wp_customize->add_setting( 'hero_cta_secondary', array( 'default' => 'View Demo', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_secondary', array( 'label' => __( 'Secondary button label', 'tradenova' ), 'section' => 'tradenova_hero', 'type' => 'text' ) );

	/* ---------------- Portfolio demo figures ---------------- */
	$wp_customize->add_section( 'tradenova_portfolio', array(
		'title'    => __( 'Portfolio Demo Figures', 'tradenova' ),
		'priority' => 31,
	) );

	$portfolio_fields = array(
		'portfolio_value'   => array( '₹8,45,250', __( 'Portfolio Value', 'tradenova' ) ),
		'portfolio_today_pl'=> array( '+₹12,450', __( "Today's P&L", 'tradenova' ) ),
		'portfolio_returns' => array( '+18.6%', __( 'Total Returns', 'tradenova' ) ),
		'portfolio_balance' => array( '₹64,120', __( 'Available Balance', 'tradenova' ) ),
	);
	foreach ( $portfolio_fields as $key => $meta ) {
		$wp_customize->add_setting( $key, array( 'default' => $meta[0], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $key, array( 'label' => $meta[1], 'section' => 'tradenova_portfolio', 'type' => 'text' ) );
	}

	/* ---------------- Footer / legal ---------------- */
	$wp_customize->add_section( 'tradenova_footer', array(
		'title'    => __( 'Footer & Legal', 'tradenova' ),
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'footer_tagline', array( 'default' => 'A modern fintech concept for tracking markets and managing a portfolio from one screen. Demo interface — no real trades are placed.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'footer_tagline', array( 'label' => __( 'Footer tagline', 'tradenova' ), 'section' => 'tradenova_footer', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'risk_disclaimer', array(
		'default' => 'TradeNova is a demo interface built for portfolio and demonstration purposes. All prices, positions and transactions shown are simulated. Trading in financial markets involves risk, including loss of capital, and past performance does not guarantee future results. No returns are guaranteed.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'risk_disclaimer', array( 'label' => __( 'Risk disclaimer text', 'tradenova' ), 'section' => 'tradenova_footer', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'support_email', array( 'default' => 'support@tradenova.demo', 'sanitize_callback' => 'sanitize_email' ) );
	$wp_customize->add_control( 'support_email', array( 'label' => __( 'Support email', 'tradenova' ), 'section' => 'tradenova_footer', 'type' => 'email' ) );

	$wp_customize->add_setting( 'office_location', array( 'default' => 'BKC, Bandra East, Mumbai, Maharashtra, India', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'office_location', array( 'label' => __( 'Office location', 'tradenova' ), 'section' => 'tradenova_footer', 'type' => 'text' ) );

	/* ---------------- Social links ---------------- */
	$wp_customize->add_section( 'tradenova_social', array(
		'title'    => __( 'Social Links', 'tradenova' ),
		'priority' => 33,
	) );
	foreach ( array( 'twitter', 'linkedin', 'youtube', 'instagram' ) as $network ) {
		$wp_customize->add_setting( "social_{$network}", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$network}", array( 'label' => ucfirst( $network ) . ' URL', 'section' => 'tradenova_social', 'type' => 'url' ) );
	}
}
add_action( 'customize_register', 'tradenova_customize_register' );
