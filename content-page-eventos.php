<?php
/**
 * The template used for displaying eventos page
 *
 * @package storefront
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			$args_ = array( 'post_type' => 'evento', 'posts_per_page' => 1, 'order' => 'DESC' );
			$loop = new WP_Query( $args_ );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="item col-md-12 feed-main-new">
					<div class="inner-container" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
						<h2 class="mayus text-center"><?php the_title('<a>', '</a>'); ?></h2>
					</div>
				</div> <?php 
			endwhile;
			wp_reset_postdata();

			$args = array( 'post_type' => 'evento', 'posts_per_page' => 3, 'offset' => 1, 'order' => 'DESC' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="col-xs-12 col-md-6 col-lg-4 feed-item">
					<div class="inner-feed">
						<div class="foto" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
							<a href="<?php the_permalink(); ?>"></a>
						</div>
						<div class="info">
							<h3 class="text-center dorado"><?php the_title('<a>', '</a>'); ?></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div> <?php 
			endwhile;
			wp_reset_postdata();?>

		</div>
	</div>
</div><!-- #post-## -->