<?php
/**
 * Template used to display post content on single events.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<?php do_action( 'storefront_single_post_top' ); ?>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 m-top-20 background-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
				<?php
				/**
				 * Functions hooked into storefront_single_post add_action
				 *
				 * @hooked storefront_post_header          - 10
				 */
				do_action( 'storefront_single_post' );?>
			</div>
		</div>
	</div>



	<div class="container">
		<div class="row">
			
			<div class="col-xs-12 col-md-12 m-top-20">
				<h2 class="desc">DESCRIPCIÓN</h2>
			</div>

			<div class="col-xs-12 col-md-12 col-lg-7 content-txt">
				<?php the_content(); ?>
			</div>

			<div class="col-xs-12 col-md-12 col-lg-4 ml-auto detalles">
				<p>
					<span class="icon-watch"></span> Jueves 12 Diciembre 2019 de 21:00 a 23:55 Hrs.
				</p>
				<p>
					<span class="icon-pin"></span> <b>Conjunto Santander</b> <br>
					Lorem ipsum dolor sit amet #201.
				</p>
				<p>
					<a href="#">Conseguir entradas</a>
				</p>
			</div>

		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 m-top-20">
				<h2 class="desc">GALERÍA</h2>
				<figure>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/galeria.png" alt="galeria">
				</figure>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<?php
				/**
				 * Functions hooked in to storefront_single_post_bottom action
				 *
				 * @hooked storefront_post_content	   - 1
				 * @hooked storefront_post_nav         - 10
				 * @hooked storefront_display_comments - 20
				 */
				do_action( 'storefront_single_post_bottom' );
				?>			
			</div>
		</div>
	</div>
	
</article><!-- #post-## -->
