<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function perukar_child_enqueue_styles() {
    wp_enqueue_style( 'perukar-parent-style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
    wp_enqueue_style( 'perukar-child-style', get_stylesheet_uri(), array( 'perukar-parent-style' ), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'perukar_child_enqueue_styles', 99 );
