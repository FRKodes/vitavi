<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
				
					<?php if ( have_posts() ) : ?>
						<div class="container">
							<div class="row">
								<header class="page-header col-xs-12 col-md-12 text-center mt-20">
									<?php
										the_archive_title( '<h1 class="page-title">', '</h1>' );
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									?>
								</header><!-- .page-header -->
							</div>
						</div>

						<div class="container">
							<div class="row">


						<?php
						get_template_part( 'loop' );?>

							</div>
						</div><?php
					else :

						get_template_part( 'content', 'none' );

					endif;
					?>

					</main><!-- #main -->
				</div><!-- #primary -->


<?php
get_footer();
