<!doctype html>
<html <?php language_attributes(); ?>>
<?php $perukar_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <?php if ( isset( $perukar_redux_demo['favicon']['url'] ) ) { ?>
            <link rel="shortcut icon" href="<?php echo esc_url( $perukar_redux_demo['favicon']['url'] ); ?>">
        <?php } ?>
    <?php } ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"><span></span></div>
    </div>
</div>

<?php if ( perukar_klyora_announcement_enabled() ) : ?>
<div class="klyora-announcement" role="region" aria-label="<?php esc_attr_e( 'Store Announcement', 'perukar' ); ?>">
    <div class="klyora-announcement__inner">
        <p><?php echo esc_html( get_theme_mod( 'klyora_announcement_text', __( 'Get 15% off your first Ayurvedic ritual. Free shipping over Rs. 999.', 'perukar' ) ) ); ?></p>
        <span><?php echo esc_html( get_theme_mod( 'klyora_countdown_text', __( 'Flash Sale Ends Sunday 11:59 PM', 'perukar' ) ) ); ?></span>
    </div>
    <button type="button" class="klyora-announcement__dismiss" aria-label="<?php esc_attr_e( 'Dismiss announcement', 'perukar' ); ?>">&times;</button>
</div>
<?php endif; ?>

<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<nav class="navbar navbar-expand-md klyora-navbar">
    <div class="container">
        <div class="logo-wrapper">
            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php if ( isset( $perukar_redux_demo['logo']['url'] ) && $perukar_redux_demo['logo']['url'] !== '' ) : ?>
                    <img src="<?php echo esc_url( $perukar_redux_demo['logo']['url'] ); ?>" class="logo-img" alt="<?php bloginfo( 'name' ); ?>">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" class="logo-img" alt="<?php bloginfo( 'name' ); ?>">
                <?php endif; ?>
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'perukar' ); ?>">
            <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'primary',
                    'container'       => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'menu'            => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new perukar_wp_bootstrap_navwalker(),
                    'items_wrap'      => '<ul class="navbar-nav ms-auto %2$s">%3$s</ul>',
                    'depth'           => 0,
                )
            );
            ?>

            <div class="klyora-utility-icons" aria-label="<?php esc_attr_e( 'Store tools', 'perukar' ); ?>">
                <button type="button" class="klyora-icon-btn klyora-search-toggle" aria-label="<?php esc_attr_e( 'Open search', 'perukar' ); ?>"><i class="ti-search"></i></button>
                <a class="klyora-icon-btn" href="<?php echo esc_url( function_exists( 'YITH_WCWL' ) && method_exists( YITH_WCWL(), 'get_wishlist_url' ) ? YITH_WCWL()->get_wishlist_url() : '#' ); ?>" aria-label="<?php esc_attr_e( 'Wishlist', 'perukar' ); ?>"><i class="ti-heart"></i></a>
                <a class="klyora-icon-btn" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : '#' ); ?>" aria-label="<?php esc_attr_e( 'Account', 'perukar' ); ?>"><i class="ti-user"></i></a>
                <div class="menu-item mini-cart">
                    <a href="<?php echo esc_url( function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : '#' ); ?>" class="cart-contents klyora-icon-btn" aria-label="<?php esc_attr_e( 'Cart', 'perukar' ); ?>">
                        <span class="cart-icon"></span>
                    </a>
                    <div class="mini-cart-dropdown">
                        <?php if ( function_exists( 'woocommerce_mini_cart' ) ) { woocommerce_mini_cart(); } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="klyora-search-overlay" aria-hidden="true">
    <button type="button" class="klyora-search-close" aria-label="<?php esc_attr_e( 'Close search', 'perukar' ); ?>">&times;</button>
    <div class="klyora-search-overlay__inner">
        <?php get_search_form(); ?>
    </div>
</div>
