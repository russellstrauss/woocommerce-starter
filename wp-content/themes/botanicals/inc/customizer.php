<?php
/**
 * woocommerce-starter Theme Customizer
 *
 * @package woocommerce-starter
 */

function woocommerce_starter_customize_register( $wp_customize ) {
	/*Add sections and panels to the WordPress customizer*/

	$wp_customize->add_panel( 'woocommerce_starter_action_panel', array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Call to Action', 'woocommerce-starter' ),
		'description'    => __( 'The Call to Action is displayed below the site title in the header.', 'woocommerce-starter' ),
	) );
	
	$wp_customize->add_panel( 'woocommerce_starter_sections_panel', array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Front page sections', 'woocommerce-starter' ),
		'description'    => __( 'Display pages as different sections of the front page.', 'woocommerce-starter' ),
	) );

	$wp_customize->add_section('woocommerce_starter_section_advanced',      array(
            'title' => __( 'Advanced settings', 'woocommerce-starter' ),
            'priority' => 100
        )
    );
		
	$wp_customize->add_section('woocommerce_starter_section_reset',      array(
            'title' => __( 'Reset', 'woocommerce-starter' ),
            'priority' => 220
        )
    );

	$wp_customize->get_section('header_image')->title = __( 'Header background', 'woocommerce-starter');

	$wp_customize->add_setting( 'woocommerce_starter_header_bgcolor', array(
		'default'        => '#9cc9c7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woocommerce_starter_header_bgcolor', array(
	'label'        => __( 'Header background color:', 'woocommerce-starter' ),
	'section' => 'header_image',
	'settings'  => 'woocommerce_starter_header_bgcolor',
	'priority' => 1,
	) ) );


	$wp_customize->add_setting( 'woocommerce_starter_header_bgpos',		 array(
		'sanitize_callback' => 'woocommerce_starter_sanitize_bgpos',
		'default' => 'center bottom',
	) );

	$wp_customize->add_control( 'woocommerce_starter_header_bgpos',		array(
	'type' => 'select',

	'label'        => __( 'Header background image position:', 'woocommerce-starter' ),
	'choices' => array(
			'left top'		=>  __('left top','woocommerce-starter'),
			'left center'	=>	__('left center','woocommerce-starter'),
			'left bottom'	=>	__('left bottom','woocommerce-starter'),
			'right top'		=>	__('right top','woocommerce-starter'),
			'right center'	=>	__('right center','woocommerce-starter'),
			'right bottom'	=>	__('right bottom','woocommerce-starter'),
			'center top'	=>	__('center top','woocommerce-starter'),
			'center center'	=>	__('center center','woocommerce-starter'),
			'center bottom'	=>	__('center bottom','woocommerce-starter'),
        ),
	'section' => 'header_image',
	) );

	$wp_customize->add_setting( 'woocommerce_starter_header_bgsize',		 array(
		'sanitize_callback' => 'woocommerce_starter_sanitize_bgsize',
	) );

	$wp_customize->add_control( 'woocommerce_starter_header_bgsize',		array(
	'type' => 'select',
	'label'        => __( 'Header background image size:', 'woocommerce-starter' ),
	'choices' => array(
			'cover'		=>  __('cover','woocommerce-starter'),
			'contain'	=>	__('contain','woocommerce-starter'),
			'auto'		=>	__('auto','woocommerce-starter'),
        ),
	'section' => 'header_image',
	) );

	$wp_customize->add_setting( 'woocommerce_starter_header_bgrepeat',		 array(
		'sanitize_callback' => 'woocommerce_starter_sanitize_bgrepeat',
		'default' => 'no-repeat',
	) );

	$wp_customize->add_control( 'woocommerce_starter_header_bgrepeat',		array(
	'type' => 'select',
	'label'        => __( 'Header background image repeat:', 'woocommerce-starter' ),
	'choices' => array(
			'repeat'		=>  __('repeat','woocommerce-starter'),
			'repeat-x'	=>	__('repeated only horizontally','woocommerce-starter'),
			'repeat-y'		=>	__('repeated only vertically','woocommerce-starter'),
			'no-repeat'		=>  __(' no repeat','woocommerce-starter'),
        ),
	'section' => 'header_image',
	) );

	//Hide meta
	$wp_customize->add_setting( 'woocommerce_starter_hide_meta',		array(
			'sanitize_callback' => 'woocommerce_starter_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('woocommerce_starter_hide_meta',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the meta information.', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_advanced',
		)
	);

	//Hide author
	$wp_customize->add_setting( 'woocommerce_starter_hide_author',		array(
			'sanitize_callback' => 'woocommerce_starter_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('woocommerce_starter_hide_author',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the author, post date and tag information.', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_advanced',
		)
	);

	/* Call to action text **/

	$wp_customize->add_section('woocommerce_starter_section_one',      array(
            'title' => __( 'Call to Action', 'woocommerce-starter' ),
            'priority' => 100,
            'panel'  => 'woocommerce_starter_action_panel',
        )
    );

	$wp_customize->add_setting( 'woocommerce_starter_action_text',		array(
			'sanitize_callback' => 'woocommerce_starter_sanitize_text',
		)
	);

	$wp_customize->add_control('woocommerce_starter_action_text',		array(
			'type' => 'text',
			'label' =>  __( 'Add this text to the Call to Action button on the front page:', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_one',
		)
	);	

	/* Call to action link **/
	$wp_customize->add_setting( 'woocommerce_starter_action_link',		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control('woocommerce_starter_action_link',		array(
			'type' => 'text',
			'label' =>  __( 'Add a link to the Call to action button:', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_one',
		)
	);
	
	$wp_customize->add_setting( 'woocommerce_starter_hide_action',		array(
			'sanitize_callback' => 'woocommerce_starter_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('woocommerce_starter_hide_action',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the Call to Action button.', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_one',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'woocommerce_starter_action_color', array(
		'default'        => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woocommerce_starter_action_color', array(
		'label'        => __( 'Call to Action text color:', 'woocommerce-starter' ),
		'section' => 'woocommerce_starter_section_one',
		'settings'  => 'woocommerce_starter_action_color',
	) ) );

	$wp_customize->add_setting( 'woocommerce_starter_action_bgcolor', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color_no_hash',

	) );
	 
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woocommerce_starter_action_bgcolor', array(
	    'label'   => __('Call to Action background color:','woocommerce-starter'),
	    'section' => 'woocommerce_starter_section_one',
	    'settings'   => 'woocommerce_starter_action_bgcolor',
	) ) );


	/*Advanced settings*/
	$wp_customize->add_setting( 'woocommerce_starter_hide_search',		array(
			'sanitize_callback' => 'woocommerce_starter_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('woocommerce_starter_hide_search',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the search form in the header.', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_advanced',
		)
	);

	$wp_customize->add_setting( 'woocommerce_starter_hide_title',		array(
			'sanitize_callback' => 'woocommerce_starter_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('woocommerce_starter_hide_title',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the clickable site title in the header menu.', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_advanced',
		)
	);

	/*Frontpage sections*/

	/* Top Section */
	$wp_customize->add_section( 'woocommerce_starter_top_section', array(
			'title' => __( 'Top Section', 'woocommerce-starter' ),
			'panel'  => 'woocommerce_starter_sections_panel',
			'description' => __('Choose upto 3 pages that will be displayed above your blog content.', 'woocommerce-starter'),
	) );

	for ($i = 1; $i < 4; $i++) {
			$wp_customize->add_setting( 'woocommerce_starter_top_section' . $i,	 array(
				'sanitize_callback' => 'woocommerce_starter_sanitize_page',

			) );

			$wp_customize->add_control( 'woocommerce_starter_top_section' . $i,		array(
				'default' => 0,
			    'type' => 'dropdown-pages',
		        'label' => __( 'Choose a page:','woocommerce-starter'),
				'section' => 'woocommerce_starter_top_section',
			) );
	}

	/* Bottom Section */
	$wp_customize->add_section( 'woocommerce_starter_bottom_section', array(
			'title' => __( 'Bottom Section', 'woocommerce-starter' ),
			'panel'  => 'woocommerce_starter_sections_panel',
			'description' => __('Choose upto 3 pages that will be displayed below your blog content, but above the footer.', 'woocommerce-starter'),
	) );

	for ($i = 1; $i < 4; $i++) {
			$wp_customize->add_setting( 'woocommerce_starter_bottom_section' . $i,		 array(
				'sanitize_callback' => 'woocommerce_starter_sanitize_page',

			) );

			$wp_customize->add_control( 'woocommerce_starter_bottom_section' . $i,		array(
				'default' => 0,
			    'type' => 'dropdown-pages',
		        'label' => __( 'Choose a page:','woocommerce-starter'),
				'section' => 'woocommerce_starter_bottom_section',
			) );
	}

	/* if jetpack is installed, add the featured heading to the customizer. */
	$wp_customize->add_setting( 'woocommerce_starter_featured_headline',		array(
				'sanitize_callback' => 'woocommerce_starter_sanitize_text',
				'default'        => __( 'Featured', 'woocommerce-starter' ),
			)
		);
		$wp_customize->add_control('woocommerce_starter_featured_headline',		array(
				'type' => 'text',
				'label' =>  __( 'Label your featured content:', 'woocommerce-starter' ),
				'section' => 'featured_content',
			)
		);

