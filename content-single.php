<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php  

	do_action( 'storefront_single_post_top' );

	/**
	 * Functions hooked into storefront_single_post add_action
	 *
	 * @hooked storefront_post_header          - 10
	 * @hooked storefront_post_content         - 30
	 */
	do_action( 'storefront_single_post' );
	

	if (get_the_post_thumbnail_url()) { ?>
		
		<div class="detail-image-header" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div><?php
		
	}


	the_content();


	/**
	 * Functions hooked in to storefront_single_post_bottom action
	 *
	 * @hooked storefront_post_nav         - 10
	 * @hooked storefront_display_comments - 20
	 */
	do_action( 'storefront_single_post_bottom' );
	?>

</article><!-- #post-## -->
