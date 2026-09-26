<?php
/**
 * TradeNova contact form handler.
 *
 * Submits to admin-post.php, verifies a nonce, sanitizes input, and
 * sends the message via wp_mail() to the configured support email.
 * No third-party service or payment/trading data is involved.
 *
 * @package TradeNova
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tradenova_handle_contact_form() {
	if ( ! isset( $_POST['tradenova_contact_nonce'] ) || ! wp_verify_nonce( $_POST['tradenova_contact_nonce'], 'tradenova_contact_submit' ) ) {
		wp_die( esc_html__( 'Security check failed. Please go back and try again.', 'tradenova' ) );
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/contact/' );

	if ( empty( $name ) || empty( $email ) || empty( $message ) || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'tradenova_contact', 'error', $redirect ) . '#contact-form' );
		exit;
	}

	$to      = get_theme_mod( 'support_email', get_option( 'admin_email' ) );
	$subject = sprintf( '[TradeNova] New contact message from %s', $name );
	$body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\n\nMessage:\n{$message}";
	$headers = array( 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" );

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'tradenova_contact', 'success', $redirect ) . '#contact-form' );
	exit;
}
add_action( 'admin_post_tradenova_contact', 'tradenova_handle_contact_form' );
add_action( 'admin_post_nopriv_tradenova_contact', 'tradenova_handle_contact_form' );
