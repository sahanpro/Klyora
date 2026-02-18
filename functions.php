<?php
$perukar_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
require_once get_template_directory() . '/inc/klyora-customizer.php';
require_once get_template_directory() . '/inc/klyora-frontend.php';
require_once get_template_directory() . '/inc/klyora-woocommerce.php';
//Theme Set up:
function perukar_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
  	add_theme_support( 'custom-header' ); 
  	add_theme_support( 'custom-background' );
  	$lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('perukar', $lang);
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location.
  	register_nav_menus( array(
      'primary' =>  esc_html__( 'Primary Blog Menu: Chosen menu in Blog', 'perukar' ),
      'primary-multipage-image' =>  esc_html__( 'Primary Home Multipage Image Menu: Chosen menu in Home', 'perukar' ),
      'primary-multipage-slider' =>  esc_html__( 'Primary Home Multipage slider Menu: Chosen menu in Home', 'perukar' ),
      'primary-multipage-slideshow' =>  esc_html__( 'Primary Home Multipage slideshow Menu: Chosen menu in Home', 'perukar' ),
      'primary-multipage-video' =>  esc_html__( 'Primary Home Multipage video Menu: Chosen menu in Home', 'perukar' ),
      'primary-onepage-image' =>  esc_html__( 'Primary Home Onepage Image Menu: Chosen menu in Home', 'perukar' ),
      'primary-onepage-slider' =>  esc_html__( 'Primary Home Onepage slider Menu: Chosen menu in Home', 'perukar' ),
      'primary-onepage-slideshow' =>  esc_html__( 'Primary Home Onepage slideshow Menu: Chosen menu in Home', 'perukar' ),
      'primary-onepage-video' =>  esc_html__( 'Primary Home Onepage video Menu: Chosen menu in Home', 'perukar' ),
      'menu_services' =>  esc_html__( ' Menu Services: Chosen menu in Services', 'perukar' ),
  	) );
      // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'perukar_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
