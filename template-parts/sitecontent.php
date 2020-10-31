<?php
/**
 * Template part for posts
 */
?>

<article id="post-<?php the_ID(); ?>" class="entry">
	<header class="entry-header">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
