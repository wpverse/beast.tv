<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Neochrome Quickstart
 */
?>

</div><!-- #content -->

<footer id="colophon" class="container site-footer" role="contentinfo">
	<div class="row">
		<div class="col-md-12">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'quickstart' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'quickstart' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'quickstart' ), 'Neochrome Quickstart', '<a href="http://neochro.me" rel="designer">Matthew Taylor</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>