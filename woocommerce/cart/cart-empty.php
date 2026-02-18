<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit; ?>

<?php $perukar_redux_demo = get_option('redux_demo'); ?>

<?php if(isset($perukar_redux_demo['shop_banner']['url']) && $perukar_redux_demo['shop_banner']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_attr($perukar_redux_demo['shop_banner']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/4.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
            	<h5><?php if(isset($perukar_redux_demo['cart_subtitle'])){?>
            		<?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['cart_subtitle']));?>
            	<?php }else{?>
            		<?php echo esc_html__( 'Our Cart', 'perukar' ); } ?></h5>
            		<h1 class="shop-title"><?php if(isset($perukar_redux_demo['cart_title']) && $perukar_redux_demo['cart_title'] != ''){?>
            			<?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['cart_title']));?>
            		<?php }else{?>
            			<?php echo esc_html__( 'Shop Cart', 'perukar' );
            		}
            	?></h1>
            </div>
        </div>
    </div>
</div>

<?php

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<p class="return-to-shop">
		<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'perukar' ) ) );
			?>
		</a>
	</p>
<?php endif; ?>
