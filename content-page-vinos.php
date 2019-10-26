<?php
/**
 * The template used for displaying vinos page
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
			<?php
			$args = array( 'post_type' => 'evento', 'posts_per_page' => 12, 'order' => 'DESC' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="col-xs-12 col-md-12 feed-item general">
					<div class="inner-feed">
						<div class="foto" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
							<a href="<?php the_permalink(); ?>"></a>
						</div>
						<div class="info">
							<h3 class="dorado"><?php the_title('<a>', '</a>'); ?></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div> <?php 
			endwhile;
			wp_reset_postdata();?>

		</div>
	</div>
</div><!-- #post-## -->