<?php
/**
 * The template used for displaying page content in template-homepage.php
 *
 * @package storefront
 */

?>
<?php
$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="<?php storefront_homepage_content_styles(); ?>" data-featured-image="<?php echo esc_url( $featured_image ); ?>">
	<div class="col-full">
		<?php
		/**
		 * Functions hooked in to storefront_page add_action
		 *
		 * @hooked storefront_homepage_header      - 10
		 * @hooked storefront_page_content         - 20
		 */
		do_action( 'storefront_homepage' );
		?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="columns-container">
					
					<div class="news-left-col"><?php
							$args_ = array( 'post_type' => 'evento', 'posts_per_page' => 1, 'order' => 'DESC' );
							$loop = new WP_Query( $args_ );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="item main-new" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
									<h2 class="mayus text-center"><?php the_title('<a>', '</a>'); ?></h2>
								</div> <?php 
							endwhile;
							wp_reset_postdata();?>
					</div>
					<div class="news-right-col">
						<?php
						$args = array( 'post_type' => 'evento', 'posts_per_page' => 3, 'offset' => 1, 'order' => 'DESC' );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="item" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
								<h3 class="text-center"><?php the_title('<a>', '</a>'); ?></h3>
							</div> <?php 
						endwhile;
						wp_reset_postdata();?>
					</div>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<div class="inner vino"><a href="#"><h2>VINO</h2></a></div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="inner spirits"><a href="#"><h2>SPIRITS</h2></a></div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="inner puros"><a href="#"><h2>PUROS</h2></a></div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-10 col-lg-8 mr-auto ml-auto">
				<p class="text-center daily-phrase">
					"Vieja madera para arder, vino viejo para beber, viejos amigos en quien confiar y viejos autores para leer." <br><br>
					<span class="dorado bold">- Francis Bacon</span>
				</p>
			</div>
		</div>
	</div>
</div><!-- #post-## -->
