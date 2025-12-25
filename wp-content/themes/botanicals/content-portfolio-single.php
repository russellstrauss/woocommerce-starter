<?php
/**
 * @package botanicals
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('botanicals-border');  ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		if ( has_post_thumbnail()){
			the_post_thumbnail();
		}
			
		the_content(); 

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'woocommerce-starter' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->
	<?php woocommerce_starter_portfolio_footer(); ?>
</article><!-- #post-## -->

