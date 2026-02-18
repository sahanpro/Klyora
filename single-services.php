
<?php
   $perukar_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php 
    while (have_posts()): the_post();
?>
<?php if(isset($perukar_redux_demo['image_services']['url']) && $perukar_redux_demo['image_services']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url($perukar_redux_demo['image_services']['url']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/2.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
                <h5><?php if(isset($perukar_redux_demo['services_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['services_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Services Page', 'perukar' ); } ?></h5>
                <h1><?php the_title();?></h1>
            </div>
        </div>
    </div>
</div>
<!-- Services Page -->
<section class="barber-pricing section-padding">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-7 mb-30">
                <?php the_content(); ?>
                <?php wp_link_pages( array(
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'perukar' ),
                    'after'       => '</div>',
                    'link_before' => '<p class="page-number">',
                    'link_after'  => '</p>',
                ) ); ?>
            </div>
            <!-- Sidebar -->
            <div class="col-md-4 offset-md-1 sidebar-side">
                <aside class="sidebar blog-sidebar mb-60">
                    <div class="sidebar-widget services">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4><?php if(isset($perukar_redux_demo['all_services'])){?>
                                <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['all_services']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'All Services', 'perukar' ); } ?></h4>
                            </div>
                            <ul>
                                <?php 
                                wp_nav_menu( 
                                    array( 
                                      'theme_location' => 'menu_services',
                                      'container' => '',
                                      'menu_class' => '', 
                                      'menu_id' => '',
                                      'menu'            => '',
                                      'container_class' => '',
                                      'container_id'    => '',
                                      'echo'            => true,
                                       'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                       'walker'            => new perukar_wp_bootstrap_navwalker3(),
                                      'before'          => '',
                                      'after'           => '',
                                      'link_before'     => '',
                                      'link_after'      => '',
                                      'items_wrap'      => '<ul class="navbar-nav ms-auto %2$s" >%3$s</ul>',
                                      'depth'           => 0,        
                                    )
                                ); ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<!-- Other Services -->
<section class="services-1 section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-head">
                    <div class="section-subtitle"><?php if(isset($perukar_redux_demo['our_services_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['our_services_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Our Services', 'perukar' ); } ?></div>
                    <div class="section-title"><?php if(isset($perukar_redux_demo['other_services_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['other_services_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Other Services', 'perukar' ); } ?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <?php $args = array(    
                        'paged' => $paged,
                        'post_type' => 'services',
                        'posts_per_page'=> 9,
                        );
                        $wp_query = new WP_Query($args);
                        while (have_posts()): the_post();
                        ?>
                        <?php $icon = get_post_meta(get_the_ID(),'_cmb_icon', true); ?>
                    <div class="item mb-0">
                        <a href="<?php the_permalink();?>"> <span class="icon <?php echo esc_attr($icon);?>"></span>
                            <h5><?php the_title(); ?></h5>
                            <p><?php if(isset($perukar_redux_demo['services_excerpt'])){?>
                            <?php echo esc_html(perukar_excerpt2($perukar_redux_demo['services_excerpt'])); ?>
                            <?php }else{?>
                            <?php echo esc_html(perukar_excerpt2(20)); } ?></p>
                            <div class="shape"> <span class="icon <?php echo esc_attr($icon);?>"></span> </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    get_footer();
?>

