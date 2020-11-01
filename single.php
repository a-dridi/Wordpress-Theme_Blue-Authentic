<?php

get_header();

?>

<main id="main" class="site-main" role="main">

<?php

while ( have_posts() ) {
	the_post();
	get_template_part( 'template-parts/sitecontent', get_post_type() );
}

the_posts_pagination(
	array(
		'prev_next' => __( '< Prev. Page' ),
		'next_text' => __( '> Next Page' ),
	)
);


?>
</main>

<?php
get_sidebar();
get_footer();