function perukar_theme_scripts_styles() {
  	$perukar_redux_demo = get_option('redux_demo');
  	$protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style('googlefonts-1', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap', array(), null );
    wp_enqueue_style('googlefonts-klyora', 'https://fonts.googleapis.com/css2?family=Allura&family=Cormorant+Garamond:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap', array(), null );
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/plugins/bootstrap.min.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/css/plugins/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-default', get_template_directory_uri().'/css/plugins/owl.theme.default.min.css');
    wp_enqueue_style('animate', get_template_directory_uri().'/css/plugins/animate.min.css');
    wp_enqueue_style('themify-icons', get_template_directory_uri().'/css/plugins/themify-icons.css');
    wp_enqueue_style('barber-icons', get_template_directory_uri().'/css/plugins/barber-icons.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri().'/css/plugins/magnific-popup.css');
    wp_enqueue_style('YouTubePopUp', get_template_directory_uri().'/css/plugins/YouTubePopUp.css');
    wp_enqueue_style('select2', get_template_directory_uri().'/css/plugins/select2.css');
    wp_enqueue_style('datepicker', get_template_directory_uri().'/css/plugins/datepicker.css');
    wp_enqueue_style('vegas-slider', get_template_directory_uri().'/css/plugins/vegas.slider.min.css');
    wp_enqueue_style('swiper-bundle', get_template_directory_uri().'/css/plugins/swiper-bundle.min.css');
    wp_enqueue_style('perukar-style', get_template_directory_uri().'/css/style.css');
    wp_enqueue_style('perukar-css', get_stylesheet_uri(), array(), '2025-06-25' );
    wp_enqueue_style('klyora-style', get_template_directory_uri().'/assets/css/klyora-style.css', array('perukar-css'), '1.0.0');
    wp_add_inline_style('klyora-style', perukar_klyora_get_css_vars());
    if(isset($perukar_redux_demo['chosen-color']) && $perukar_redux_demo['chosen-color']==1){
    wp_enqueue_style('color', get_template_directory_uri().'/framework/color.php');
    }

  	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script('comment-reply' );
    //Javascript
    wp_enqueue_script('jquery-3.6.3', get_template_directory_uri().'/js/jquery-3.6.3.min.js',array(),false,true);
    wp_enqueue_script('jquery-migrate-3.0.0', get_template_directory_uri().'/js/jquery-migrate-3.0.0.min.js',array(),false,true);
    wp_enqueue_script('modernizr-2.6.2', get_template_directory_uri().'/js/modernizr-2.6.2.min.js',array(),false,true);
    wp_enqueue_script('imagesloaded-pkgd', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js',array(),false,true);
    wp_enqueue_script('jquery-isotope', get_template_directory_uri().'/js/jquery.isotope.v3.0.2.js',array(),false,true);
    wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.min.js',array(),false,true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array(),false,true);
    wp_enqueue_script('scrollit', get_template_directory_uri().'/js/scrollIt.min.js',array(),false,true);
    wp_enqueue_script('jquery-waypoints', get_template_directory_uri().'/js/jquery.waypoints.min.js',array(),false,true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js',array(),false,true);
    wp_enqueue_script('jquery-stellar', get_template_directory_uri().'/js/jquery.stellar.min.js',array(),false,true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.js',array(),false,true);
    wp_enqueue_script('YouTubePopUp', get_template_directory_uri().'/js/YouTubePopUp.js',array(),false,true);
    wp_enqueue_script('select2', get_template_directory_uri().'/js/select2.js',array(),false,true);
    wp_enqueue_script('datepicker', get_template_directory_uri().'/js/datepicker.js',array(),false,true);
    wp_enqueue_script('smooth-scroll', get_template_directory_uri().'/js/smooth-scroll.min.js',array(),false,true);
    wp_enqueue_script('vegas-slider', get_template_directory_uri().'/js/vegas.slider.min.js',array(),false,true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri().'/js/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script('perukar-custom', get_template_directory_uri().'/js/custom.js',array(),false,true);
    wp_enqueue_script('klyora-script', get_template_directory_uri().'/assets/js/klyora.js', array('jquery'), '1.0.0', true);
    wp_localize_script(
      'klyora-script',
      'klyoraData',
      array(
        'homeUrl'     => esc_url_raw( home_url( '/' ) ),
        'shopUrl'     => function_exists( 'wc_get_page_permalink' ) ? esc_url_raw( wc_get_page_permalink( 'shop' ) ) : esc_url_raw( home_url( '/' ) ),
        'wishlistUrl' => function_exists( 'YITH_WCWL' ) && method_exists( YITH_WCWL(), 'get_wishlist_url' ) ? esc_url_raw( YITH_WCWL()->get_wishlist_url() ) : '#',
        'accountUrl'  => function_exists( 'wc_get_page_permalink' ) ? esc_url_raw( wc_get_page_permalink( 'myaccount' ) ) : '#',
      )
    );
    if (is_page_template( 'page-templates/onepage-image.php' ) || is_page_template( 'page-templates/onepage-slider.php' ) || is_page_template( 'page-templates/onepage-slideshow.php' ) || is_page_template( 'page-templates/onepage-video.php' )   ) {
      wp_enqueue_script('perukar-onepage', get_template_directory_uri().'/js/onepage.js',array(),false,true);
    }
}
add_action( 'wp_enqueue_scripts', 'perukar_theme_scripts_styles' );

function perukar_my_custom_wc_theme_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'perukar_my_custom_wc_theme_support' );

add_filter( 'loop_shop_columns', function() {
    return 2;
}, 20);

function perukar_custom_wc_ajax_refresh_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <div class="menu-item mini-cart">
        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-contents">
          <span class="cart-icon"></span>
        </a>
        <div class="mini-cart-dropdown">
            <?php woocommerce_mini_cart(); ?>
        </div>
    </div>
    <?php
    $mini_cart = ob_get_clean();
    $fragments['div.menu-item.mini-cart'] = $mini_cart;
    
    unset( $fragments['a.cart-contents'] );
    
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'perukar_custom_wc_ajax_refresh_cart_fragment', 30 );

function perukar_enqueue_wc_cart_fragments_script() {
    if ( function_exists( 'is_woocommerce' ) ) {
        wp_enqueue_script( 'wc-cart-fragments' );
    }
}
add_action( 'wp_enqueue_scripts', 'perukar_enqueue_wc_cart_fragments_script' );


add_filter( 'yith_wcwl_locate_template', 'perukar_custom_yith_wcwl_template_path', 10, 2 );

function perukar_custom_yith_wcwl_template_path( $located, $template_name ) {
  
    $custom_template = get_stylesheet_directory() . '/yith-woocommerce-wishlist/' . $template_name;

    if ( file_exists( $custom_template ) ) {
        return $custom_template;
    }

    return $located;
}

add_filter('woocommerce_add_to_cart_redirect', 'perukar_redirect_to_product_page_after_add_to_cart', 10, 1);

function perukar_redirect_to_product_page_after_add_to_cart($url) {
    if (
        isset($_POST['redirect_to_product']) 
        && $_POST['redirect_to_product'] === '1'
        && isset($_POST['add-to-cart'])
    ) {
        $product_id = absint($_POST['add-to-cart']);
        $product_url = get_permalink($product_id);
        return $product_url;
    }
    return $url;
}

function perukar_set_custom_woocommerce_pages() {
    if ( class_exists( 'WooCommerce' ) ) {

        $shop_page = get_posts( array(
            'post_type'   => 'page',
            'title'       => 'Shop Sidebar',
            'posts_per_page' => 1
        ) );
        if ( $shop_page ) {
            update_option( 'woocommerce_shop_page_id', $shop_page[0]->ID );
        }

        $cart_page = get_posts( array(
            'post_type'   => 'page',
            'title'       => 'Cart Page',
            'posts_per_page' => 1
        ) );
        if ( $cart_page ) {
            update_option( 'woocommerce_cart_page_id', $cart_page[0]->ID );
        }

        $checkout_page = get_posts( array(
            'post_type'   => 'page',
            'title'       => 'Checkout Page',
            'posts_per_page' => 1
        ) );
        if ( $checkout_page ) {
            update_option( 'woocommerce_checkout_page_id', $checkout_page[0]->ID );
        }

        $myaccount_page = get_posts( array(
            'post_type'   => 'page',
            'title'       => 'My Account Page',
            'posts_per_page' => 1
        ) );
        if ( $myaccount_page ) {
            update_option( 'woocommerce_myaccount_page_id', $myaccount_page[0]->ID );
        }
    }
}
add_action( 'after_setup_theme', 'perukar_set_custom_woocommerce_pages' );

function perukar_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'perukar_move_comment_field_to_bottom');
//Custom Excerpt Function
function perukar_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
} 
// Widget Sidebar
function perukar_widgets_init() {
  	register_sidebar( array(
      'name'          => esc_html__( 'Primary Sidebar', 'perukar' ),
      'id'            => 'sidebar-1',        
  		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'perukar' ),        
  		'before_widget' => '<div class="col-md-12"><div class="widget %2$s" id="%1$s">',        
  		'after_widget'  => '</div></div>',        
  		'before_title'  => '<div class="widget-title"><h5>',        
  		'after_title'   => '</h5></div>'
    ) );
	register_sidebar( array(
    'name'          => esc_html__( 'Shop Sidebar', 'perukar' ),
    'id'            => 'sidebar-shop',        
    'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'perukar' ),        
    'before_widget' => '<div id="%1$s" class="shop-widget %2$s">',        
    'after_widget'  => '</div>',        
    'before_title'  => '<div class="widget-title"><h6>',        
    'after_title'   => '</h6></div>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer One Widget', 'perukar' ),
      'id'            => 'footer-area-1',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'perukar' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Two Widget', 'perukar' ),
      'id'            => 'footer-area-2',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'perukar' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget'  => '</div>',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Three Widget', 'perukar' ),
      'id'            => 'footer-area-3',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'perukar' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget'  => '</div>',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
}
add_action( 'widgets_init', 'perukar_widgets_init' );
//function tag widgets
function perukar_tag_cloud_widget($args) {
  	$args['number'] = 0; //adding a 0 will display all tags
  	$args['largest'] = 18; //largest tag
  	$args['smallest'] = 11; //smallest tag
  	$args['unit'] = 'px'; //tag font unit
  	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
  	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
  	return $args;
}
add_filter( 'widget_tag_cloud_args', 'perukar_tag_cloud_widget' );
function perukar_excerpt() {
  $perukar_redux_demo = get_option('redux_demo');
  if(isset($perukar_redux_demo['blog_excerpt'])){
    $limit = $perukar_redux_demo['blog_excerpt'];
  }else{
    $limit = 50;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function perukar_excerpt2() {
  $perukar_redux_demo = get_option('redux_demo');
  if(isset($perukar_redux_demo['services_excerpt'])){
    $limit = $perukar_redux_demo['services_excerpt'];
  }else{
    $limit = 20;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function perukar_search_form( $form ) {
    $form = '
        <form action="' . esc_url(home_url('/')) . '">
            <input type="text" class="s-input-home" name="s" required value="' . get_search_query() . '" placeholder="'.esc_attr__('Search…', 'perukar').'">
            <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
        </form>
	';
    return $form;
}
add_filter( 'get_search_form', 'perukar_search_form' );
function perukar_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='100' )!=''){?>
          <div class="news-post-comment-wrap">
              <div class="post-user-comment"> <img src="<?php echo esc_url(get_template_directory_uri());?>/img/team/5.jpg"> </div>
              <div class="post-user-content">
                  <h3><?php printf( get_comment_author_link()) ?><span> <?php comment_time(get_option( 'date_format' ));?></span></h3>
                  <?php comment_text() ?> 
                  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>      
              </div>
          </div>
  <?php }else{?>
          <div class="news-post-comment-wrap">
              <div class="post-user-content">
                  <h3><?php printf( get_comment_author_link()) ?><span> <?php comment_time(get_option( 'date_format' ));?></span></h3>
                  <?php comment_text() ?> 
                  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>      
              </div>
          </div>
<?php }?>

<?php
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'perukar_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function perukar_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
        'name'      => esc_html__( 'One Click Demo Import', 'perukar' ),
        'slug'      => 'one-click-demo-import',
        'required'  => true,
      ), 
      array(
        'name'      => esc_html__( 'Classic Editor', 'perukar' ),
        'slug'      => 'classic-editor',
        'required'  => true,
      ), 
      array(
        'name'      => esc_html__( 'Classic Widgets', 'perukar' ),
        'slug'      => 'classic-widgets',
        'required'  => true,
      ),
      array(
        'name'      => esc_html__( 'Widget Importer & Exporter', 'perukar' ),
        'slug'      => 'widget-importer-&-exporter',
        'required'  => true,
      ), 
      array(
        'name'      => esc_html__( 'Contact Form 7', 'perukar' ),
        'slug'      => 'contact-form-7',
        'required'  => true,
      ), 
      array(
        'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'perukar' ),
        'slug'      => 'wp-maximum-execution-time-exceeded',
        'required'  => true,
      ), 
      array(
        'name'      => esc_html__( 'Elementor', 'perukar' ),
        'slug'      => 'elementor',
        'required'  => true,
      ),
      array(
        'name'      => esc_html__( 'WooCommerce', 'perukar' ),
        'slug'      => 'woocommerce',
        'required'  => true,
      ),
      array(
        'name'      => esc_html__( 'YITH WooCommerce Wishlist', 'perukar' ),
        'slug'      => 'yith-woocommerce-wishlist',
        'required'  => true,
      ),
      array(
        'name'      => esc_html__( 'Custom Product Tabs for WooCommerce', 'perukar' ),
        'slug'      => 'yikes-inc-easy-custom-woocommerce-product-tabs',
        'required'  => true,
      ),
      array(
        'name'      => esc_html__( 'Perukar Common', 'perukar' ),
        'slug'      => 'perukar-common',
        'required'  => true,
        'source'    => get_template_directory() . '/framework/plugins/perukar-common.zip',
      ),
      array(
        'name'      => esc_html__( 'Perukar Elementor', 'perukar' ),
        'slug'      => 'perukar-elementor',
        'required'  => true,
        'source'    => get_template_directory() . '/framework/plugins/perukar-elementor.zip',
      ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'perukar' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'perukar' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'perukar' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'perukar' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'perukar' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'perukar' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'perukar' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'perukar' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'perukar' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'perukar' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'perukar' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'perukar' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'perukar' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'perukar' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'perukar' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'perukar' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'perukar' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>
