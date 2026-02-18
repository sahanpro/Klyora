<!doctype html>
<html <?php language_attributes(); ?>>
<?php $perukar_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <?php if(isset($perukar_redux_demo['favicon']['url'])){?>
            <link rel="shortcut icon" href="<?php echo esc_url($perukar_redux_demo['favicon']['url']); ?>">
        <?php }?>
    <?php }?>
    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
<!-- PRELOADER -->
<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"> <span></span> </div>
    </div>
</div>
<!-- Progress scroll totop -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-md">
    <div class="container">
        <!-- Logo -->
        <?php if(isset($perukar_redux_demo['logo']['url']) && $perukar_redux_demo['logo']['url'] != ''){?>
            <div class="logo-wrapper">
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php echo esc_url($perukar_redux_demo['logo']['url']); ?>" class="logo-img" alt="<?php bloginfo( 'name' ); ?>"> </a>
            </div>
        <?php }else{ ?>
            <div class="logo-wrapper">
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php echo esc_url(get_template_directory_uri());?>/img/logo.png" class="logo-img" alt="<?php bloginfo( 'name' ); ?>"> </a>
            </div>
        <?php } ?> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <?php 
            wp_nav_menu( 
              array( 
                  'theme_location' => 'primary-multipage-image',
                  'container' => '',
                  'menu_class' => '', 
                  'menu_id' => '',
                  'menu'            => '',
                  'container_class' => '',
                  'container_id'    => '',
                  'echo'            => true,
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new perukar_wp_bootstrap_navwalker(),
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul class="navbar-nav ms-auto %2$s" >%3$s</ul>',
                  'depth'           => 0,        
              )
          ); ?>
          <?php if( isset($perukar_redux_demo['header_minicart']) && $perukar_redux_demo['header_minicart'] == 1 ) { ?>
            <div class="menu-item mini-cart">
                <a href="<?php echo wc_get_cart_url(); ?>" class="cart-contents">
                    <span class="cart-icon"></span>
                </a>
                <div class="mini-cart-dropdown">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</nav>
