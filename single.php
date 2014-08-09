<?php
/**
 * The template for displaying all single posts.
 *
 * @package _s
 */

get_header(); ?>

	<div>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php heydonworks_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>

	</div>

<?php get_footer(); ?>