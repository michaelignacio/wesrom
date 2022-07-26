<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

/**
 * Registers the ACF custom block Post Grid
 *
 */
function wesrom_custom_blocks() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a Post Grid block.
        acf_register_block_type(array(
            'name'              => 'post-grid',
            'title'             => __('Post Grid'),
            'description'       => __('A custom post grid.'),
            'render_template'   => 'template-parts/blocks/post-grid.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'post', 'grid' ),
        ));

        // register a Testimonial Slider block.
        acf_register_block_type(array(
            'name'              => 'testimonial-slider',
            'title'             => __('Testimonial Slider'),
            'description'       => __('A custom testimonial slider.'),
            'render_template'   => 'template-parts/blocks/testimonial-slider.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'slider' ),
        ));
    }
}

add_action('acf/init', 'wesrom_custom_blocks');

/**
 * Register WP menu locations
 *
 */
if ( ! function_exists( 'wesrom_register_nav_menu' ) ) {
 
    function wesrom_register_nav_menu(){
        register_nav_menus( array(
            'footer_menu_1'  => __( 'Footer Menu 1', 'wesrom' ),
            'footer_menu_2'  => __( 'Footer Menu 2', 'wesrom' ),
        ) );
    }
    add_action( 'after_setup_theme', 'wesrom_register_nav_menu', 0 );
}

/**
 * Register widget areas
 *
 */
function wesrom_widgets_init() {
    register_sidebar( array(
        'name'          => 'Footer Address Widget Area',
        'id'            => 'footer-address-widget',
        'before_widget' => '',
        'after_widget'  => '',
    ) );

    register_sidebar( array(
        'name'          => 'Socials Widget Area',
        'id'            => 'footer-socials-widget',
        'before_widget' => '',
        'after_widget'  => '',
    ) );
}
add_action( 'widgets_init', 'wesrom_widgets_init' );