/*********************************************************************************************************************************
 Reset 
 */
	$wp_customize->add_setting( 'woocommerce_starter_reset',		array(
			'sanitize_callback' => 'woocommerce_starter_sanitize_reset',
		)
	);
	$wp_customize->add_control('woocommerce_starter_reset',		array(
			'type' => 'text',
			'label' =>  __( 'Are you sure that you want to reset your settings? Type YES in the box, save and refresh the page.', 'woocommerce-starter' ),
			'section' => 'woocommerce_starter_section_reset',
		)
	);

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'woocommerce_starter_hide_title' )->transport  = 'postMessage';

	if ( woocommerce_starter_has_featured_posts( 1 ) ) {
		$wp_customize->get_setting( 'woocommerce_starter_featured_headline' )->transport  = 'postMessage';
	}
}
add_action( 'customize_register', 'woocommerce_starter_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function woocommerce_starter_customize_preview_js() {
	wp_enqueue_script( 'woocommerce_starter_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'woocommerce_starter_customize_preview_js' );


function woocommerce_starter_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );  
}

function woocommerce_starter_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

//Reset the theme settings
function woocommerce_starter_sanitize_reset( $input ) {
	$input=sanitize_text_field( $input );

	if($input == 'YES'){
		remove_theme_mods();
	}else{
		return;
	}
}

