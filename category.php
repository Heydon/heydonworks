<?php
/**
 * The template for displaying all single posts.
 *
 * @package _s
 */

get_header(); ?>

	<div>

		<h1><?php single_cat_title(); ?></h1>
		<p><?php echo category_description( $category_id ); ?></p>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'tool' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div>

<?php get_footer(); ?>