<?php
/**
 * @package _s
 */
?>

<article>
	<h1><?php the_title(); ?></h1>
	<footer>
		<time datetime="<?php echo get_the_date('Y-m-d'); ?>">
			<?php echo get_the_date('j M Y'); ?>
		</time> <span aria-hidden>&middot;</span> <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>">Share on Twitter</a>
	</footer>
	<div>
		<?php the_content(); ?>
	</div>
</article>
