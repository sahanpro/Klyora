<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function perukar_klyora_product_points_label() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    $points = (int) round( $product->get_price() );

    if ( $points <= 0 ) {
        return;
    }

    echo '<p class="klyora-points-label">' . esc_html( sprintf( __( 'Earn %d Royalty Points', 'perukar' ), $points ) ) . '</p>';
}
add_action( 'woocommerce_single_product_summary', 'perukar_klyora_product_points_label', 25 );

function perukar_klyora_add_gift_option() {
    if ( ! is_product() ) {
        return;
    }

    echo '<div class="klyora-gift-option">';
    echo '<label for="klyora_is_gift"><input type="checkbox" id="klyora_is_gift" name="klyora_is_gift" value="1"> ' . esc_html__( 'This is a gift', 'perukar' ) . '</label>';
    echo '<textarea name="klyora_gift_message" maxlength="200" placeholder="' . esc_attr__( 'Add a gift message (max 200 chars)', 'perukar' ) . '"></textarea>';
    echo '</div>';
}
add_action( 'woocommerce_before_add_to_cart_button', 'perukar_klyora_add_gift_option', 22 );

function perukar_klyora_add_gift_meta_to_cart_item( $cart_item_data ) {
    if ( isset( $_POST['klyora_is_gift'] ) && '1' === $_POST['klyora_is_gift'] ) {
        $cart_item_data['klyora_is_gift'] = true;
    }

    if ( isset( $_POST['klyora_gift_message'] ) && ! empty( $_POST['klyora_gift_message'] ) ) {
        $cart_item_data['klyora_gift_message'] = sanitize_text_field( wp_unslash( $_POST['klyora_gift_message'] ) );
    }

    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'perukar_klyora_add_gift_meta_to_cart_item', 10, 1 );

function perukar_klyora_render_gift_meta( $item_data, $cart_item ) {
    if ( ! empty( $cart_item['klyora_is_gift'] ) ) {
        $item_data[] = array(
            'name'  => __( 'Gift', 'perukar' ),
            'value' => __( 'Yes', 'perukar' ),
        );
    }

    if ( ! empty( $cart_item['klyora_gift_message'] ) ) {
        $item_data[] = array(
            'name'  => __( 'Gift Message', 'perukar' ),
            'value' => $cart_item['klyora_gift_message'],
        );
    }

    return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'perukar_klyora_render_gift_meta', 10, 2 );

function perukar_klyora_save_gift_meta_to_order( $item, $cart_item_key, $values ) {
    if ( ! empty( $values['klyora_is_gift'] ) ) {
        $item->add_meta_data( __( 'Gift', 'perukar' ), __( 'Yes', 'perukar' ), true );
    }

    if ( ! empty( $values['klyora_gift_message'] ) ) {
        $item->add_meta_data( __( 'Gift Message', 'perukar' ), $values['klyora_gift_message'], true );
    }
}
add_action( 'woocommerce_checkout_create_order_line_item', 'perukar_klyora_save_gift_meta_to_order', 10, 3 );
