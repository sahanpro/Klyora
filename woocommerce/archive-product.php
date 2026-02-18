<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

$perukar_redux_demo = get_option('redux_demo');
get_header(); ?>

<?php if(isset($perukar_redux_demo['shop_banner']['url']) && $perukar_redux_demo['shop_banner']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_attr($perukar_redux_demo['shop_banner']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/4.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
                <h5><?php if(isset($perukar_redux_demo['shop_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['shop_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Our Shop', 'perukar' ); } ?></h5>
                <?php

					/**
					 * Hook: woocommerce_shop_loop_header.
					 *
					 * @since 8.6.0
					 *
					 * @hooked woocommerce_product_taxonomy_archive_header - 10
					 */
					do_action( 'woocommerce_shop_loop_header' );
					?>
            </div>
        </div>
    </div>
</div>

<section class="section-padding shop-area rooms2 ">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<?php if ( woocommerce_product_loop() ) {
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' ); ?>
			<div class="col-lg-4 col-md-12">
				<div class="shop-sidebar">
					<?php get_sidebar('shop'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$idd=0;
while (have_posts()): the_post();
	$idd ++;
	$id = get_the_ID();
	?>
	<div class="grid__quick__view__modal modalarea modal fade" id="exampleModal<?php echo esc_attr($id); ?>" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog modal__wraper">
			<div class="modal-content">
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>

				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<?php 
							$product = wc_get_product($id);
							$attachment_ids = $product->get_gallery_image_ids();
							?>

							<div class="swiper product-main-slider mb-3">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="img-fluid">
									</div>

									<?php
									if ($attachment_ids) {
										foreach ($attachment_ids as $attachment_id) {
											$image_url = wp_get_attachment_url($attachment_id);
											echo '<div class="swiper-slide">
											<img src="' . esc_url($image_url) . '" alt="' . esc_attr($product->get_name()) . '" class="img-fluid">
											</div>';
										}
									}
									?>
								</div>
								<div class="swiper-pagination"></div>
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
							</div>

							<?php if ($attachment_ids): ?>
								<div class="swiper product-thumbnail-slider mt-2 gallery-thumbs">
									<div class="swiper-wrapper">
										<div class="swiper-slide">
											<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="img-thumbnail">
										</div>
										<?php
										foreach ($attachment_ids as $attachment_id) {
											$thumbnail_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
											echo '<div class="swiper-slide">
											<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($product->get_name()) . '" class="img-thumbnail">
											</div>';
										}
										?>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<div class="col-md-6">
							<h2 class="product_title" data-url="<?php echo esc_url(get_permalink($id)); ?>">
								<a href="<?php echo esc_url(get_permalink($id)); ?>">
								<?php echo esc_html($product->get_name()); ?>
								</a>
							</h2>
							<?php $average_rating = $product->get_average_rating();
							$review_count = $product->get_review_count();
							if ($review_count > 0) { ?>
								<div class="woocommerce-product-rating">
									<?php 
									echo wc_get_rating_html($average_rating);
									echo '<span class="rating-count"> (' . esc_html($review_count) . ' ' . __('customer reviews', 'perukar') . ')</span>';
									?>
								</div>
							<?php } ?>
							<div class="price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
							<div class="woocommerce-product-details__short-description"><?php echo wpautop($product->get_short_description()); ?></div>

							<form class="cart" method="post" enctype="multipart/form-data">
								<?php woocommerce_quantity_input(); ?>

								<?php wp_nonce_field('woocommerce-add-to-cart', 'woocommerce-add-to-cart-nonce'); ?>
								<input type="hidden" name="redirect_to_product" value="1" />

								<button type="submit" name="add-to-cart" value="<?php echo esc_attr($id); ?>" 
									class="single_add_to_cart_button button alt">
									<?php echo esc_html($product->single_add_to_cart_text()); ?>
								</button>
							</form>


							<div class="product-wishlist mt-3">
								<?php 
								echo do_shortcode('[yith_wcwl_add_to_wishlist product_id="' . esc_attr($id) . '"]'); 
								?>
							</div>
							<div class="product_meta mt-3">
								<?php
								$product_cats = wp_get_post_terms($id, 'product_cat');
								if (!empty($product_cats) && !is_wp_error($product_cats)) {
									echo '<span class="posted_in">' . __('Category:', 'perukar') . ' ';
									$cat_links = array();

									foreach ($product_cats as $cat) {
										$cat_links[] = '<a href="' . esc_url(get_term_link($cat->term_id)) . '" rel="tag">' . esc_html($cat->name) . '</a>';
									}

									echo implode(', ', $cat_links);
									echo '</span>';
								}
								?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; ?>


<section class="shop-area recent-shop-area product-related rooms2 section-padding">
	<div class="container">
		<div class="row">
			<div class="section-head mb-40">
                <div class="section-subtitle"><?php echo esc_html__( 'Our Shop', 'perukar' )?></div>
                <div class="section-title"><?php echo esc_html__( 'Related Product', 'perukar' )?></div>
            </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme">
					<?php
					$args = array(
						'posts_per_page' => 6,
						'post_type'      => 'product',
						'orderby'        => 'rand',
					);

					$product_query = new \WP_Query($args);

					while ($product_query->have_posts()) : $product_query->the_post();
						$product = wc_get_product(get_the_ID());
						?>
						<div class="product-item item">
							<div class="position-re o-hidden position-re-order-shop">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
							<span class="category"><div class="price">
								<?php echo wp_kses_post($product->get_price_html()); ?>
							</div>
							</span>
							<div class="actions"> 
								<?php $id = $product ? $product->get_id() : get_the_ID();
								echo do_shortcode('[add_to_cart id="' . $id . '"]');?>
								<a class="icon-btn no-scroll" data-toggle="modal" data-target="#exampleModal<?php echo esc_attr($id); ?>"><i class="ti-eye"></i>
								</a>
								<div class="wishlist-icon"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
							</div>
							<div class="con">
								<h4 class="shop"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
								<div class="line"></div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
while ($product_query->have_posts()) : $product_query->the_post();
	$id = get_the_ID();
	?>
	<div class="grid__quick__view__modal modalarea modal fade" id="exampleModal<?php echo esc_attr($id); ?>" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog modal__wraper">
			<div class="modal-content">
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="<?php echo esc_attr('Close', 'perukar'); ?>"></button>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<?php 
							$product = wc_get_product($id);
							$attachment_ids = $product->get_gallery_image_ids();
							?>

							<div class="swiper product-main-slider mb-3">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="img-fluid">
									</div>

									<?php
									if ($attachment_ids) {
										foreach ($attachment_ids as $attachment_id) {
											$image_url = wp_get_attachment_url($attachment_id);
											echo '<div class="swiper-slide">
											<img src="' . esc_url($image_url) . '" alt="' . esc_attr($product->get_name()) . '" class="img-fluid">
											</div>';
										}
									}
									?>
								</div>
								<div class="swiper-pagination"></div>
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
							</div>

							<?php if ($attachment_ids): ?>
								<div class="swiper product-thumbnail-slider mt-2 gallery-thumbs">
									<div class="swiper-wrapper">
										<div class="swiper-slide">
											<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="img-thumbnail">
										</div>
										<?php
										foreach ($attachment_ids as $attachment_id) {
											$thumbnail_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
											echo '<div class="swiper-slide">
											<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($product->get_name()) . '" class="img-thumbnail">
											</div>';
										}
										?>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<div class="col-md-6">
							<h2 class="product_title"><a href="<?php echo esc_url(get_permalink($id)); ?>">
								<?php echo esc_html($product->get_name()); ?>
								</a></h2>
							<?php $average_rating = $product->get_average_rating();
							$review_count = $product->get_review_count();
							if ($review_count > 0) { ?>
								<div class="woocommerce-product-rating">
									<?php 
									echo wc_get_rating_html($average_rating);
									echo '<span class="rating-count"> (' . esc_html($review_count) . ' ' . __('customer reviews', 'perukar') . ')</span>';
									?>
								</div>
							<?php } ?>
							<div class="price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
							<div class="woocommerce-product-details__short-description"><?php echo wpautop($product->get_short_description()); ?></div>

							<form class="cart" action="<?php echo esc_url($product->add_to_cart_url()); ?>" method="post" enctype="multipart/form-data">
								<?php woocommerce_quantity_input(); ?>
								<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
							</form>
							<div class="product-wishlist mt-3">
								<?php 
								echo do_shortcode('[yith_wcwl_add_to_wishlist product_id="' . esc_attr($id) . '"]'); 
								?>
							</div>
							<div class="product_meta mt-3">
								<?php
								$product_cats = wp_get_post_terms($id, 'product_cat');
								if (!empty($product_cats) && !is_wp_error($product_cats)) {
									echo '<span class="posted_in">' . __('Category:', 'perukar') . ' ';
									$cat_links = array();

									foreach ($product_cats as $cat) {
										$cat_links[] = '<a href="' . esc_url(get_term_link($cat->term_id)) . '" rel="tag">' . esc_html($cat->name) . '</a>';
									}

									echo implode(', ', $cat_links);
									echo '</span>';
								}
								?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; ?>

<?php get_footer( 'shop' ); ?>