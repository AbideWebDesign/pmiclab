<?php
/**
 * pmiclab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pmiclab
 */
require WP_CONTENT_DIR . '/plugins/plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/AbideWebDesign/pmiclab',
	__FILE__,
	'pmiclab'
);
if ( ! function_exists( 'pmiclab_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pmiclab_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pmiclab, use a find and replace
		 * to change 'pmiclab' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pmiclab', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pmiclab' ),
			'menu-2' => esc_html__( 'Footer', 'pmiclab' ),
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

	}
endif;
add_action( 'after_setup_theme', 'pmiclab_setup' );

/*
 * Admin bar customizations
 *
 */
function pmiclab_admin_bar_render() {
	
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_menu('new-post');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('themes');
    $wp_admin_bar->remove_menu('widgets');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_menu('searchwp');

}
add_action( 'wp_before_admin_bar_render', 'pmiclab_admin_bar_render' );

/**
 * Enqueue scripts and styles.
 */
function pmiclab_scripts() {
	$theme = wp_get_theme();
		
	wp_deregister_script( 'jquery' );
	
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null );
	
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'pmiclab-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '20151215', true );
	
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );

	wp_enqueue_style( 'pmiclab-style', get_stylesheet_uri(), '', $theme->version );
	
}
add_action( 'wp_enqueue_scripts', 'pmiclab_scripts' );

/**
 * Image sizes
 */
set_post_thumbnail_size(200, 200, true);
add_image_size('col-3', 295);
add_image_size('col-4', 434);
add_image_size('col-5', 542);
add_image_size('col-6', 650);
add_image_size('col-7', 759);
add_image_size('hero banner', 1600, 450, true);
add_image_size('hero banner sm', 767, 375, true);

/**
 * Function: Return List of Children or Sibling Page IDs
 */
function get_page_links($page_id) {	
	if ($parent = wp_get_post_parent_id($page_id)) {
		
		$page_ids = get_pages(array('child_of' => $parent, 'parent' => $parent, 'sort_column' => 'menu_order', 'depth' => 1));
		
	} else {
		
		$page_ids = get_pages(array('child_of' => $page_id, 'parent' => $page_id, 'sort_column' => 'menu_order', 'depth' => 1));
		
	}

	return $page_ids;
} 

/**
 * Plugin: ACF Options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/**
 * Add Bootstrap 4 Nav walker
 */
require_once("bs4Navwalker.php");

/**
 * Add Bootstrap 4 inline list classes
 */
function bootstrap_inline_list_class($classes, $item, $args) {
    if( $args->add_li_class ) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'bootstrap_inline_list_class', 1, 3);

/**
 * Create search results title
 */
function search_results_title() {
	if( is_search() ) {
	
		global $wp_query;
		
		if( $wp_query->post_count == 1 ) {
			$result_title .= '1 search result found';
		} else {
			$result_title .= $wp_query->found_posts . ' search results found';
		}
		
		$result_title .= " for “" . wp_specialchars($wp_query->query_vars['s'], 1) . "”";
		
		echo $result_title;
	
	}
}

/*
 * Custom pagination function
 */
function show_pagination_links() {
    global $wp_query;

    $page_tot   = $wp_query->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
			'prev_text'    => __('&lsaquo; Previous', 'progression'),
			'next_text'    => __('Next &rsaquo;', 'progression'),
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {

    if ( is_archive() ) {
    	
    	global $post;
	
		return '... <a class="moretag" href="'. get_permalink($post->ID) . '">Read the full article</a>';
		
	} else {
		
		$post_id = get_field('featured_news');
		
		return '... <a class="moretag" href="'. get_permalink($post_id) . '">Read the full article</a>';
	}
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Plugin: Gravity Form
 */
function spinner_url($image_src, $form) {
    return "";
}
add_filter("gform_ajax_spinner_url_1", "spinner_url", 10, 2);