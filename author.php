<?php
/**
 * The template for author archive.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Neochrome BeastTV
 */

get_header(); 


$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));


?>
<div id="header-nav">
	<div class="container">	
		<div id="author-navigation" class="author-navigation" role="navigation">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<div class="menu-wrap">
						<h1 class="page-title"><a href="<?php echo home_url( '/' ); ?>cities">Editors</a>><?php echo $curauth->display_name; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #city-navigation -->
</div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="portfolio-background">
			<div class="container">

				<div class="row">
					<div class="col-md-12">
						<?php 
						//echo $curauth->display_name;
						//echo '<br>';
						//print_r($curauth);
						//echo '<br><br>';
						$author_meta = get_user_meta($curauth->ID);
						//print_r($author_meta);
						//echo '<br>';
						?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<?php
						$portfolio_args = array(
							'post_type' => 'portfolio',
							'posts_per_page' => '15',
							'author' => $curauth->ID
							);
						$portfolios = new WP_Query($portfolio_args);



						if ( $portfolios->have_posts() ) : ?>

						<header class="page-header">

							<?php
							$title_image_id = $author_meta[_beast_user_image_id][0];
							echo wp_get_attachment_image($title_image_id,'full'); ?>
							<h1 class="editor-title" ><?php echo $curauth->display_name	?></h1>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( $portfolios->have_posts() ) : $portfolios->the_post(); ?>

							<?php if (has_post_thumbnail($post_id)){
								?>

								<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
								<div class="modal-hover"><img class="lightbox-close" src="<?php echo get_template_directory_uri(); ?>/images/lightbox_open_129x129.png" ></div>
									<header class="entry-header"><h1 class="entry-title">
										<?php the_title(); ?>
									</h1>
									<div class="video-meta">
										<?php $client = get_post_meta( $post->ID, '_beast_client', true ); ?>
										<span>EDITOR: <?php echo $curauth->display_name; ?>&nbsp;&nbsp;&nbsp;</span><span>CLIENT: <?php echo $client; ?></span>

									</div>
								</header><!-- .entry-header -->

								<div class="entry-content">
									<a class="editor-thumb" href="#" data-toggle="modal" data-target="#modal-<?php echo $post->ID; ?>">
									<div class="hover-overlay"></div>
										<?php echo get_the_post_thumbnail( $post->ID, 'sixteen_nine_background' ); ?>
									</a>
								</div><!-- .entry-content -->
								<?php } ?>
								<div class="modal fade" id="modal-<?php echo $post->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body">
												<?php the_content(); ?>	
												<div class="spot-title"><?php the_title(); ?></div>
											</div>
											<div class="modal-closer">

												<a href="#" type="button" class="modal-closer-button" data-dismiss="modal">
													<img class="lightbox-close" src="<?php echo get_template_directory_uri(); ?>/images/lightbox_close_100x100.png" >
												</a>

											</div>					
										</div>
									</div>
								</div>
							</article><!-- #post-## -->

						<?php endwhile; ?>

					<?php endif; ?>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end portfolio-background -->
</main><!-- #main row -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
