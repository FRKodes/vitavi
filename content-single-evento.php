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
				<?php if(is_user_logged_in()){ ?>
					<p>
						<span class="icon icon-watch dorado"></span>
						<span class="info"><?php the_field('fecha_evento') ?></span>
					</p>
					<p>
						<span class="icon icon-place dorado"></span>
						<span class="info"><?php the_field('ubicacion') ?></span>
					</p>
					<p>
						<span class="icon icon-boletos dorado"></span>
						<span class="info"><a href="<?php the_field('enlace_boletos') ?>">Conseguir entradas</a></span>
					</p>
				<?php } ?>
			</div>

		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 m-top-20">
				<h2 class="desc">GALERÍA</h2>
			</div>

		    		<!-- <div class="detail-gallery-container">
						<?php foreach( $images as $image ): 
							$thumbnail_image = esc_url($image['url']); ?>
							<div class="gallery-item" style="background-image: url(<?php echo $thumbnail_image; ?>);"></div>
						<?php endforeach; ?>
					</div> -->

				<?php $images = get_field('galeria_imagenes');
				if( $images ): 
					foreach( $images as $image ): ?>
						<div class="col-xs-12 col-md-6 col-lg-4 gallery-item-x m-top-20">
							<img src="<?php echo esc_url($image['url']); ?> " alt="">
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
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
