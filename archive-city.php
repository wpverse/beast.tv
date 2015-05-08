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
				<div class="col-sm-10 col-sm-offset-1">
					<div class="menu-wrap">
						<h1 class="page-title">Editors</h1>
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

					// the bootstrap accordian behavior is unfortunately dependent on the accordian groups being wrapped in a .panel element. It is rather silly. But it's a bug/feature we have to work around. We also need to reset the unwanted css for .panel
					?>
					<div class="panel">
						<div <?php post_class('city-wrap clickable'); ?> style="background-image:url('<?php echo $img_url; ?>');"
							data-parent="#city-accordion"  data-toggle="collapse" data-target="#city-<?php echo $post->post_name; ?>" aria-expanded="false" aria-controls="city-<?php echo $post->post_name; ?>">
							<div class="container">
								<div class="row city-content">
									<div class="col-md-12">
										<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
											<header class="entry-header col-sm-8">
												<h1 class="entry-title"><?php the_title(); ?></h1>
											</header><!-- .entry-header -->
											<div class="entry-content col-sm-4">
												<?php
												/* translators: %s: Name of current post */
												the_content( sprintf(
													__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'beast' ),
													the_title( '<span class="screen-reader-text">"', '"</span>', false )
													) );
												wp_link_pages( array(
													'before' => '<div class="page-links">' . __( 'Pages:', 'beast' ),
													'after'  => '</div>',
													) );
													?>
												</div><!-- .entry-content -->
												<footer class="entry-footer">
													<?php beast_entry_footer(); ?>
												</footer><!-- .entry-footer -->
											</article><!-- #post-## -->
										</div>
									</div>
								</div><!-- end container -->
							</div><!-- post classes and city-wrap -->
							<div id="city-<?php echo $post->post_name; ?>" class="collapse">
								<div class="editors-wrap">
									<div class="container">
										<div class="row editors-listed">
											<?php
								//print_r($post);
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
