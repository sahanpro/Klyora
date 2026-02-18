<?php
   $perukar_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php 
    while (have_posts()): the_post();
?>
<?php $featured_image = get_post_meta(get_the_ID(),'_cmb_featured_image', true); ?>
<?php $our_work_image = get_post_meta(get_the_ID(),'_cmb_our_work_image', true); ?>
<?php $our_work_image2 = get_post_meta(get_the_ID(),'_cmb_our_work_image2', true); ?>
<?php $our_work_image3 = get_post_meta(get_the_ID(),'_cmb_our_work_image3', true); ?>
<?php $our_work_image4 = get_post_meta(get_the_ID(),'_cmb_our_work_image4', true); ?>
<?php if(isset($perukar_redux_demo['image_team']['url']) && $perukar_redux_demo['image_team']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?php echo esc_url($perukar_redux_demo['image_team']['url']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/3.jpg">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center caption mt-60">
                <h5><?php if(isset($perukar_redux_demo['team_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['team_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'About Me', 'perukar' ); } ?></h5>
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<!-- Team Details -->
<section class="team-box section-padding pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30"> 
                <?php if ($featured_image !='')  { ?>
                <img src="<?php echo wp_get_attachment_url($featured_image);?>" class="img-fluid mb-30" alt="<?php the_title_attribute(); ?>">
                <?php } ?>
                <div class="section-head mb-20">
                    <div class="section-subtitle"><?php if(isset($perukar_redux_demo['team_subtitle'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['team_subtitle']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'About Me', 'perukar' ); } ?></div>
                    <div class="section-title mb-15"><?php the_title(); ?></div>
                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'perukar' ),
                        'after'       => '</div>',
                        'link_before' => '<p class="page-number">',
                        'link_after'  => '</p>',
                    ) ); ?>
        </div>
    </div>
</section>
<!-- Image Gallery -->
<section class="section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-0"><?php if(isset($perukar_redux_demo['our_work'])){?>
                    <?php echo wp_specialchars_decode(esc_attr($perukar_redux_demo['our_work']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Our Works', 'perukar' ); } ?></h5>
            </div>
        </div>
        <div class="row">
            <?php if ($our_work_image !='')  { ?>
            <div class="col-md-3 gallery-item">
                <a href="<?php echo wp_get_attachment_url($our_work_image);?>" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="<?php echo wp_get_attachment_url($our_work_image);?>" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if ($our_work_image2 !='')  { ?>
            <div class="col-md-3 gallery-item">
                <a href="<?php echo wp_get_attachment_url($our_work_image2);?>" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="<?php echo wp_get_attachment_url($our_work_image2);?>" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if ($our_work_image3 !='')  { ?>
            <div class="col-md-3 gallery-item">
                <a href="<?php echo wp_get_attachment_url($our_work_image3);?>" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="<?php echo wp_get_attachment_url($our_work_image3);?>" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if ($our_work_image4 !='')  { ?>
            <div class="col-md-3 gallery-item">
                <a href="<?php echo wp_get_attachment_url($our_work_image4);?>" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="<?php echo wp_get_attachment_url($our_work_image4);?>" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php endwhile; ?>
<?php
    get_footer();
?>

