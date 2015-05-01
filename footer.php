<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Neochrome BeastTV
 */
?>

</div><!-- #content -->

<footer id="colophon" class="container site-footer" role="contentinfo">
	<div class="row">
		<div class="col-md-12">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'beast' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'beast' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'beast' ), 'Neochrome BeastTV', '<a href="http://neochro.me" rel="designer">Matthew Taylor</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>