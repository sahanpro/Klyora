<?php
/*
 * Template Name: Blog 02
 * Description: A Page Template with a Page Builder design.
 */
$perukar_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php if(isset($perukar_redux_demo['image_blog']['url']) && $perukar_redux_demo['image_blog']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url($perukar_redux_demo['image_blog']['url']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/4.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
                <h5>
                    <?php if(isset($perukar_redux_demo['blog_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['blog_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Our Blog', 'perukar' ); } ?>
                </h5>
                <h1>
                    <?php if(isset($perukar_redux_demo['blog_title'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['blog_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Latest News', 'perukar' ); } ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- Blog 2 -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $idd=0;
                $args = array(    
                'paged' => $paged,
                'post_type' => 'post',
                );
                $wp_query = new WP_Query($args);
                
                while (have_posts()): the_post();
                    $cates = get_the_terms(get_the_ID(), 'category');
                        $cate_name = '';
                        $cate_slug = '';

                        if (!empty($cates) && !is_wp_error($cates)) {
                            foreach ($cates as $cate) {
                                $cate_name .= $cate->name . ' ';
                                $cate_slug .= $cate->slug . ' ';
                            }
                        }
                $idd++;
                ?>
                <?php if ($idd%2==1)  { ?>
                <div class="barber-services-2 mb-90">
                <?php } else {?>
                <div class="barber-services-2 mb-90 left">
                <?php } ?>
                    <?php if (has_post_thumbnail()) { ?>
                    <figure><a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>" class="img-fluid"></a></figure>
                    <?php } ?>
                    <div class="caption">
                        <?php if ($cate_name !='')  { ?>
                        <h3><a href="<?php the_permalink();?>"><?php echo esc_html($cate_name);?></a></h3>
                        <?php } ?>
                        <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                        <p> 
                            <?php if(isset($perukar_redux_demo['blog_excerpt'])){?>
                            <?php echo esc_html(perukar_excerpt($perukar_redux_demo['blog_excerpt'])); ?>
                            <?php }else{?>
                            <?php echo esc_html(perukar_excerpt(50)); } ?>
                        </p>
                        <hr class="border-2">
                        <div class="info-wrapper">
                            <div class="more"><a href="<?php the_permalink();?>" class="link-btn blck" tabindex="0">
                                <?php if(isset($perukar_redux_demo['read_more'])){?>
                                <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['read_more']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'READ MORE', 'perukar' ); } ?></a>
                            </div>
                            <div class="icon ti-calendar"> <?php the_time(get_option( 'date_format'));?></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <!-- Pagination -->
                <?php 
                    $pagination = array(
                    'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                    'format'    => '',
                    'prev_text' => wp_specialchars_decode('<i class="ti-angle-left"></i>'),
                    'next_text' => wp_specialchars_decode('<i class="ti-angle-right"></i>'),
                    'type'      => 'list',
                    'end_size'    => 3,
                    'mid_size'    => 3
                    );
                    if(paginate_links( $pagination ) != ''){
                        $return =  paginate_links( $pagination );
                        echo str_replace( "<ul class='page-numbers'>", '<ul class="news-pagination-wrap align-center mb-30 mt-30">', $return );
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>