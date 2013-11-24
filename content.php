<?php
/**
 * @package maruchan
 */
	$class_array = get_post_class();
	$class_attr = "col-sm-1 ";
	foreach ($class_array as $v) {$class_attr .= $v . ' '; }
?>
	<article id="post-<?php the_ID(); ?>" class="<?php  echo $class_attr; ?>" data="<?php echo get_the_date("Y-m-d") ?>">
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