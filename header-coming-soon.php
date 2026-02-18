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