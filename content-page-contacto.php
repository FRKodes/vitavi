<?php
/**
 * The template used for displaying puros page
 *
 * @package storefront
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			
		</div>
	</div>
	<?php
	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked storefront_page_header          - 10
	 * @hooked storefront_page_content         - 20
	 */
	do_action( 'storefront_page' );
	?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-lg-6 ml-auto mr-auto">
				<form action="/sendmail" method="post" id="contactForm">
					
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" data-validate="required" placeholder="Nombre*">
					</div>
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" data-validate="required|email" placeholder="Email*">
					</div>
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" data-validate="" placeholder="Teléfono">
					</div>
					<div class="form-group">
						<textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Comentario"></textarea>
					</div>
					<div class="form-group text-right">
						<input type="submit" name="submit" class="btn btn-primary" value="ENVIAR">
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div><!-- #post-## -->