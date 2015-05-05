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
 * @package Neochrome BeastTV
 */

get_header(); ?>
<?php
$slide_args = array(
	'post_type' => 'home-slides'
	);
$slides = new WP_Query($slide_args);

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main flexslider-container" role="main">
			<div class="flexslider">
				<?php if ( $slides->have_posts() ) : ?>
					<ul class="slides">
						<?php /* Start the Loop */ ?>
						<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>

							<?php
							$post_thumbnail_id = get_post_thumbnail_id();
							$img_src = wp_get_attachment_image_src($post_thumbnail_id  , 'hd-background');
							$img_url = $img_src[0];
							?>
							<li <?php post_class('home-slide'); ?> style="background-image:url('<?php echo $img_url; ?>');">
<div class="slide-title"><?php the_title();?></div>
							</li>
						<?php endwhile; ?>
					</ul>				
				<?php endif; ?>
			</div><!-- flexslider -->
	</main><!-- #main .site-main .flexslider-container-->
</div><!-- #primary -->

<?php get_footer(); ?>
