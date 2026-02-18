<?php $perukar_redux_demo = get_option('redux_demo'); ?>
<footer class="footer klyora-footer">
    <div class="klyora-footer__newsletter container">
        <div>
            <p class="klyora-decorative"><?php esc_html_e( 'The Ayurvedic Journal', 'perukar' ); ?></p>
            <h3><?php echo esc_html( get_theme_mod( 'klyora_newsletter_title', __( 'Get 15% off your first Ayurvedic ritual', 'perukar' ) ) ); ?></h3>
        </div>
        <form class="klyora-newsletter-form" action="#" method="post">
            <label class="screen-reader-text" for="klyora-newsletter-email"><?php esc_html_e( 'Email', 'perukar' ); ?></label>
            <input id="klyora-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e( 'Enter your email', 'perukar' ); ?>" required>
            <button type="submit"><?php esc_html_e( 'Join', 'perukar' ); ?></button>
        </form>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-1' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Quick Links', 'perukar' ); ?></h4>
                        <ul class="klyora-footer-links">
                            <li><a href="#"><?php esc_html_e( 'Shop', 'perukar' ); ?></a></li>
                            <li><a href="#"><?php esc_html_e( 'About Ayurveda', 'perukar' ); ?></a></li>
                            <li><a href="#"><?php esc_html_e( 'Gift Services', 'perukar' ); ?></a></li>
                            <li><a href="#"><?php esc_html_e( 'Rewards', 'perukar' ); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Customer Care', 'perukar' ); ?></h4>
                        <ul class="klyora-footer-links">
                            <li><a href="#"><?php esc_html_e( 'Shipping', 'perukar' ); ?></a></li>
                            <li><a href="#"><?php esc_html_e( 'Returns', 'perukar' ); ?></a></li>
                            <li><a href="#"><?php esc_html_e( 'FAQ', 'perukar' ); ?></a></li>
                            <li><a href="#"><?php esc_html_e( 'Track Order', 'perukar' ); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-12">
                    <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-3' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Contact', 'perukar' ); ?></h4>
                        <p><?php esc_html_e( 'KLYORA by ishi | Ayurvedic Beauty Studio', 'perukar' ); ?></p>
                        <p><?php esc_html_e( 'care@klyora.com | +91 90000 00000', 'perukar' ); ?></p>
                        <div class="klyora-trust-badges">
                            <span><?php esc_html_e( '100% Organic', 'perukar' ); ?></span>
                            <span><?php esc_html_e( 'Cruelty-Free', 'perukar' ); ?></span>
                            <span><?php esc_html_e( 'Secure Checkout', 'perukar' ); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <p class="footer-bottom-copy-right">
                    <?php
                    if ( isset( $perukar_redux_demo['copyright'] ) && $perukar_redux_demo['copyright'] !== '' ) {
                        echo wp_specialchars_decode( esc_attr( $perukar_redux_demo['copyright'] ) );
                    } else {
                        esc_html_e( '2026 KLYORA by ishi. All rights reserved.', 'perukar' );
                    }
                    ?>
                </p>
                <a href="#" class="klyora-back-to-top"><?php esc_html_e( 'Back to Top', 'perukar' ); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
