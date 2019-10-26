<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">
			<div class="row text-center middle-centered">
				<div class="col-xs-12 col-md-4">
					<ul class="footer-social-menu">
						<li><a href="mailto:info@vitavi.com" target="_blank" title="Envíanos un correo">info@vitavi.com</a></li>
						<li><a class="icon-ig" target="_blank" href="https://instagram.com"></a></li>
						<li><a class="icon-tw" target="_blank" href="https://twitter.com"></a></li>
					</ul>
				</div>
				
				<div class="col-xs-12 col-md-4 text-center">
					<img class="logo-footer" src="<?php echo get_stylesheet_directory_uri(). '/assets/images/logo_vitavil.svg' ?>" alt="Logo vitavi footer">
				</div>

				<div class="col-xs-12 col-md-4">
					<ul class="footer-menu-privacy mayus">
						<li class=""><a href="#">Políticas de privacidad</a></li>
						<li class="">Todos los derechos reservados</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			// do_action( 'storefront_footer' );
			?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
