<?php
     $perukar_redux_demo = get_option('redux_demo');
     get_header(); 
?>
<?php if(isset($perukar_redux_demo['image_blog']['url']) && $perukar_redux_demo['image_blog']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url($perukar_redux_demo['image_blog']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/4.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
                <h1><?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'perukar' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'perukar' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'perukar' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'perukar' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'perukar' ) ) );
                        else :
                            echo esc_html__( 'Archives', 'perukar' );
                        endif;?></h1>
            </div>
        </div>
    </div>
</div>
<!-- Blog 3 -->
<section class="news2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <?php
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
                    ?> 
                    <div class="col-md-12">
                        <div class="item">
                            <?php if (has_post_thumbnail()) { ?>
                            <div class="post-img">
                                <a href="<?php the_permalink();?>"> <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>"> </a>
                                <div class="date">
                                    <a href="<?php the_permalink();?>"> <span><?php the_time('F'); ?></span> <i><?php the_time('j'); ?></i> </a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="post-cont">
                                <?php if ($cate_name !='')  { ?>
                                <a href="<?php echo esc_attr($cate_slug);?>"><span class="tag"><?php echo esc_html($cate_name);?></span></a>
                                <?php } ?>
                                 
                                <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                                <p><?php if(isset($perukar_redux_demo['blog_excerpt'])){?>
                                    <?php echo esc_html(perukar_excerpt($perukar_redux_demo['blog_excerpt'])); ?>
                                    <?php }else{?>
                                    <?php echo esc_html(perukar_excerpt(50)); } ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <div class="col-md-12">
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
            <div class="col-md-4">
                <div class="news2-sidebar row">
                    <?php get_sidebar();?> 
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    get_footer();
?>