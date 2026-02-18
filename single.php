<?php
   $perukar_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php 
    while (have_posts()): the_post();
?>
<?php if(isset($perukar_redux_demo['image_single']['url']) && $perukar_redux_demo['image_single']['url'] != ''){?> 
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="6" data-background="<?php echo esc_url($perukar_redux_demo['image_single']['url']);?>">
<?php }else{?>
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="6" data-background="<?php echo esc_url(get_template_directory_uri());?>/img/slider/8.jpg">
<?php } ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center caption mt-60">
                <h2><?php the_title(); ?></h2>
                <div class="post">
                    <div class="author"> <i class="ti-user"></i> <span><?php the_author_posts_link(); ?></span> </div>
                    <div class="date-comment"> <i class="ti-calendar"></i> <?php the_time(get_option( 'date_format'));?> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Post -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <?php if (has_post_thumbnail()) { ?>
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="mb-30" alt="<?php the_title_attribute(); ?>">
                <?php } ?>
                <?php the_content(); ?>
                <?php wp_link_pages( array(
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'perukar' ),
                    'after'       => '</div>',
                    'link_before' => '<p class="page-number">',
                    'link_after'  => '</p>',
                ) ); ?>
            </div>
        </div>
        <?php  if ( comments_open() || get_comments_number() ) { ?>
        <div class="post-comment-section">
            <div class="row">
                <!-- Comment -->
                <?php comments_template();?>
            </div>
        </div>
        <?php }?>
    </div>
</section>
<?php endwhile; ?>
<?php
    get_footer();
?>