//Sanitize bg position
function woocommerce_starter_sanitize_bgpos( $input ) {
    $valid = array(
       	'left top'		=>  __('left top','woocommerce-starter'),
		'left center'	=>	__('left center','woocommerce-starter'),
		'left bottom'	=>	__('left bottom','woocommerce-starter'),
		'right top'		=>	__('right top','woocommerce-starter'),
		'right center'	=>	__('right center','woocommerce-starter'),
		'right bottom'	=>	__('right bottom','woocommerce-starter'),
		'center top'	=>	__('center top','woocommerce-starter'),
		'center center'	=>	__('center center','woocommerce-starter'),
		'center bottom'	=>	__('center bottom','woocommerce-starter'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//Sanitize bg size
function woocommerce_starter_sanitize_bgsize( $input ) {
    $valid = array(
		'cover'		=>  __('cover','woocommerce-starter'),
		'contain'	=>	__('contain','woocommerce-starter'),
		'auto'		=>	__('auto','woocommerce-starter'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//Sanitize bg repeat
function woocommerce_starter_sanitize_bgrepeat( $input ) {
    $valid = array(
		'repeat'		=>  __('repeat','woocommerce-starter'),
		'repeat-x'		=>	__('repeated only horizontally','woocommerce-starter'),
		'repeat-y'		=>	__('repeated only vertically','woocommerce-starter'),
		'no-repeat'		=>  __(' no repeat','woocommerce-starter'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize the page select lists
function woocommerce_starter_sanitize_page( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

?>