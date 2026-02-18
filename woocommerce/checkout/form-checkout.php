<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php $perukar_redux_demo = get_option('redux_demo'); ?>

<?php if(isset($perukar_redux_demo['shop_banner']['url']) && $perukar_redux_demo['shop_banner']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_attr($perukar_redux_demo['shop_banner']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/4.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
            	<h5><?php if(isset($perukar_redux_demo['checkout_subtitle'])){?>
            		<?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['checkout_subtitle']));?>
            	<?php }else{?>
            		<?php echo esc_html__( 'My Checkout', 'perukar' ); } ?></h5>
            	<h1 class="shop-title"><?php if(isset($perukar_redux_demo['checkout_title']) && $perukar_redux_demo['checkout_title'] != ''){?>
            			<?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['checkout_title']));?>
            		<?php }else{?>
            			<?php echo esc_html__( 'Checkout', 'perukar' );
            		}
            	?></h1>
            </div>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'perukar' ) ) );
	return;
}

?>

<section class="coupon-area mt-100 mb-100">
	<div class="container">
		<div class="row">

			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'perukar' ); ?>">

				<?php if ( $checkout->get_checkout_fields() ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				<div class="row">
					<div class="col-lg-6" id="customer_details">
						<div class="checkbox-form">
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
						</div>

						<div class="order-notes">
							<?php do_action( 'woocommerce_checkout_shipping' ); ?>
						</div>
					</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>

				<div class="col-lg-6">
                            <div class="your-order mb-30 ">
				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

				<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'perukar' ); ?></h3>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				</div>
				</div>
				</div>
				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

			</form>

			<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

		</div>
	</div>
</section>