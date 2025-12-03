<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package growink
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-info">
			<div class="copyrights">
				<?php
				global $growink_redux;

				$footer_text = isset($growink_redux['footer_text']) ? $growink_redux['footer_text'] : 'جميع الحقوق محفوظة © 2024';
				?>
				<span class="footer_text"><?php echo esc_html($footer_text); ?></span>
			</div>
		</div>
		<div class="footer-widgets-area">

			<?php
			if (is_active_sidebar('footer-1')) {
				dynamic_sidebar('footer-1');
			}
			?>


		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>