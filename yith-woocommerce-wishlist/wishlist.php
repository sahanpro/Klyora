<?php
/**
 * Wishlist pages template; load template parts basing on the url
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Wishlist\Templates\Wishlist
 * @version 3.0.0
 */

/**
 * Template Variables:
 *
 * @var $template_part string Sub-template to load
 * @var $var array Array of attributes that needs to be sent to sub-template
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
$perukar_redux_demo = get_option('redux_demo');
?>

 <?php if(isset($perukar_redux_demo['shop_banner']['url']) && $perukar_redux_demo['shop_banner']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_attr($perukar_redux_demo['shop_banner']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/4.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
                <h5><?php if(isset($perukar_redux_demo['wishlist_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['wishlist_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Our Product', 'perukar' ); } ?></h5>
                <h1 class="shop-title"><?php if(isset($perukar_redux_demo['wishlist_title']) && $perukar_redux_demo['wishlist_title'] != ''){?>
                	<?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['wishlist_title']));?>
                <?php }else{?>
                	<?php echo esc_html__( 'Wishlist', 'perukar' );
                }
                ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="section-full content-inner page-wishlist">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ">
				<?php
				/**
				 * DO_ACTION: yith_wcwl_wishlist_before_wishlist_content
				 *
				 * Allows to render some content or fire some action before the wishlist content.
				 *
				 * @param array $var Array of attributes that needs to be sent to sub-template
				 */
				do_action( 'yith_wcwl_wishlist_before_wishlist_content', $var );
				?>
				
				<?php
				/**
				 * DO_ACTION: yith_wcwl_wishlist_before_wishlist_content
				 *
				 * Allows to render some content or fire some action in the wishlist content.
				 *
				 * @param array $var Array of attributes that needs to be sent to sub-template
				 */
				do_action( 'yith_wcwl_wishlist_main_wishlist_content', $var );
				?>

				<?php
				/**
				 * DO_ACTION: yith_wcwl_wishlist_after_wishlist_content
				 *
				 * Allows to render some content or fire some action after the wishlist content.
				 *
				 * @param array $var Array of attributes that needs to be sent to sub-template
				 */
				do_action( 'yith_wcwl_wishlist_after_wishlist_content', $var ); ?>
			</div>
		</div>
	</div>
</div>