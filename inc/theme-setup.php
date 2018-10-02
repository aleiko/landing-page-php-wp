<?php
if ( ! function_exists( 'idl_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function idl_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Idl, use a find and replace
         * to change 'idl' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'idl', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
	    if ( function_exists( 'add_image_size' ) ) {
		    add_image_size( 'about-size', 704, 645, array( 'center', 'center' ) );
		    add_image_size( 'menu-size', 704, 530, array( 'center', 'center' ) );
		    add_image_size( 'gallery-size', 1000, 667, array( 'center', 'center' ) );
	    }

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary-menu' => esc_html__( 'Primary menu', 'idl' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'idl_setup' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function idl_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( is_front_page() ) {
		$classes[] = 'home-page';
	}

	return $classes;
}
add_filter( 'body_class', 'idl_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function idl_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'idl_pingback_header' );

// Add active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'current_page_item';
    }
    
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );

// Stick Admin Bar To The Top
	if (!is_admin()) {
		add_action('get_header', 'my_filter_head');

		function my_filter_head() {
			remove_action('wp_head', '_admin_bar_bump_cb');
		}

		function stick_admin_bar() {
			echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px !important}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top:46px !important }
				}
			</style>
			";
		}

		add_action('admin_head', 'stick_admin_bar');
		add_action('wp_head', 'stick_admin_bar');
	}


/* =============================== ADD GLOBAL OPTION ACF ============================== */

function is_field_group_exists($value, $type='post_title') {
    $exists = 0;
    if ($field_groups = get_posts(array('post_type'=>'acf-field-group'))) {
        foreach ($field_groups as $field_group) {
            if ($field_group->$type == $value) {
                $exists = 1;
            }
        }
    }
    return $exists;
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Global Options',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}


/*********************** PUT YOU FUNCTIONS BELOW ********************************/
/**
 * Footer Logo
 */
function idl_theme_customizer_setting($wp_customize) {
// add a setting
	$wp_customize->add_setting('idl_theme_footer_logo');
// Add a control to upload the hover logo
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'idl_theme_footer_logo', array(
		'label' => 'Upload Footer logo',
		'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
		'settings' => 'idl_theme_footer_logo',
		'priority' => 8 // show it just below the custom-logo
	)));
}

add_action('customize_register', 'idl_theme_customizer_setting');

/* ====================== Adding .svg type support ================== */
function my_myme_types($mime_types){
	$mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
	return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

/* ====================== Custom logo params ================== */
function get_custome_logo_url() {

	$logo_img = '';

    if( $custom_logo_id = get_theme_mod('custom_logo') ){
    	if($custom_logo_id){
		    $logo_img = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		    if(!empty($logo_img)){
			    $logo_img = $logo_img[0];
		    }
	    }
    }
    
    return $logo_img;
}
