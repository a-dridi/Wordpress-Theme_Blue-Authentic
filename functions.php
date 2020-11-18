<?php
/**
 * Theme functions and definitions
 *
 * @package UnderStrap
 */

defined( 'ABSPATH' ) || exit;

require 'real_estate_description_meta_box.php';
require 'real_estate_search.php';

function load_include_files() {

	$theme_include_path = get_template_directory() . '/include/';

	// Files that are included - in the folder "include"
	$included_files = array(
		'class-wp-bootstrap-navwalker.php',
	);

	foreach ( $included_files as $item_file ) {
		require_once $theme_include_path . $item_file;
	}
}
load_include_files();

/**
 * Load styles of theme
 */
function blueauthentic_load_styles() {
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'blueauthentic-style', get_template_directory_uri() . '/css/style.min.css', array( 'blueauthentic-bootstrap', 'blueauthentic-fontawesome' ), $theme_version, 'all' );
	wp_enqueue_style( 'blueauthentic-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2', 'all' );
	wp_enqueue_style( 'blueauthentic-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css', array(), '5.15.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'blueauthentic_load_styles' );

/**
 * Load scripts of theme
 */
function blueauthentic_load_scripts() {
	wp_enqueue_script( 'blueauthentic-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true );
	wp_enqueue_script( 'blueauthentic-main-container-js', get_template_directory_uri() . '/js/frontpage-main-container.js', array(), '1.0.0', true );
	wp_enqueue_script( 'blueauthentic-numbers-counter-js', get_template_directory_uri() . '/js/numbers-counter.js' );
}
add_action( 'wp_enqueue_scripts', 'blueauthentic_load_scripts' );

/**
 * Load website logo settings
 */
function blueauthentic_custom_logo_setup() {
	$defaults = array(
		'height'               => 150,
		'width'                => 450,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true,
	);
	add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'blueauthentic_custom_logo_setup' );



/**
 * Load theme settings page
 */
function blueauthentic_theme_settings_page() {
	?>
<div class='wrap'>
	<h1> Theme Settings </h1>
			<form method='post' action='options.php'>
				<?php
				settings_fields( 'theme-options-group-social' );
					do_settings_sections( 'theme-options-section-social' );
				submit_button();
				?>
			</form>
</div>
	<?php
}

function blueauthentic_social_section_description() {
	echo '<p>Add all URLs/links of your social media accounts, that should be displayed in the header section of the website.</p>';
}


function blueauthentic_add_theme_menu_item() {
	add_theme_page( 'Theme Customization', 'Theme Customization', 'manage_options', 'theme-options-section-social', 'blueauthentic_theme_settings_page', null, 99 );
}
add_action( 'admin_menu', 'blueauthentic_add_theme_menu_item' );


/**
 * Load all setting fields of the setting section "social
 */

function social_facebook_option_callback() {
	$facebook_option_value = get_option( 'blueauthentic_social_facebook_option' );
	if ( ! empty( $facebook_option_value ) ) {
		echo '<input name="social_facebook_option" id="social_facebook_option" type="text" value="' . $facebook_option_value . '" class="code" />';
	} else {
		echo '<input name="social_facebook_option" id="social_facebook_option" type="text" value="" class="code"/> ';
	}
}

function social_twitter_option_callback() {
	 $twitter_option_value = get_option( 'blueauthentic_social_twitter_option' );
	if ( ! empty( $twitter_option_value ) ) {
		echo '<input name="blueauthentic_social_twitter_option" id="blueauthentic_social_twitter_option" type="text" value="' . $twitter_option_value . '" class="code" />';
	} else {
		echo '<input name="blueauthentic_social_twitter_option" id="blueauthentic_social_twitter_option" type="text" value="" class="code"/> ';
	}
}

function social_youtube_option_callback() {
	 $youtube_option_value = get_option( 'blueauthentic_social_youtube_option' );
	if ( ! empty( $youtube_option_value ) ) {
		echo '<input name="blueauthentic_social_youtube_option" id="blueauthentic_social_youtube_option" type="text" value="' . $youtube_option_value . '" class="code" />';
	} else {
		echo '<input name="blueauthentic_social_youtube_option" id="blueauthentic_social_youtube_option" type="text" value="" class="code"/> ';
	}
}


/**
 * Add all settings sections and their settings options to the settings page
 */
function blueauthentic_theme_settings() {
	blueauthentic_social_settings();
	blueauthentic_frontpage_settings();
}
add_action( 'admin_init', 'blueauthentic_theme_settings' );

function blueauthentic_social_settings() {
	add_settings_section(
		'social_section',
		'Social Media Account Links/URLs',
		'blueauthentic_social_section_description',
		'theme-options-section-social'
	);

	add_option( 'blueauthentic_social_facebook_option', '' );
	add_settings_field(
		'blueauthentic_social_facebook_option',
		'Facebook Account',
		'social_facebook_option_callback',
		'theme-options-section-social',
		'social_section'
	);
	register_setting( 'theme-options-group-social', 'blueauthentic_social_facebook_option' );

	add_option( 'blueauthentic_social_twitter_option', '' );
	add_settings_field(
		'blueauthentic_social_twitter_option',
		'Twitter Account',
		'social_twitter_option_callback',
		'theme-options-section-social',
		'social_section'
	);
	register_setting( 'theme-options-group-social', 'blueauthentic_social_twitter_option' );

	add_option( 'blueauthentic_social_youtube_option', '' );
	add_settings_field(
		'blueauthentic_social_youtube_option',
		'Youtube Account',
		'social_youtube_option_callback',
		'theme-options-section-social',
		'social_section'
	);
	register_setting( 'theme-options-group-social', 'blueauthentic_social_youtube_option' );

}

function blueauthentic_frontpage_settings() {

	add_settings_section(
		'typedtext_section',
		'Front Page - Typed Text Words',
		'blueauthentic_typedtext_section_description',
		'theme-options-section-typedtext'
	);

	add_option( 'blueauthentic_frontpage_typedtext1', 'affordable flat' );
	add_settings_field(
		'blueauthentic_frontpage_typedtext1',
		'Typed Text 1',
		'frontpage_typedtext1_option_callback',
		'theme-options-section-typedtext',
		'typedtext_section'
	);
	register_setting( 'theme-options-section-typedtext', 'blueauthentic_frontpage_typedtext1' );

}



?>
