<?php


/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package blueauthentic
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'wp_body_open' ); ?>


	<div id="top-header">

		<div class="website-logo">
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
			if ( has_custom_logo() ) {
				echo '<img src="' . esc_url( $logo ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			} else {
				echo '<h2>' . get_bloginfo( 'name' ) . '</h2>';
			}
			?>
		</div>

		<div class="social-icons">
			<?php
				$facebook_url = get_option( 'social_facebook_option', '' );
			if ( ! empty( $facebook_url ) ) {
				echo '<div class="social-icon">';
				echo ' <a href="' . esc_url( $facebook_url ) . '"><i class="fab fa-facebook-square"></i></a> ';
				echo '</div>';
				echo '';
			}

				$twitter_url = get_option( 'social_twitter_option', '' );
			if ( ! empty( $twitter_url ) ) {
				echo '<div class="social-icon">';
				echo ' <a href="' . esc_url( $twitter_url ) . '"><i class="fab fa-twitter-square"></i></a> ';
				echo '</div>';
				echo '';
			}

				$youtube_url = get_option( 'social_youtube_option', '' );
			if ( ! empty( $youtube_url ) ) {
				echo '<div class="social-icon">';
				echo ' <a href="' . esc_url( $youtube_url ) . '"><i class="fab fa-twitter-square"></i></a> ';
				echo '</div>';
				echo '';
			}
			?>
		</div>

	</div>


	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable"
			href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md " aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>


			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false"
				aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- The WordPress Menu goes here -->
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>

		</nav>
	</div>
	<!-- #wrapper-navbar end -->
