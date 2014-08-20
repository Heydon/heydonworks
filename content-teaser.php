<?php
/**
 *
 * posts to appear in an ordered list
 *
 * @package heydonworks
 */
?>

<li>
	<div>
		<h3><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<footer>
			<time datetime="<?php echo get_the_date('Y-m-d'); ?>">
				<?php echo get_the_date('j M Y'); ?>
			</time>
		</footer>
		<?php the_excerpt(); ?>
	</div>
</li>
