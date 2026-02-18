<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<div class="product-gallery">
		<?php
		$attachment_ids = $product->get_gallery_image_ids();
		if ( $attachment_ids ) : ?>
			<div class="swiper-container gallery-main">
				<div class="swiper-wrapper">
					<?php
					// Display main product image
					$main_image_id = $product->get_image_id();
					echo '<div class="swiper-slide">' . wp_get_attachment_image( $main_image_id, 'large' ) . '</div>';

					// Display gallery images
					foreach ( $attachment_ids as $attachment_id ) {
						echo '<div class="swiper-slide">' . wp_get_attachment_image( $attachment_id, 'large' ) . '</div>';
					}
					?>
				</div>
				<!-- Navigation buttons -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>

			<div class="swiper-container gallery-thumbs">
				<div class="swiper-wrapper">
					<?php
					// Thumbnails for main image
					echo '<div class="swiper-slide">' . wp_get_attachment_image( $main_image_id, 'thumbnail' ) . '</div>';

					// Thumbnails for gallery images
					foreach ( $attachment_ids as $attachment_id ) {
						echo '<div class="swiper-slide">' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '</div>';
					}
					?>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>