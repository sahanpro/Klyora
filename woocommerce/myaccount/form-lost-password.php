<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<?php $perukar_redux_demo = get_option('redux_demo'); ?>

<?php if(isset($perukar_redux_demo['shop_banner']['url']) && $perukar_redux_demo['shop_banner']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_attr($perukar_redux_demo['shop_banner']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/4.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
            	<h1 class="shop-title"><?php echo esc_html__( 'Lost Your Password', 'perukar' );?></h1>
            </div>
        </div>
    </div>
</div>

<div class="password-area pt-100 pb-100">
	<!-- Product -->
	<div class="container">
		<div class="row">

			<?php do_action( 'woocommerce_before_lost_password_form' );
			?>

			<form method="post" class="woocommerce-ResetPassword lost_reset_password">

				<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'perukar' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="user_login"><?php esc_html_e( 'Username or email', 'perukar' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'perukar' ); ?></span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" required aria-required="true" />
				</p>

				<div class="clear"></div>

				<?php do_action( 'woocommerce_lostpassword_form' ); ?>

				<p class="woocommerce-form-row form-row">
					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit" class="woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Reset password', 'perukar' ); ?>"><?php esc_html_e( 'Reset password', 'perukar' ); ?></button>
				</p>

				<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

			</form>
			<?php
			do_action( 'woocommerce_after_lost_password_form' );?>
		</div>
	</div>
</div>