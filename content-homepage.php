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
									<?php if (get_field('evento_privado') == true) { ?>
										<div class="ribbon-privado"></div><?php
									} ?>
									<h2 class="mayus text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
								<?php if (get_field('evento_privado') == true) { ?>
									<div class="ribbon-privado mini"></div><?php
								} ?>
								<h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div> <?php 
						endwhile;
						wp_reset_postdata();?>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h2 class="title dorado bold text-center m-top-40">VIDEOS</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3 item-video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/VZ7R7Mpj4o4?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ></iframe>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3 item-video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/-Ajy6yxl4Vs?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ></iframe>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3 item-video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/Ex_sW4qA3do?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ></iframe>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3 item-video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/H18jvmByYIU?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ></iframe>
			</div>
		</div>

	</div>

	<div class="container sobre-vitavi">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-lg-8 ml-auto mr-auto">
				<h2 class="title dorado bold text-center m-top-40">SOBRE VITAVI</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis saepe dolorem, iure aperiam aliquam animi nihil expedita cum. Perferendis quidem cumque eos blanditiis aspernatur, a nihil facilis quo facere officiis.</p>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-lg-8 ml-auto mr-auto newsletter-container text-center">
				<h2 class="title dorado bold text-center m-top-40">¡SUSCRÍBETE A NUESTRO NEWSLETTER!</h2>
				<p>Entérate antes que nadie de los mejores eventos directo en tu correo.</p>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-10 col-lg-5 ml-auto mr-auto newsletter-container text-center">
				<form action="">
					<div class="form-group">
						<input type="text" name="" class="form-control" placeholder="Tu correo electrónico">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary width-100" value="SUSCRIBIRME">
					</div>
				</form>
			</div>
		</div>
		
	</div>

	<div class="container">	
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<div class="inner vino"><a href="/vitavi/vinos"><h2>VINO</h2></a></div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="inner spirits"><a href="/vitavi/spirits"><h2>SPIRITS</h2></a></div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="inner puros"><a href="/vitavi/tabacos"><h2>TABACOS</h2></a></div>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-12 col-md-10 col-lg-8 mr-auto ml-auto">
				<p class="text-center daily-phrase">
					<?php
					$today = getdate();
					$args = array( 
						'post_type' => 'frase', 
						'posts_per_page' => 1, 
						'date_query' => array(
						            array(
						              'year'  => $today['year'],
						              'month' => $today['mon'],
						              'day'   => $today['mday']
						            ),
						          ),
					);

					// echo "Date: " . $today['year'] . " - " . $today['mon'] . " - " . $today['mday'] . " - " ;

					$loop = new WP_Query( $args );
					if ($loop) {
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							"<?php echo get_the_content(); ?>" <br><br>
							<span class="dorado bold">- <?php the_title(); ?></span>
							<?php 
						endwhile;
						wp_reset_postdata();
					}else{
						?>
						"Hoy no hay frase" <br><br>
						<?php
					}?>
				</p>
			</div>
		</div>
	</div>
</div><!-- #post-## -->
