<?php
/**
 * Template Name: Contacts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Neochrome BeastTV
 */

get_header(); ?>
<div id="header-nav">
	<div class="container">	
		<div id="author-navigation" class="author-navigation" role="navigation">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="menu-wrap">
						<h1 class="page-title">Contact</h1>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #city-navigation -->
</div>
<div id="primary" class=" content-area">
	<main id="main" class=" site-main" role="main">


		<div class="container producers">
			<div class="row">
				<div class="col-md-12">
					<h2 class="garamond">Executive Producers</h2>
					<div class="row">
						<?php 
						$producers_args = array(
							'post_type' => 'city',
							'posts_per_page' => -1,
							'orderby' => 'title',
							'order' => 'ASC'
							);
						$producers = new WP_Query($producers_args);
						while ( $producers->have_posts() ) : $producers->the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0'); ?>>
							<header class="entry-header">
								<?php the_title( sprintf( '<h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>

								<?php if ( 'post' == get_post_type() ) : ?>
									<div class="entry-meta">
										<?php beast_posted_on(); ?>
									</div><!-- .entry-meta -->
								<?php endif; ?>
							</header><!-- .entry-header -->

							<div class="entry-content">
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

							<?php endwhile; // end of the loop. ?>
						</div>
					</div>
				</div>
			</div>

			<div class="container producers sales">
				<div class="row">
					<div class="col-md-12">
						<h2 class="garamond">Sales</h2>
						<div class="row">
							<?php 
							$producers_args = array(
								'post_type' => 'sales-contact',
								'posts_per_page' => -1,
								'orderby' => 'meta_value_num',
								'meta_key' => '_beast_sales_contact_order',
								'order'     => 'ASC'
								);
							$producers = new WP_Query($producers_args);
							while ( $producers->have_posts() ) : $producers->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0'); ?>>
								<header class="entry-header">
									<?php the_title( sprintf( '<h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>

									<?php if ( 'post' == get_post_type() ) : ?>
										<div class="entry-meta">
											<?php beast_posted_on(); ?>
										</div><!-- .entry-meta -->
									<?php endif; ?>
								</header><!-- .entry-header -->

								<div class="entry-content">
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

								<?php endwhile; // end of the loop. ?>
							</div>
						</div>
					</div>
				</div>


			</main><!-- #main -->
		</div><!-- #primary -->


		<?php get_footer(); ?>







