<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
 $perukar_redux_demo = get_option('redux_demo');
get_header('404'); ?> 
<section class="comming section-padding text-center">
    <div class="v-middle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1><?php if(isset($perukar_redux_demo['404'])){?>
                            <?php echo esc_attr($perukar_redux_demo['404']);?>
                            <?php }else{?>
                            <?php echo esc_html__( '404', 'perukar' ); } ?></h1>
                    <h2><?php if(isset($perukar_redux_demo['404_subtitle'])){?>
                            <?php echo esc_attr($perukar_redux_demo['404_subtitle']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Not Found!', 'perukar' ); } ?></h2>
                    <h6><?php if(isset($perukar_redux_demo['text'])){?>
                            <?php echo esc_attr($perukar_redux_demo['text']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Sorry We Can not Find That Page!', 'perukar' ); } ?></h6>
                    <p><?php if(isset($perukar_redux_demo['404_desc'])){?>
                            <?php echo esc_attr($perukar_redux_demo['404_desc']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'The page you are looking for was moved, removed, renamed or never existed.', 'perukar' ); } ?></p>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <form action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="text" name="s" placeholder="Search" required>
                                <button type="submit"><?php if(isset($perukar_redux_demo['search'])){?>
                            <?php echo esc_attr($perukar_redux_demo['search']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Search', 'perukar' ); } ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-12">
                    <a href='<?php echo esc_url(home_url('/')); ?>' class="link-btn"><span class="ti-arrow-left"></span> <?php if(isset($perukar_redux_demo['button'])){?>
                            <?php echo esc_attr($perukar_redux_demo['button']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Home Page', 'perukar' ); } ?> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer('404'); ?> 
