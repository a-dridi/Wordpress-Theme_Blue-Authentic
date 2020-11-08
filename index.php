<?php
require_once 'include/db.php';
get_header();
?>

<div id="main-container">
	<div class="main-container-title">
		<h3>Real Estate made easy!</h3>
	</div>
	<div>
		<p>Here you can find <span class="typing-text"></span><span class="cursor">&nbsp;</span></p>
	</div>
	<div class="real-estate-search-container">
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
