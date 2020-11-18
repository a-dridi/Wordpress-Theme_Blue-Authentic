<?php
require_once 'include/db.php';
get_header();
?>

<div id="main-container">
	<div class="main-container-title">
		<h3>Real Estate made easy!</h3>
	</div>
	<div class="main-container-slogan">
		<p>Here you can find <span class="typing-text"></span><span id="typedtext-cursor" class="cursor"
				typedtext1="affordable flat" typedtext2="duplex" typedtext3="holiday house"
				typedtext4="ranch-style house">&nbsp;</span></p>
	</div>
	<div id="real-estate-search-container">
		<form id="real-estate-search-form">
			<input type="text" name="title">
			<select id="type">
				<?php
				$super_category = get_category_by_slug( 'real-estate' );
				$args           = array( 'child_of' => $super_category->term_id );
				$sub_categories = get_categories( $args );
				foreach ( $sub_categories as $category ) {
					?>
				<option value="<?php $category; ?>"></option>
					<?php
				}
				?>
			</select>

			<?php wp_nonce_field( 'start_real_estate_search_form', 'real-estate-search-wp-form' ); ?>
			<button class="real-estate-search-button" type="submit">Search</button>
		</form>
	</div>
</div>

<div id="numbers-counter-container">
	<div>
		<div class="number-counter" data-target="<?php get_row_count_by_flat_type( 'Single Appartment' ); ?>">0</div>
		<h3>Single Appartments</h3>
	</div>
	<div>
		<div class="number-counter" data-target="<?php get_row_count_by_flat_type( 'Mansion' ); ?>">0</div>
		<h3>Mansions</h3>
	</div>
	<div>
		<div class="number-counter" data-target="<?php get_row_count_by_flat_type( 'Family Home' ); ?>">0</div>
		<h3>Family Homes</h3>
	</div>
</div>

<?php

get_footer();
