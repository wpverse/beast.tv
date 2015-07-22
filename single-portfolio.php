<?php
/**
 * Template Name: single portfolio
 *
 * @package Neochrome BeastTV
 */

get_header(); 
$post_id = get_queried_object_id();
$post_author_id = get_post_field( 'post_author', $post_id );
$author_name = get_the_author_meta( 'display_name' , $post_author_id );

//$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));


?>
<!-- page-portfolio.php -->
<div id="header-nav">
	<div class="container">	
		<div id="author-navigation" class="author-navigation" role="navigation">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<div class="menu-wrap">
						<h1 class="page-title"><a href="<?php echo home_url( '/' ); ?>cities">Editors</a>><?php echo $author_name; ?></h1>
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

						if ( have_posts() ) : ?>

						<header class="page-header">

							<?php
							$title_image_id = $author_meta[_beast_user_image_id][0];
							echo wp_get_attachment_image($title_image_id,'full'); ?>
							<h1 class="editor-title" ><?php echo $curauth->display_name	?></h1>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php if (has_post_thumbnail($post_id)){
								?>

								<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>

									<div id="<?php echo $post->post_name; ?>" class="city-anchor-offset" data-link-target="post-<?php the_ID(); ?>"></div>
									<img class="vid-play" src="<?php echo get_template_directory_uri(); ?>/images/lightbox_open_129x129.png" >

									<div class="entry-content">
										<a class="editor-thumb" href="#" data-base="#post-<?php the_ID(); ?>">
											<div class="hover-overlay"></div>
											<?php echo get_the_post_thumbnail( $post->ID, 'sixteen_nine_background' ); ?>
										</a>
									</div><!-- .entry-content -->


									<div class="content-area-wrap vid-down">
										<?php
										echo vimeo_processing(get_the_content());
										// the_content();
										?>
									</div>
									<header class="entry-header"><h1 class="entry-title">
										<?php the_title(); ?>
									</h1>


									<div class="video-meta">
										<?php $client = get_post_meta( $post->ID, '_beast_client', true ); ?>
										<span>EDITOR: <?php echo $author_name ?>&nbsp;&nbsp;&nbsp;</span><span>CLIENT: <?php echo $client; ?></span>
									</div>


								</header><!-- .entry-header -->
								<?php } ?>
								<div class="test-tracking"><span class="status">status message</span></div>
							</article><!-- #post-## -->


							<div class="vid-author-link">Select another video from <span class="author-name"><?php the_author_posts_link(); ?></span></div>
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







