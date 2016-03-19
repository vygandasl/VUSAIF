<?php
/**
 * icyNETS Simplic Theme Customizer
 *
 * @package icyNETS Simplic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function icynets_simplic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
			// Add Radio-Image control support to the theme customizer
		class Customizer_Radio_Image_Control extends WP_Customize_Control {
			public $type = 'radio-image';
			
			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-button' );
			}
			
			// Markup for the field's title
			public function title() {
				echo '<span class="customize-control-title">';
					$this->label();
					$this->description();
				echo '</span>';
			}

			// The markup for the label.
			public function label() {
				// The label has already been sanitized in the Fields class, no need to re-sanitize it.
				echo $this->label;
			}

			// Markup for the field's description
			public function description() {
				if ( ! empty( $this->description ) ) {
					// The description has already been sanitized in the Fields class, no need to re-sanitize it.
					echo '<span class="description customize-control-description">' . $this->description . '</span>';
				}
			}
			
			public function render_content() {
				if ( empty( $this->choices ) ) {
					return;
				}
				$name = '_customize-radio-' . $this->id;
				?>
				<?php $this->title(); ?>
				<div id="input_<?php echo $this->id; ?>" class="image">
					<?php foreach ( $this->choices as $value => $label ) : ?>
						<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<label for="<?php echo $this->id . $value; ?>">
								<img src="<?php echo esc_html( $label ); ?>">
							</label>
						</input>
					<?php endforeach; ?>
				</div>
				<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
				<?php
			}
		}
		
// Header Settings SECTION
		$wp_customize->add_section( 
			'header_settings', array(
				'title' => __( 'Logo Settings', 'icynets-simplic' ),
				'priority' => 20
		) );
		
	//Logo Upload	
		$wp_customize->add_setting( 
			'custom_logo' , array(
				'sanitize_callback' => 'esc_url_raw',
		));
		 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'custom_logo',
				array(
					'label' =>  __( 'Custom Logo', 'icynets-simplic' ),
					'section' => 'header_settings',
					'settings' => 'custom_logo',
				)
			)
		);
		
		
// Author Info SECTION
		$wp_customize->add_section( 
			'article_settings', array(
				'title' => __( 'Author Info', 'icynets-simplic' ),
				'priority' => 20
		) );
	// Author Information
		$wp_customize->add_setting( 
			'author_bio' , array(
				'default'     => 'on',
				'sanitize_callback' => 'icynets_simplic_sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(			
				'author_bio',
				array(
					'label' =>  __( 'Display Author Info', 'icynets-simplic' ),
					'description' =>  __( 'Enable / Disable the Author information to be displayed below the single Posts.', 'icynets-simplic' ),
					'section' => 'article_settings',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'On',
						'off' 	=> 'Off',
					),
				)
		);		
		
		// Design & Layout SECTION
		$wp_customize->add_section( 
			'colors', array(
				'title' => __( 'Layout Colors', 'icynets-simplic' ),
				'priority' => 40
		) );
		
		// Theme Background
		$wp_customize->add_setting(
			'theme_background',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_background',
				array(
					'label' => __( 'Content Background', 'icynets-simplic' ),
					'section' => 'colors',
					'settings' => 'theme_background',
				)
			)
		);
		
		// Theme color
		$wp_customize->add_setting(
			'theme_color',
			array(
				'default' => '#28750A',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_color',
				array(
					'label' => __( 'Theme Color', 'icynets-simplic' ),
					'section' => 'colors',
					'settings' => 'theme_color',
				)
			)
		);
		
// Post Display SECTION
		$wp_customize->add_section( 
			'post_display', array(
				'title' => __( 'Article Settings', 'icynets-simplic' ),
				'priority' => 40
		) );
		//Display
		$wp_customize->add_setting(
			'article_display',
			array(
				'default' => 'excerpt_smallfeatured',
				'sanitize_callback' => 'icynets_simplic_sanitize_display',
			)
		);

		$wp_customize->add_control(	
			new Customizer_Radio_Image_Control(
				$wp_customize,
				'article_display', array(
					'label' => __( 'Post Display', 'icynets-simplic' ),
					'section' => 'post_display',
					'choices' => array(
						'excerpt_smallfeatured' => get_template_directory_uri() .'/images/customizer/smallthumb.png',
						'excerpt_full_featured' => get_template_directory_uri() .'/images/customizer/bigthumb.png',
					),
				)
			)
		);
		
		
			//Post Meta
		$wp_customize->add_setting( 
			'post_meta' , array(
				'default'     => 'on',
				'sanitize_callback' => 'icynets_simplic_sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'post_meta', array(
					'label' =>  __( 'Post Meta', 'icynets-simplic' ),
					'description' =>  __( 'Enable / Disable the Posts Meta Info ', 'icynets-simplic' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
		
		//Author Off
		$wp_customize->add_setting( 
			'author_meta' , array(
				'default'     => 'on',
				'sanitize_callback' => 'icynets_simplic_sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'author_meta', array(
					'label' =>  __( 'Author Name', 'icynets-simplic' ),
					'description' =>  __( 'Enable / Disable the Author Name. If Post Meta is Disabled, Author Name is off by default. ', 'icynets-simplic' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
		
		//Categories Off
		$wp_customize->add_setting( 
			'category_meta' , array(
				'default'     => 'on',
				'sanitize_callback' => 'icynets_simplic_sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'category_meta', array(
					'label' =>  __( 'Category Meta', 'icynets-simplic' ),
					'description' =>  __( 'Enable / Disable the Category Meta. If Post Meta is Disabled, Category Meta is off by default. ', 'icynets-simplic' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
		
		//Comments Count
		$wp_customize->add_setting( 
			'comments_count' , array(
				'default'     => 'on',
				'sanitize_callback' => 'icynets_simplic_sanitize_enable_disable_feature',
				)
		);
		
		$wp_customize->add_control(	
				'comments_count', array(
					'label' =>  __( 'Comments Count', 'icynets-simplic' ),
					'description' =>  __( 'Enable / Disable the Post Comments Count Info. If Post Meta is Disabled, Comments are off by default. ', 'icynets-simplic' ),
					'section' => 'post_display',
					'type' => 'radio',
					'choices' 	=> array(
						'on' 	=> 'Enable',
						'off' 	=> 'Disable',
					),
				)
		);
		
}
add_action( 'customize_register', 'icynets_simplic_customize_register' );





/*-----------------------------------------------------------------------------------*/
/*  CUSTOM DATA SANITIZATION
/*-----------------------------------------------------------------------------------*/
// Sanitize checkbox
function icynets_simplic_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Sanitize Enable / Disable feature
function icynets_simplic_sanitize_enable_disable_feature( $input ) {
    $valid = array(
		'on' => 'On',
		'off' => 'Off',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Sanitize display
function icynets_simplic_sanitize_display( $input ) {
    $valid = array(
		'excerpt_smallfeatured' => 'Excerpt + Small Featured image',
		'excerpt_full_featured' => 'Excerpt + Full-width Featured image',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


// Style settings output.
function icynets_simplic_add_style_settings() {
	
	$theme_background = esc_html( get_theme_mod( 'theme_background', '#ffffff' ) );
	$theme_color = esc_html( get_theme_mod( 'theme_color', '#28750A' ) );
			
	?>
	<style type="text/css">
		<!--Theme Background Color-->
		.site-header,.site-header,.foot-top,.post-box,.page-header,.comments-area,.post-author-box,.no-results .page-content,.widget { background: <?php echo $theme_background ?>; }
		
		<!--Theme Color-->
		.site-footer,.site-footer { border-bottom: 5px solid <?php echo $theme_color ?>;}
				
		.widget ul,.widget ul,.tagcloud a,#tags-tab-content a { color: <?php echo $theme_color ?>;}
		.input[type=text]:focus,.input[type=text]:focus,input[type=search]:focus,textarea:focus,.widget select:focus { box-shadow: 0 0 5px <?php echo $theme_color ?>;}
		
		.mid-head,.mid-head,.main-navigation ul ul li,#wp-calendar caption,#mobile-menu-wrapper a,#mobile-menu-wrapper li,.theauthor a,.thecategory a,.thetags a,.post-readmore,.left-previous-post,.right-next-post,.nav-previous a,.nav-next a, input[type="submit"],.top-header{ background: <?php echo $theme_color ?>;}
		
		.theauthor a,theauthor a,.thecategory a,.thetags a,.post-readmore,.left-previous-post,.right-next-post,.nav-previous a,.nav-next a, input[type="submit"]{ border: 2px solid <?php echo $theme_color ?>;}
		
		.theauthor a:hover,.theauthor a:hover,.thecategory a:hover,.thetags a:hover, .post-readmore:hover,.left-previous-post:hover,.right-next-post:hover,.nav-previous a:hover,.nav-next a:hover,input[type="submit"]:hover{ border: 2px solid <?php echo $theme_color ?>;}
		
		.theauthor a:hover,.theauthor a:hover,.thecategory a:hover,.thetags a:hover, .post-readmore:hover,.left-previous-post:hover,.right-next-post:hover,.nav-previous a:hover,.nav-next a:hover,input[type="submit"]:hover,.post-navigation a:hover{ color: <?php echo $theme_color ?>;}
		
		.input[type=text]:focus,.input[type=text]:focus,.input[type=url]:focus,.input[type=email]:focus,input[type=search]:focus,textarea:focus{ border: 1px solid <?php echo $theme_color ?>;}
		
		.widget select:focus,.widget select:focus,.post-box,#comment-content,.widget,.error-404,.no-results,.page-header,.posts-navigation{ border: 1px solid <?php echo $theme_color ?>;}
		
		<!--Menu Hover-->
		.main-navigation .current_page_item > a,.main-navigation .current-menu-item > a,.main-navigation .current_page_ancestor > a,.main-navigation li:hover > a,.main-navigation li.focus > a,.head-nav ul ul { background: <?php echo $theme_color ?>; }
		
	</style>
	<?php
}
add_action( 'wp_head', 'icynets_simplic_add_style_settings' );

//Loading Customizer Styles
function icynets_simplic_customizer_inline_css() {
?>
	<style type="text/css">
		.ui-state-active img {
		border: 2px solid #2096da;
	}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'icynets_simplic_customizer_inline_css' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function icynets_simplic_customize_preview_js() {
	wp_enqueue_script( 'icynets_simplic_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'icynets_simplic_customize_preview_js' );
