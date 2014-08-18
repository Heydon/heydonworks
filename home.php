<?php
/**
 * This is the homepage template
 *
 * @package heydonworks
 */

get_header(); ?>

<div>
	<h1 class="main-logo"><?php bloginfo( 'name' ); ?></h1>
	<p>The works and workings of <a href="http://twitter.com/heydonworks">Heydon</a>. A blog about interaction design and creativity.</p>
	<h2>Latest Articles</h2>
</div>

<ol aria-label="articles by date, newest first">

	<?php query_posts('cat=-3'); ?>

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'teaser' );
			?>

		<?php endwhile; ?>

		<?php heydonworks_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>
</ol>

<?php get_footer(); ?>