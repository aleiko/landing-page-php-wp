<?php
/**
 * Enqueue scripts and styles.
 */
function idl_scripts() {

	$localize_arr = array(
		'home_url' => home_url(),
		'home_path' => get_stylesheet_directory_uri(),
		'ajax_url' => admin_url('admin-ajax.php'),
	);

    // deregister the jquery version bundled with wordpress
    wp_deregister_script( 'jquery' );

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '', true );

    //Bootstrap scripts
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

    //Fancybox scripts
    wp_enqueue_script( 'idl-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '', true );

    //Fancybox scripts
    wp_enqueue_script( 'idl-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '', true );

    //Placeholders js
    wp_enqueue_script( 'idl-placeholder', get_template_directory_uri() . '/js/placeholders.js', array('jquery'), '', true );

    //Google map
	$key = get_field('map_api_key', 'options');
	$map_src = 'https://maps.googleapis.com/maps/api/js';
	if($key){
		$map_src = 'https://maps.googleapis.com/maps/api/js?key='.$key;
	}
    wp_enqueue_script( 'idl-google--map', $map_src, array('jquery'), '', true );

    //Custom scripts
    wp_enqueue_script( 'idl-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true );

	wp_localize_script( 'idl-scripts', 'wp_helper', $localize_arr );

    // Styles
    //Custom style
    wp_enqueue_style( 'idl-styles', get_template_directory_uri() . '/css/styles.css', null, null );

    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', null, null );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'idl_scripts' );

/**
 * Admin styles
 */
function idl_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/css/admin-editor-styles.css' );
}
add_action( 'init', 'idl_theme_add_editor_styles' );