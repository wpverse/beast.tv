<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Neochrome BeastTV
 */

get_header(); ?>

<div id="primary" class="container content-area">
	<main id="main" class="row site-main" role="main">


		<?php if ( is_active_sidebar( 'right-sidebar' ) ) { ?>
		<div class="col-md-9">
			<?php } else { ?>
			<div class="col-md-12">
				<?php } ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>
			</div>



		</main><!-- #main -->
	</div><!-- #primary -->


	<?php get_footer(); ?>







