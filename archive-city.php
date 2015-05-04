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
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="city-archive-wrap">


			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php 
					$post_thumbnail_id = get_post_thumbnail_id();
					$img_src = wp_get_attachment_image_src($post_thumbnail_id  , 'hd-background');
					$img_url = $img_src[0];
					?>
					<div <?php post_class('city-wrap'); ?> style="background-image:url('<?php echo $img_url; ?>');">
						<div class="container">
							<div class="row city-content">
								<div class="col-md-12">



									<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
										<header class="entry-header col-sm-8">
											<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

											<?php if ( 'post' == get_post_type() ) : ?>
												<div class="entry-meta">
													<?php beast_posted_on(); ?>
												</div><!-- .entry-meta -->
											<?php endif; ?>
										</header><!-- .entry-header -->

										<div class="entry-content col-sm-4">
											<?php
											/* translators: %s: Name of current post */
											the_content( sprintf(
												__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'beast' ),
												the_title( '<span class="screen-reader-text">"', '"</span>', false )
												) );
												?>

												<?php
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
							<div class="editors-wrap">
								<div class="container">
									<div class="row editors-listed">
										

										<?php
										$test_val = serialize(strval($post->ID));
										$user_args = array(
											'role' => 'Author',

											'meta_key'     => '_beast_user_cities',
											'meta_value'   => $test_val,
											'meta_compare' => 'like'

											);
										$user_query = get_users( $user_args );


										foreach ($user_query as $author){ ?>
										<div class="col-md-6 city-author-column">
											<a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo $author->display_name; ?></a>
										</div>
										<?php
									}

									?>
									
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<?php the_posts_navigation(); ?>
				<?php endif; ?>

			</div><!-- city-archive-wrap -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
