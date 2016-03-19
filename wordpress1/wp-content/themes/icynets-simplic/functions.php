<?php
/**
 * icyNETS Simplic functions and definitions
 *
 * @package icyNETS Simplic
 */

 /**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
 
function icynets_simplic_content_width() {
/*-----------------------------------------------------------------------------------*/
/*  Set the content width based on the theme's design and stylesheet.
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}
}
add_action( 'after_setup_theme', 'icynets_simplic_content_width', 0 );


if ( ! function_exists( 'icynets_simplic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function icynets_simplic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on icyNETS Simplic, use a find and replace
	 * to change 'icynets-simplic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'icynets-simplic', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'simplic_big', 720, 360, array('center','top') ); //Post Featured
	add_image_size( 'simplic_smallfeatured', 280, 250, array('center','top') ); //featured image
	add_image_size( 'simplic_small', 120, 120, true ); //small
	add_image_size( 'simplic_tiny', 80, 80, true ); //tiny

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'icynets-simplic' ),
		'mobile-menu' => esc_html__( 'Mobile Menu', 'icynets-simplic' ),
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
	add_theme_support( 'custom-background', apply_filters( 'icynets_simplic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // icynets_simplic_setup
add_action( 'after_setup_theme', 'icynets_simplic_setup' );

/*-----------------------------------------------------------------------------------*/
/*  Header Ads Area (banner).
/*-----------------------------------------------------------------------------------*/
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function icynets_simplic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'icynets-simplic' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	//Register Header Ads-area widget
	register_sidebar( array(
	'name'          => esc_html__( 'Header Ads-area', 'icynets-simplic' ),
	'id'            => 'header-ads-area',
	'description'   => 'This space is reserved for banner ads 728x90, however, any other image with height 90px can be displayed here',
	'before_widget' => '<aside id="%1$s" class="%2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'icynets_simplic_widgets_init' );

//Display header ads area
if ( ! function_exists( 'icynets_simplic_header_area' ) ) {
	function icynets_simplic_header_area() { ?>
	<div class="header-ads-area">
		<?php dynamic_sidebar( 'header-ads-area' ); ?>
	</div><!-- .header_area -->
	<?php }
}

//We create a function to handle Mobile Menu if Header Image is uploaded.
	if ( ! function_exists( 'icynets_simplic_header_image_menu' ) ) {
		function icynets_simplic_header_image_menu() {
			if ( get_header_image() != '' && get_theme_mod('custom_logo') != '' ){ ?>
         	<style type="text/css">
				@media screen and (max-width:980px) {
					.header-image{
					margin-top: -190px;
					bottom: -185px;
					
					}
				}
			</style>
         	<?php } 
			
			if ( get_header_image() != '' && get_theme_mod('custom_logo') == '' ){ ?>
         	<style type="text/css">
				@media screen and (max-width:950px) {
					
					
				}
				@media screen and (max-width:700px) {				
					
					
				}
				@media screen and (max-width:620px) {
													
					
				}
			</style>
         	<?php } 
			
			if (get_header_image() == '' && get_theme_mod('custom_logo') != '') { ?>
         	<style type="text/css">
				@media screen and (max-width:950px) {
										
				}
				@media screen and (max-width:420px) {
					
					
				}
				@media screen and (max-width:360px) {
					
					
				}
			</style>
         	<?php } 
			
			if (get_header_image() == '' && get_theme_mod('custom_logo') == ''){ ?>
         	<style type="text/css">
				@media screen and (max-width:950px) {
					
					
				}
				@media screen and (max-width:690px) {
					
					
				}
				@media screen and (max-width:360px) {
										
				}
			</style>
         	<?php }
		}
	}
	
add_action( 'wp_head', 'icynets_simplic_header_image_menu' );

/*-----------------------------------------------------------------------------------*/
/*  Custom Excerpts.
/*-----------------------------------------------------------------------------------*/
function icynets_simplic_new_excerpt_more ($more){
	return '...';
}
add_filter('excerpt_more','icynets_simplic_new_excerpt_more');

function icynets_simplic_custom_excerpt_length ($lenth){
	return 30; // Excerpts
}
add_filter ('excerpt_length', 'icynets_simplic_custom_excerpt_length', 999);


/*-----------------------------------------------------------------------------------*/
/*  Add Post Thumbnail Support.
/*-----------------------------------------------------------------------------------*/
	function icynets_simplic_get_thumbnail_url( $size = 'featured' ) {
		global $post;
		if (has_post_thumbnail( $post->ID ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
			return $image[0];
		}
		
		// use first attached image if no featured image was already set.
		$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
		if (!empty($images)) {
			$image = reset($images);
			$image_data = wp_get_attachment_image_src( $image->ID, $size );
			return $image_data[0];
		}
	}
	
/*-----------------------------------------------------------------------------------*/
/*  Post Meta infos
/*-----------------------------------------------------------------------------------*/
	//Display meta info if enabled.
if ( ! function_exists( 'icynets_simplic_post_meta' ) ) {
function icynets_simplic_post_meta(){ 
if ( get_theme_mod('post_meta') != 'off' ) { ?>
       <ul>
			<li><?php icynets_simplic_posted_on(); ?></li>
			<li><?php icynets_simplic_entry_author(); ?></li>
			<li><?php icynets_simplic_entry_category(); ?></li>
			<li><?php icynets_simplic_entry_comments(); ?></li>
		</ul>
<?php }
	}
}
/*-----------------------------------------------------------------------------------*/
/*  Single Post Settings
/*-----------------------------------------------------------------------------------*/
		
//Display Post Next/Prev buttons if enabled.
if ( ! function_exists( 'icynets_simplic_next_prev_post' ) ) {
function icynets_simplic_next_prev_post() { ?>
	<div class="next_prev_post">
		<?php 
			previous_post_link( '<div class="left-previous-post float-l"><i class="fa fa-chevron-left"></i> %link</div>', __('Previous Post','icynets-simplic'));
				next_post_link( '<div class="right-next-post float-r">%link <i class="fa fa-chevron-right"></i></div>', __('Next Post','icynets-simplic') );
		 ?>
	</div><!-- .next_prev_post -->
<?php }                 
}

//Display Author box if enabled.
if ( ! function_exists( 'icynets_simplic_author_box' ) ) {
	function icynets_simplic_author_box() { ?>
		<div class="postauthor">
			<h4><?php _e('About The Author', 'icynets-simplic'); ?></h4>
			<div class="author-box">
				<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '150' );  } ?>
				<div class="author-box-content">
					<div class="vcard clearfix">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="nofollow" class="fn"><i class="fa fa-user"></i><?php the_author_meta( 'display_name' ); ?></a>
					</div>
					<p><?php the_author_meta('description') ?></p>
					
				</div>
			</div>
		</div>	
<?php }                 
}
/*
* Print Powered by WordPress and Theme by
*/
if (!function_exists ('icynets_simplic_copyright')){
	function icynets_simplic_copyright(){
	?>
	<div class="site-info">
	
		<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">
		<?php printf( esc_html__( 'Proudly powered by %s', 'icynets-simplic' ), 'WordPress' ); ?></a>
		
		<span class="sep"> | </span>
		<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'icynets-simplic' ), 'Simplic', '<a href="//www.icynets.com" rel="designer">icyNETS</a>' ); ?>
	</div>
	<?php
	}
}


/**
 * Enqueue scripts and styles.
 */
function icynets_simplic_scripts() {
	wp_enqueue_style( 'icynets-simplic-abel-lato','//fonts.googleapis.com/css?family=Abel|Lato:300,400,700,300italic,700italic' );
	
	wp_enqueue_style( 'icynets-simplic-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.1.1' );
	
	wp_enqueue_style( 'icynets-simplic-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'icynets-simplic-font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css' );
	
	wp_enqueue_script( 'icynets-simplic-mobile-menu', get_template_directory_uri() . '/js/menu.js', array('jquery') );
		
	wp_enqueue_script( 'icynets-simplic-move-top', get_template_directory_uri() . '/js/move-top.js', array(), '1.2' );
	
	wp_enqueue_script( 'icynets-simplic-easing', get_template_directory_uri() . '/js/easing.js', array(), '1.1.2' );

	wp_enqueue_script( 'icynets-simplic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'icynets-simplic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'icynets_simplic_scripts' );

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
