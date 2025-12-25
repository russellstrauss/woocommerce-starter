<?php 
function woocommerce_starter_docs_menu() {
	add_theme_page( __('WooCommerce Starter Setup Help', 'woocommerce-starter'), __('WooCommerce Starter Setup Help', 'woocommerce-starter'), 'edit_theme_options', 'woocommerce-starter-theme', 'woocommerce_starter_docs');
}
add_action('admin_menu', 'woocommerce_starter_docs_menu');

function woocommerce_starter_docs() {

?>

<h1 class="doc-title"><?php _e('Botanicals Setup Help', 'woocommerce-starter'); ?></h1>
<div class="doc-thanks">
<b><?php _e('Thank you for downloading and trying out Botanicals!', 'woocommerce-starter'); ?></b><br><br>
<?php printf( __('If you like the theme, please review it on <a href="%s">WordPress.org</a>', 'woocommerce-starter'), esc_url('https://wordpress.org/support/view/theme-reviews/botanicals') );?><br>

<b><?php printf( __('If you have any questions, accessibility issues or feature requests for this theme, please visit <a href="%s">http://wptema.se/Botanicals</a>.', 'woocommerce-starter'), esc_url('http://wptema.se/Botanicals') ); ?></b><br>
<?php _e('Thank you to everyone who has contributed with ideas and bug reports so far! Your feedback is essential for the future developement of the theme.', 'woocommerce-starter'); ?>
</div>

	<ul class="doc-menu">
		<li><a href="#botanicals-menus"><?php _e('Menus','woocommerce-starter' ); ?></a></li>
		<li><a href="#botanicals-widget"><?php _e('Widget areas','woocommerce-starter' ); ?></a></li>
		<li><a href="#botanicals-front"><?php _e('Front page','woocommerce-starter' ); ?></a></li>
		<li><a href="#botanicals-advanced"><?php _e('Advanced settings','woocommerce-starter' ); ?></a></li>
		<li><a href="#botanicals-plugins"><?php _e('Plugins','woocommerce-starter' ); ?></a></li>
	</ul>

	<div class="doc-box" id="botanicals-menus">
		<h3><?php _e('Menus','woocommerce-starter' ); ?></h3>
		<?php _e('This theme has two optional menu locations, the <b>Primary menu</b> and the <b>Social menu</b>.','woocommerce-starter' ); ?><br><br>
			
		<b><?php _e('The Primary menu','woocommerce-starter' ); ?></b> <?php _e('is fixed at the top of the website and shows two menu levels. <br>
		This menu will collapse on smaller screens, and can then be opened and closed by a menu button. It can also be closed with the Esc key.','woocommerce-starter' ); ?><br>
		<?php _e( 'A one line menu is recommended, or the menu will overlap your content. Use submenus instead.','woocommerce-starter' ); ?><br><br>

		<?php _e('<b>The social menu</b> is at the bottom of the page and shows logos of the social networks of your choice. It does not display any text,<br> but has additional information for screen readers.','woocommerce-starter' ); ?>
		<?php _e('The icon will be added automatically, all you need to do is add a link to your menu.','woocommerce-starter' ); ?><br><br>
			
		<b><?php _e('Advanced','woocommerce-starter' ); ?></b><br>
		<?php _e('By default, the primary meny also shows the site title. You can hide this feature under the Advanced settings tab in the Customizer.','woocommerce-starter' ); ?>
	</div>

	<div class="doc-box" id="botanicals-widgets">
		<h3><?php _e('Widget areas','woocommerce-starter' ); ?></h3>
		<?php _e('The theme has two sidebars, one for the front page and one for posts, that can hold <b>any number of widgets</b>. The footer widget area is shown on all pages.','woocommerce-starter' ); ?><br>
		<?php _e('There is also an additional widget area in the footer below the social menu, where you can place a text widget and add your copyright text.','woocommerce-starter' );?> 
	</div>

	<div class="doc-box" id="botanicals-front">
			<h3><?php _e('Frontpage','woocommerce-starter' ); ?></h3>
			<?php _e('The standard front page has the following features:','woocommerce-starter' ); ?><br>
			<?php _e('<b>Site title and tagline:</b> You will find an option to hide or change the color of your header text in the customizer.','woocommerce-starter' ); ?><br>
			<?php _e('<b>Call to action:</b> The Call to Action is a great way to get your visitors attention. In the customizer you can:','woocommerce-starter' ); ?>
			<ul>
				<li><?php _e('Add your own text','woocommerce-starter' ); ?></li>
				<li><?php _e('Add a link','woocommerce-starter' )?></li>		
				<li><?php _e('Change colors','woocommerce-starter' )?></li>
				<li><?php _e('Hide the button','woocommerce-starter' ); ?></li>		
			</ul>
			<?php _e('<b>Header Background:</b> You can change the background image or background color in the customizer.','woocommerce-starter' )?> <br>
			<?php _e('<b>Search form:</b> You can hide the search form under the Advanced setting in the customizer.','woocommerce-starter' )?> <br>
			<h3><?php _e('Custom Frontpage','woocommerce-starter' )?></h3>
			<?php _e('<b>Page sections:</b> Page sections are a great way to display your shortcodes, testimonials, pricing tables, contact information and similar.', 'woocommerce-starter' ); ?><br>
			<?php _e('The two page sections can display up to 3 pages each. Pages in the top section are displayed above the blog content, and pages in the bottom section are displayed below.','woocommerce-starter' )?><br>
			<?php _e('You can also show your page sections together with a static front page, using the <i>Static and Sections</i> page template.','woocommerce-starter' )?><br>

	</div>

	<div class="doc-box" id="botanicals-advanced">
		<h3><?php _e('Advanced settings','woocommerce-starter' ); ?></h3>
		<?php _e('Under the Advanced settings tab in the customizer you will find the following options:','woocommerce-starter' )?>
		<ul>
			<li><?php _e('Hide the meta information. -This will hide the categories.','woocommerce-starter' )?></li>
			<li><?php _e('Hide the author, post date and tag information.','woocommerce-starter' )?></li>
			<li><?php _e('Hide the search form in the header.','woocommerce-starter' )?></li>
			<li><?php _e('Hide the Site title in the header menu.','woocommerce-starter' )?></li>
		</ul>
	</div>

	<div class="doc-box" id="botanicals-plugins">
		<h3><?php _e('Plugins','woocommerce-starter' ); ?></h3>
		<?php _e('Botanicals has been tested with and style has been added for the following plugins:', 'woocommerce-starter' ); ?>
		<ul>
			<li><b><?php _e('Woocommerce','woocommerce-starter' )?></b></li>
			<li><b><?php _e('bbPress','woocommerce-starter' )?></b></li>
			<li><b><?php _e('Jetpack','woocommerce-starter' )?></b><br><?php _e(' Note: Not all of Jetpacks modules are accessibe, and some uses iframes. I have increased the contrast of some of the modules.','woocommerce-starter' )?></li>
				<?php _e('Recommended modules:','woocommerce-starter' )?><br>
				<ul>
					<li><b><?php _e('Featured content','woocommerce-starter' )?></b><br>
						<?php _e('-Once Jetpack has been activated, you can select up to six posts or pages as a front page feature. Chose a tag and add it to your posts to seperate them from the rest.<br>
						You can also choose a label for the posts in your featured section. Featured images are optional and the recommended image size is 360x300 pixels.','woocommerce-starter' )?><br>
					</li>
					<li><b><?php _e('Custom Content Type: Portfolio','woocommerce-starter' )?></b><br>
						<?php _e('Botanicals also supports Jetpack','woocommerce-starter' )?> 
						<b><?php _e('Portfolios','woocommerce-starter' )?></b>. <a href="<?php echo 'http://en.support.wordpress.com/portfolios/'; ?>"><i><?php _e('Read more about how to setup your Portfolio on Jetpacks support site.','woocommerce-starter' )?></i></a><br><br>
					</li>

					<li><b><?php _e('Custom Content Type: Testimonials','woocommerce-starter' )?></b><br>
						<?php _e('Botanicals also supports Jetpack','woocommerce-starter' )?> <b><?php _e('Testimonials','woocommerce-starter' )?></b>. <br>
						<?php _e('<b>Tip:</b> I recommend creating a page and adding this shortcode, and then including the page as a front page section.','woocommerce-starter' )?> <br> &nbsp; [testimonials columns=3 showposts=3]<br>
						<a href="<?php echo 'https://en.support.wordpress.com/testimonials-shortcode/'; ?>"><i><?php _e('Read more about how to setup your Testimonials on Jetpacks support site.','woocommerce-starter' )?></i></a><br><br>		
					</li>

					<li><b><?php _e('Sharing','woocommerce-starter' )?></b><br>
						<?php _e('-If you activate Jetpack sharing, your buttons will be displayed below the meta information.','woocommerce-starter' )?><br>
					</li>
					<li><b><?php _e('Contact Form','woocommerce-starter' )?></b></li>
					<li><?php _e('<b>Site icon</b> -Use this module to add a favicon to your site.','woocommerce-starter' )?></li>
					<li><?php _e('<b>Site logo</b> -Once Jetpack has been activated, you can add a logo above your Site title on the front page. You will find this setting in the customizer.','woocommerce-starter' )?></li>
				</ul>
		</ul>
		</ul>
	</div>
<?php
}

?>