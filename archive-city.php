<?php
/**
 * The template for City Archive
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Neochrome BeastTV
 */

get_header(); ?>
<!-- <?php echo __FILE__; ?> -->
<div id="header-nav">
	<div class="container">	
		<div id="city-navigation" class="archive-navigation" role="navigation">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<div class="menu-wrap">
						<h1 class="page-title">Editors <span class="breadcrumb-caret"></span>> <span id="breadcrumb-city"></span></h1>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #city-navigation -->
</div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div id="city-accordion" class="city-archive-wrap">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php 
					$post_thumbnail_id = get_post_thumbnail_id();
					$img_src = wp_get_attachment_image_src($post_thumbnail_id  , 'hd-background');
					$img_url = $img_src[0];
					$hover_image_id = get_post_meta( $post->ID, '_beast_hover_image_id', true );
					//print_r($hover_image_id);
					$hover_img = wp_get_attachment_image_src( $hover_image_id  , 'hd-background');
					//print_r($hover_img);
					$hover_image_url = $hover_img[0];
					//print_r($hover_image_url);
					// the bootstrap accordian behavior is unfortunately dependent on the accordian groups being wrapped in a .panel element. It is rather silly. But it's a bug/feature we have to work around. We also need to reset the unwanted css for .panel
					?>
					<div class="panel">
						<div id="<?php echo $post->post_name; ?>" class="city-anchor-offset" data-link-target="post-<?php the_ID(); ?>"></div>
						<div <?php post_class('city-wrap clickable'); ?> style=" background-image:url('<?php echo $img_url; ?>');"
							data-parent="#city-accordion"  data-toggle="collapse" data-target="#city-<?php echo $post->post_name; ?>" aria-expanded="false" aria-controls="city-<?php echo $post->post_name; ?>">
							<div class="hover-image" style="background-image:url('<?php echo $hover_image_url; ?>');"></div>
							<div class="container">
								<div class="row city-content">
									<div class="col-md-12">
										<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
											<header class="entry-header col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-0">
												<h1 class="entry-title"><?php the_title(); ?></h1>
											</header><!-- .entry-header -->
											<!-- div class="entry-content col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">

												</div --><!-- .entry-content -->
												<footer class="entry-footer">
													<?php beast_entry_footer(); ?>
												</footer><!-- .entry-footer -->
											</article><!-- #post-## -->
										</div>
									</div>
								</div><!-- end container -->
							</div><!-- post classes and city-wrap -->
							<div id="city-<?php echo $post->post_name; ?>" data-name="<?php echo $post->post_title; ?>" class="collapse">
								<div class="editors-wrap">
									<div class="container">
										<div class="row editors-listed">
											<?php

											$test_val = serialize(strval($post->ID));
											$user_args = array('role' => 'Author', 'meta_key' => '_beast_user_cities','meta_value' => $test_val, 'meta_compare' => 'like'	);
											$user_query = get_users( $user_args );
											foreach ($user_query as $author){ ?>
											<div class="col-sm-6 city-author-column">
												<a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo $author->display_name; ?></a>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div><!-- end panel -->
					<?php endwhile; ?>
					<?php the_posts_navigation(); ?>
				<?php endif; ?>

			</div><!-- city-archive-wrap -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
