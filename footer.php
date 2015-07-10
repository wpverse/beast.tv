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

			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
$('.modal').on('shown.bs.modal', function () {
	console.log('pause slider');
  $('.flexslider').flexslider("pause");
});
$('.modal').on('hidden.bs.modal', function () {
	console.log('play slider');
  $('.flexslider').flexslider("play");
});
</script>
</body>
</html>