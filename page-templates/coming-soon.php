<?php
/*
 * Template Name: Coming Soon
 * Description: A Page Template with a Page Builder design.
 */
$perukar_redux_demo = get_option('redux_demo');
get_header('coming-soon'); ?>

<section class="comming section-padding">
        <div class="v-middle">
            <div class="container">
                <div class="row text-center mb-30">
                    <div class="col-md-12">
                        <h2><?php echo esc_html__( 'Coming Soon!', 'perukar' )?></h2>
                        <h6><?php echo esc_html__( 'Under Construction', 'perukar' )?></h6>
                    </div>
                </div>
                <div class="row text-center mb-30">
                    <div class="col-6 offset-md-2 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="days">00</h3>
                            </div>
                            <div class="item-info">
                                <h6 class="mb-0"><?php echo esc_html__( 'Days', 'perukar' )?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="hours">00</h3>
                            </div>
                            <div class="item-info">
                                <h6 class="mb-0"><?php echo esc_html__( 'Hours', 'perukar' )?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="minutes">00</h3>
                            </div>
                            <div class="item-info">
                                <h6 class="mb-0"><?php echo esc_html__( 'Minutes', 'perukar' )?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <div class="item">
                            <div class="down">
                                <h3 id="seconds">00</h3>
                            </div>
                            <div class="item-info">
                                <h6 class="mb-0"><?php echo esc_html__( 'Seconds', 'perukar' )?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="offset-md-3 col-md-6">
                        <p><?php echo esc_html__( 'Sign up for our latest news & articles.', 'perukar' )?></p>
                        <?php echo do_shortcode('[contact-form-7 id="222" title="Coming Soon"]'); ?>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-md-12 text-center">
                        <a href='<?php echo esc_url(home_url('/')); ?>' class="link-btn"><span class="ti-arrow-left"></span> <?php echo esc_html__( 'Home Page', 'perukar' )?> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
<?php
get_footer('coming-soon');
?>