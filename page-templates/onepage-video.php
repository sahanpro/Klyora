<?php
/*
 * Template Name: Onepage Video
 * Description: A Page Template with a Page Builder design.
 */
$perukar_redux_demo = get_option('redux_demo');
get_header('onepage-video'); ?>
<?php if (have_posts()){ ?>
    
<?php while (have_posts()) : the_post()?>
  <?php the_content(); ?>
<?php endwhile; ?>

<?php }else {
echo esc_html__( 'Page Canvas For Page Builder', 'perukar' );
}?>
<?php
get_footer();
?>