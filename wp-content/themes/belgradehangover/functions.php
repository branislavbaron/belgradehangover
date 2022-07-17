<?php

/**

 * belgradehangover functions and definitions

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package belgradehangover

 */



if ( ! function_exists( 'belgradehangover_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 */

function belgradehangover_setup() {

	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on belgradehangover, use a find and replace

	 * to change 'belgradehangover' to the name of your theme in all the template files.

	 */

	load_theme_textdomain( 'belgradehangover', get_template_directory() . '/languages' );



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



	// This theme uses wp_nav_menu() in few locations.

	register_nav_menus( array(

		'menu-1' => esc_html__( 'Primary', 'belgradehangover' ),

		'menu-2' => esc_html__( 'Company', 'belgradehangover'),

		'menu-3' => esc_html__( 'Help', 'belgradehangover' ),

		'menu-4' => esc_html__( 'Booking', 'belgradehangover'),

		'menu-5' => esc_html__( 'Contact', 'belgradehangover'),

		'menu-6' => esc_html__( 'Follow', 'belgradehangover')

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



	// Set up the WordPress core custom background feature.

	add_theme_support( 'custom-background', apply_filters( 'belgradehangover_custom_background_args', array(

		'default-color' => 'ffffff',

		'default-image' => '',

	) ) );



	// Add theme support for selective refresh for widgets.

	add_theme_support( 'customize-selective-refresh-widgets' );

}

endif;

add_action( 'after_setup_theme', 'belgradehangover_setup' );



/**

 * Set the content width in pixels, based on the theme's design and stylesheet.

 *

 * Priority 0 to make it available to lower priority callbacks.

 *

 * @global int $content_width

 */

function belgradehangover_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'belgradehangover_content_width', 640 );

}

add_action( 'after_setup_theme', 'belgradehangover_content_width', 0 );



/**

 * Register widget area.

 *

 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

 */

function belgradehangover_widgets_init() {

	register_sidebar( array(

		'name'          => esc_html__( 'Sidebar', 'belgradehangover' ),

		'id'            => 'sidebar-1',

		'description'   => esc_html__( 'Add widgets here.', 'belgradehangover' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

}

add_action( 'widgets_init', 'belgradehangover_widgets_init' );

// Remove query string '?'

function rm_query_string( $src ){   
    $parts = explode( '?ver', $src );
    return $parts[0];
}

if ( !is_admin() ) {
    add_filter( 'script_loader_src', 'rm_query_string', 15, 1 );
    add_filter( 'style_loader_src', 'rm_query_string', 15, 1 );
}


/**

 * Enqueue scripts and styles.

 */

function belgradehangover_scripts() {

	wp_deregister_script('jquery');

	wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', null, null, true);

	wp_enqueue_script('jquery');



	wp_enqueue_style( 'belgradehangover-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'fa-style', get_stylesheet_directory_uri() . '/css/fa-svg-with-js.css');

	wp_enqueue_script('fa', get_template_directory_uri() . '/js/fontawesome-all.min.js');
	wp_enqueue_script('bs-js', get_template_directory_uri() . '/js/bootstrap.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	wp_enqueue_script('bh-main', get_template_directory_uri() . '/js/main.min.js', array(), null, true);

	wp_localize_script('bh-main', 'ajax_obj', array(

		'ajax_url' => admin_url('admin-ajax.php')

	));



}

add_action( 'wp_enqueue_scripts', 'belgradehangover_scripts' );



function prepopulate_cpt_ninja_form_dropdown($options, $settings) {

	global $post;



	$args = [];

	$post_type_name = 'Nightclub';



    if( $settings['key'] == 'choose_a_nightclub' ) {

        $args = [

            'post_type' => 'nightclubs',

            'posts_per_page' => -1

        ];



		$post_type_name = 'Nightclub';

	}



	if ( $settings['key'] === 'choose_a_restaurant' ) {

		$args = [

            'post_type' => 'restaurants',

            'posts_per_page' => -1

        ];



		$post_type_name = 'Restaurant';

	}



	if ( $settings['key'] === 'choose_a_tour' ) {

		$args = [

            'post_type' => 'tours',

            'posts_per_page' => -1

        ];



		$post_type_name = 'Tour';

	}



    $query = new WP_Query( $args );



    if ( $query->have_posts() )

    {

        $options = array();

		$options[] = array(

			'label' => '-- Select ' . $post_type_name . ' --',

			'selected' => 1

		);

        while ( $query->have_posts() )

        {

            $query->the_post();

            $options[] = array(

                'label' =>  get_the_title(),

                'value' =>  $post->post_name,

                'calc'  =>  null,

                'selected' => 0

            );

        }

    }

    wp_reset_postdata();



    return $options;

}

add_filter('ninja_forms_render_options','prepopulate_cpt_ninja_form_dropdown', 10, 2);



add_action("wp_ajax_nopriv_get_venue_tables", "get_venue_tables");

add_action("wp_ajax_get_venue_tables", "get_venue_tables");

function get_venue_tables() {

	$venue_name = $_POST["venue_name"];

    $venue_type = $_POST["venue_type"];

	$args = array (

		'post_type' => $venue_type,

		'name' => $venue_name,

	);

	$query = new WP_Query( $args );



	$venue = $query->posts[0];

	$venue_table_types = get_the_terms($venue->ID, 'table_types');



	echo json_encode($venue_table_types);

	die();

}



function getPagesWithBlackLogo() {

	$pages = [

		16, 14, 22, 24, 26, 966, 978

	];



	return $pages;

}



function getThisWeekDates() {

    $today_start = date('Y-m-d', time()). '00:00:00';

    $today_end = date('Y-m-d', time()). '23:59:59';



    $thisWeek = [

        strtotime($today_start),

        strtotime($today_end . ' + 1 day'),

        strtotime($today_end . ' + 2 day'),

        strtotime($today_end . ' + 3 day'),

        strtotime($today_end . ' + 4 day'),

        strtotime($today_end . ' + 5 day'),

        strtotime($today_end . ' + 6 day'),

    ];



	return $thisWeek;

}

function my_theme_add_scripts() {
	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB7NeDQAwLMPqyq2oPtEgtA--QOzxHxfKY', array(), '3', true );
	wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/google-maps.js', array('google-map', 'jquery'), '0.1', true );
}

add_action( 'wp_enqueue_scripts', 'my_theme_add_scripts' );

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyB7NeDQAwLMPqyq2oPtEgtA--QOzxHxfKY';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



/**

 * Implement the Custom Header feature.

 */

require get_template_directory() . '/inc/custom-header.php';



/**

 * Custom template tags for this theme.

 */

require get_template_directory() . '/inc/template-tags.php';



/**

 * Custom functions that act independently of the theme templates.

 */

require get_template_directory() . '/inc/extras.php';



/**

 * Customizer additions.

 */

require get_template_directory() . '/inc/customizer.php';



/**

 * Load Jetpack compatibility file.

 */

require get_template_directory() . '/inc/jetpack.php';

