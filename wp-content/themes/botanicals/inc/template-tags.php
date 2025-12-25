<?php
/**
 * Custom template tags for this theme.
 *
 * @package woocommerce-starter
 */

if ( ! function_exists( 'woocommerce_starter_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function woocommerce_starter_posted_on() {
	if( get_theme_mod('woocommerce_starter_hide_author')=="" ){		
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = $time_string;
		$byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';
		echo '<span class="byline">' . $byline . '</span><span class=" posted-on"> ' .  $posted_on . '</span>';
		/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '#', ' #', '');
			if ( $tags_list ) {
				echo '<span class="tags-links"> ' . $tags_list . '</span>';
			}
	}
}
endif;

if ( ! function_exists( 'woocommerce_starter_entry_footer' ) ) :

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function woocommerce_starter_entry_footer() {

	if( get_theme_mod('woocommerce_starter_hide_meta')=="" ){
		echo '<footer class="entry-footer">';
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'woocommerce-starter' ) );
			if ( $categories_list && woocommerce_starter_categorized_blog() ) {
				printf( '<span class="cat-links">' . __( 'Categories: %1$s', 'woocommerce-starter' ) . '</span>', $categories_list );
			}	
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'woocommerce-starter' ), __( '1 Comment', 'woocommerce-starter' ), __( '% Comments', 'woocommerce-starter' ) );
			echo '</span>';
		}
		
		/* translators: % is the post title */
		edit_post_link( sprintf( __( 'Edit %s', 'woocommerce-starter' ), get_the_title() ), '<span class="edit-link">', '</span>' );

		/* Display jetpack's share if it's active*/
		if ( function_exists( 'sharing_display' ) ) {
			echo sharing_display();
		}

		/* Display jetpack's like  if it's active */
		if ( class_exists( 'Jetpack_Likes' ) ) {
		    $woocommerce_starter_custom_likes = new Jetpack_Likes;
		    echo $woocommerce_starter_custom_likes->post_likes( '' );
		}
		echo '</footer><!-- .entry-footer -->';
	}
}
endif;




if ( ! function_exists( 'woocommerce_starter_portfolio_footer' ) ) :

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function woocommerce_starter_portfolio_footer() {

	if( get_theme_mod('woocommerce_starter_hide_meta')=="" ){
		echo '<footer class="entry-footer">';

		global $post;
	
		//the_terms( $id, $taxonomy, $before, $sep, $after ); 
		echo the_terms($post->ID, 'jetpack-portfolio-type', '<span class="jetpack-portfolio-type">' . __('Project Type: ','woocommerce-starter') ,', ', '</span>');

		echo the_terms($post->ID, 'jetpack-portfolio-tag', '<span class="tags-links">' . __( 'Project Tags: ', 'woocommerce-starter' ),', ', '</span>');
		
		/* translators: % is the post title */
		edit_post_link( sprintf( __( 'Edit %s', 'woocommerce-starter' ), get_the_title() ), '<span class="edit-link">', '</span>' );

		/* Display jetpack's share if it's active*/
		if ( function_exists( 'sharing_display' ) ) {
			echo sharing_display();
		}

		/* Display jetpack's like  if it's active */
		if ( class_exists( 'Jetpack_Likes' ) ) {
		    $woocommerce_starter_custom_likes = new Jetpack_Likes;
		    echo $woocommerce_starter_custom_likes->post_likes( '' );
		}
		echo '</footer><!-- .entry-footer -->';
	}
}
endif;


/* Excerpts */

function woocommerce_starter_excerpt_more( $more ) {
	global $id;
	return '&hellip; '. woocommerce_starter_continue_reading( $id );
}
add_filter( 'excerpt_more', 'woocommerce_starter_excerpt_more',100 );



function woocommerce_starter_custom_excerpt_more( $output ) {
	if ( has_excerpt() && !is_attachment() ) {
		global $id;
		$output .= ' '. woocommerce_starter_continue_reading( $id ); // insert a blank space.
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'woocommerce_starter_custom_excerpt_more',100 );



function woocommerce_starter_continue_reading( $id ) {
    return '<a class="continue" href="'.get_permalink( $id ).'">'. sprintf( __( 'Continue Reading %s', 'woocommerce-starter' ), get_the_title( $id ) ) . '</a>';
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function woocommerce_starter_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'woocommerce_starter_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'woocommerce_starter_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so woocommerce_starter_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so woocommerce_starter_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in woocommerce_starter_categorized_blog.
 */
function woocommerce_starter_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'woocommerce_starter_categories' );
}
add_action( 'edit_category', 'woocommerce_starter_category_transient_flusher' );
add_action( 'save_post',     'woocommerce_starter_category_transient_flusher' );

