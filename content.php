<?php
/**
 * @package maruchan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-thumb">
		<?php if ( has_post_thumbnail() ) {
		  the_post_thumbnail('thumbnail'); 
		} ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-thumb">
		<?php if ( has_post_thumbnail() ) {
		  the_post_thumbnail('thumbnail'); 
		} ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
