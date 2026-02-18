<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

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
                <h5><?php if(isset($perukar_redux_demo['product_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['product_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Our Product', 'perukar' ); } ?></h5>
                    <h1 class="shop-title"><?php if(isset($perukar_redux_demo['product_title']) && $perukar_redux_demo['product_title'] != ''){?>
                        <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['product_title']));?>
                    <?php }else{?>
                        <?php echo esc_html__( 'Product', 'perukar' );
                    }
                ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="shop-details-area">
	<div class="container">

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
	</div>
</section>

<section class="shop-area  recent-shop-area product-related rooms2 section-padding">
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
                            <span class="category">
                                <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
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
                                <div class="swiper product-thumbnail-slider mt-2">
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

<?php
get_footer();
