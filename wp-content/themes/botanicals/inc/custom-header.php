<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package woocommerce-starter
 */

/**
 * Set up the WordPress core custom header feature.
 *
 */
function woocommerce_starter_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'woocommerce_starter_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/assets/img/Black-Outline-Logo.png',
		'default-text-color'     => '000000',
		'flex-height'            => true,
		'flex-width'             => true,
		'width'                  => 2000,
		'height'                 => 600,
		'wp-head-callback'       => 'woocommerce_starter_customize_css',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	)
	) );

	register_default_headers( array(
		'flower' => array(
			'url'           => '%s/assets/img/Black-Outline-Logo.png',
			'thumbnail_url' => '%s/assets/img/Black-Outline-Logo.png',
			'description'   => __( 'Flower', 'woocommerce-starter' )
		)
	) );
}

add_action( 'after_setup_theme', 'woocommerce_starter_custom_header_setup' );

