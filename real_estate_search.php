<?php

add_action( 'wp_ajax_send_message_form', 'display_real_estate_search_results' );
add_action( 'wp_ajax_nopriv_send_message_form', 'display_real_estate_search_results' );


function display_real_estate_search_results() {
	require_once 'include/db.php';
	get_header();

	if ( ! isset( $_POST['real-estate-search-wp-form'] ) ||
		! wp_verify_nonce( $_POST['real-estate-search-wp-form'], 'real-estate-search-form' )
	   ) {

		// Error
		echo '<h2 class"=centered-text"> Error! Please check your input! </h2>';
	} else {
		// Display search results
		$searched_title = $_POST['title'];
		$selected_type  = $_POST['type'];
	}

}
get_footer();
