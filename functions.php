<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */


function vitavi_theme_scripts() {
    wp_enqueue_style( 'vitavi-stylesss', get_stylesheet_directory_uri(). '/vitavi-styles.css', array('storefront-style', 'storefront-woocommerce-style'), 1.0, 'all' );
    wp_enqueue_script( 'scripts-vitavi', get_stylesheet_directory_uri() . '/all.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'vitavi_theme_scripts' );


function remove_wc_actions() {
	
	remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
	remove_action( 'storefront_header', 'storefront_product_search', 40 );
	remove_action( 'storefront_header', 'storefront_header_cart', 60 );
	remove_action( 'storefront_header', 'storefront_header_container_close', 41 );
	remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
	remove_action( 'homepage', 'storefront_product_categories', 20);
	remove_action( 'homepage', 'storefront_recent_products', 30);
	remove_action( 'homepage', 'storefront_featured_products', 40);
	remove_action( 'homepage', 'storefront_popular_products', 50);
	remove_action( 'homepage', 'storefront_on_sale_products', 60);
	remove_action( 'homepage', 'storefront_best_selling_products', 70);
    remove_action( 'storefront_single_post', 'storefront_post_content', 30 );

    // add_action( 'storefront_single_post_bottom', 'storefront_post_content', 1 );

} 

add_action('init','remove_wc_actions',10);


if ( ! function_exists( 'storefront_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_site_branding() {
		?>
		<div class="site-branding">
			<a href="/">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_vitavil.svg" alt="logo vitavi">
			</a>
		</div>
		<?php
	}
}

add_action( 'init', 'create_banner_post_type' );

function create_banner_post_type() {
    register_post_type( 'banner',
        array(
            'labels' => array(
                'name' => 'Banners',
                'singular_name' => 'Banner',
                'add_new' => 'Agregar nuevo',
                'add_new_item' => 'Agregar nuevo Banner',
                'edit' => 'Editar',
                'edit_item' => 'Editar Banner',
                'new_item' => 'Nueva Banner',
                'view' => 'Ver',
                'view_item' => 'Ver Banner',
                'search_items' => 'Buscar Banner',
                'not_found' => 'No se encontró el Banner',
                'not_found_in_trash' => 'No se encontró el Banner en la papelera',
                'parent' => 'Banner padre'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( '' ),
            // 'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_action( 'init', 'create_evento_post_type' );

function create_evento_post_type() {
    register_post_type( 'evento',
        array(
            'labels' => array(
                'name' => 'Eventos',
                'singular_name' => 'Evento',
                'add_new' => 'Agregar nuevo',
                'add_new_item' => 'Agregar nuevo Evento',
                'edit' => 'Editar',
                'edit_item' => 'Editar Evento',
                'new_item' => 'Nueva Evento',
                'view' => 'Ver',
                'view_item' => 'Ver Evento',
                'search_items' => 'Buscar Evento',
                'not_found' => 'No se encontró el Evento',
                'not_found_in_trash' => 'No se encontró el Evento en la papelera',
                'parent' => 'Evento padre'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'taxonomies' => array( '' ),
            // 'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_action( 'init', 'create_event_taxonomies', 0 );

function create_event_taxonomies() {
    register_taxonomy(
        'categoria_evento',
        'evento',
        array(
            'labels' => array(
                'name' => 'Categorías Evento',
                'add_new_item' => 'Agregar Nueva categoria',
                'new_item_name' => "Nueva Categoría"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}


if ( ! function_exists( 'storefront_post_header' ) ) {
    /**
     * Display the post header with a link to the single post
     *
     * @since 1.0.0
     */
    function storefront_post_header() {
        ?>
        <header class="entry-header">
        <?php

        /**
         * Functions hooked in to storefront_post_header_before action.
         *
         * @hooked storefront_post_meta - 10
         */
        do_action( 'storefront_post_header_before' );

        if ( is_single() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } else {
            the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        }

        do_action( 'storefront_post_header_after' );
        ?>
        </header><!-- .entry-header -->
        <?php
    }
}

if ( ! function_exists( 'storefront_post_content' ) ) {
    /**
     * Display the post content with a link to the single post
     *
     * @since 1.0.0
     */
    function storefront_post_content() {
        ?>
        <div class="entry-content">
        <?php

        /**
         * Functions hooked in to storefront_post_content_before action.
         *
         * @hooked storefront_post_thumbnail - 10
         */
        // do_action( 'storefront_post_content_before' );

        the_content(
            sprintf(
                /* translators: %s: post title */
                __( 'Continue reading %s', 'storefront' ),
                '<span class="screen-reader-text">' . get_the_title() . '</span>'
            )
        );

        do_action( 'storefront_post_content_after' );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
                'after'  => '</div>',
            )
        );
        ?>
        </div><!-- .entry-content -->
        <?php
    }
}