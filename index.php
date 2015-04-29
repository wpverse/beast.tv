<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Neochrome Quickstart
 */

get_header(); ?>

<div id="primary" class="container content-area">
	<main id="main" class="row site-main" role="main">


		<?php if ( is_active_sidebar( 'right-sidebar' ) ) { ?>
		<div class="col-md-9">
			<?php } else { ?>
			<div class="col-md-12">
				<?php } ?>


				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div>


		<?php if ( is_active_sidebar( 'right-sidebar' ) ) { ?>
		<div id="secondary" class="col-md-3 widget-area" role="complementary">
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		</div><!-- #secondary -->
		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
