<?php
/*
 * Template Name: KLYORA Luxury Home
 * Description: Luxury Ayurvedic eCommerce homepage.
 */
get_header();

$shop_url        = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
$account_url     = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/' );
$hero_title      = get_theme_mod( 'klyora_hero_title', __( 'Ancient Ayurvedic Wisdom, Modern Luxury', 'perukar' ) );
$hero_subtitle   = get_theme_mod( 'klyora_hero_subtitle', __( 'Discover our curated collection of organic hair oils, face serums, and beauty rituals.', 'perukar' ) );
$hero_primary    = get_theme_mod( 'klyora_hero_primary_cta', __( 'Shop Collection', 'perukar' ) );
$hero_secondary  = get_theme_mod( 'klyora_hero_secondary_cta', __( 'Take Skin Quiz', 'perukar' ) );
$product_query   = null;

if ( class_exists( 'WooCommerce' ) ) {
    $product_query = new WP_Query(
        array(
            'post_type'      => 'product',
            'posts_per_page' => 8,
            'post_status'    => 'publish',
        )
    );
}
?>

<main class="klyora-home">
    <section class="klyora-hero">
        <div class="klyora-hero__media" style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/img/slider/19.jpg' ); ?>')"></div>
        <div class="klyora-hero__overlay"></div>
        <div class="container klyora-hero__content">
            <p class="klyora-decorative"><?php esc_html_e( 'KLYORA by ishi', 'perukar' ); ?></p>
            <h1><?php echo esc_html( $hero_title ); ?></h1>
            <p><?php echo esc_html( $hero_subtitle ); ?></p>
            <div class="klyora-hero__actions">
                <a class="klyora-btn klyora-btn--solid" href="<?php echo esc_url( $shop_url ); ?>"><?php echo esc_html( $hero_primary ); ?></a>
                <a class="klyora-btn klyora-btn--ghost" href="#klyora-dosha-quiz"><?php echo esc_html( $hero_secondary ); ?></a>
            </div>
            <div class="klyora-hero__badges">
                <span><?php esc_html_e( '100% Organic', 'perukar' ); ?></span>
                <span><?php esc_html_e( 'Cruelty-Free', 'perukar' ); ?></span>
            </div>
        </div>
    </section>

    <section class="klyora-section container">
        <div class="klyora-section-head">
            <h2><?php esc_html_e( 'Shop by Ritual', 'perukar' ); ?></h2>
        </div>
        <div class="klyora-category-grid">
            <a href="<?php echo esc_url( $shop_url ); ?>" class="klyora-category klyora-category--lg"><span><?php esc_html_e( 'Hair Oils', 'perukar' ); ?></span></a>
            <a href="<?php echo esc_url( $shop_url ); ?>" class="klyora-category"><span><?php esc_html_e( 'Face Serums', 'perukar' ); ?></span></a>
            <a href="<?php echo esc_url( $shop_url ); ?>" class="klyora-category"><span><?php esc_html_e( 'Multani Mitti', 'perukar' ); ?></span></a>
            <a href="<?php echo esc_url( $shop_url ); ?>" class="klyora-category"><span><?php esc_html_e( 'Lip Care', 'perukar' ); ?></span></a>
            <a href="<?php echo esc_url( $shop_url ); ?>" class="klyora-category"><span><?php esc_html_e( 'Body Care', 'perukar' ); ?></span></a>
            <a href="<?php echo esc_url( $shop_url ); ?>" class="klyora-category klyora-category--featured"><span><?php esc_html_e( 'Gift Sets', 'perukar' ); ?></span></a>
        </div>
    </section>

    <section class="klyora-section klyora-section--dark">
        <div class="container">
            <div class="klyora-section-head">
                <h2><?php esc_html_e( 'Bestsellers', 'perukar' ); ?></h2>
                <a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'View all products', 'perukar' ); ?></a>
            </div>
            <?php if ( $product_query && $product_query->have_posts() ) : ?>
                <div class="klyora-products">
                    <?php while ( $product_query->have_posts() ) : $product_query->the_post(); ?>
                        <?php global $product; ?>
                        <article <?php post_class( 'klyora-product-card' ); ?>>
                            <a href="<?php the_permalink(); ?>" class="klyora-product-card__thumb"><?php echo wp_kses_post( woocommerce_get_product_thumbnail( 'woocommerce_thumbnail' ) ); ?></a>
                            <div class="klyora-product-card__content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="klyora-product-card__price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
                                <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" data-quantity="1" class="klyora-btn klyora-btn--small add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" rel="nofollow"><?php esc_html_e( 'Add to cart', 'perukar' ); ?></a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <p><?php esc_html_e( 'Add WooCommerce products to display bestsellers here.', 'perukar' ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="klyora-section container klyora-story">
        <div class="klyora-story__media" style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/img/about2.jpg' ); ?>')"></div>
        <div class="klyora-story__content">
            <p class="klyora-decorative"><?php esc_html_e( 'Ayurvedic Philosophy', 'perukar' ); ?></p>
            <h2><?php esc_html_e( 'Tradition-led formulas with modern luxury sensorials.', 'perukar' ); ?></h2>
            <p><?php esc_html_e( 'Every formula is rooted in classical Ayurvedic wisdom and designed for contemporary rituals. We source ingredients responsibly and craft in small batches for potency and purity.', 'perukar' ); ?></p>
            <a class="klyora-btn klyora-btn--solid" href="#"><?php esc_html_e( 'Our Ingredients', 'perukar' ); ?></a>
        </div>
    </section>

    <section class="klyora-section klyora-gift" id="klyora-gift">
        <div class="container">
            <h2><?php esc_html_e( 'Gift the Ritual of Self-Care', 'perukar' ); ?></h2>
            <p><?php esc_html_e( 'Build bundles, add gift messages, and schedule delivery for meaningful Ayurvedic gifting.', 'perukar' ); ?></p>
            <div class="klyora-gift-actions">
                <a class="klyora-btn klyora-btn--solid" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Send as Gift', 'perukar' ); ?></a>
                <a class="klyora-btn klyora-btn--ghost" href="<?php echo esc_url( $account_url ); ?>"><?php esc_html_e( 'Buy Gift Card', 'perukar' ); ?></a>
                <a class="klyora-btn klyora-btn--ghost" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Bundle & Save', 'perukar' ); ?></a>
            </div>
        </div>
    </section>

    <section class="klyora-section container klyora-rewards">
        <h2><?php esc_html_e( 'Join KLYORA Royalty', 'perukar' ); ?></h2>
        <p><?php esc_html_e( 'Earn points on every purchase and unlock tier benefits from Silver to Platinum.', 'perukar' ); ?></p>
        <div class="klyora-progress" aria-label="Royalty progress sample">
            <div class="klyora-progress__bar"><span style="width:65%"></span></div>
            <small><?php esc_html_e( 'You are 150 points away from Gold tier', 'perukar' ); ?></small>
        </div>
    </section>

    <section class="klyora-section container">
        <div class="klyora-section-head">
            <h2><?php esc_html_e( 'The Ayurvedic Journal', 'perukar' ); ?></h2>
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Read all', 'perukar' ); ?></a>
        </div>
        <div class="klyora-journal-grid">
            <?php
            $journal_posts = new WP_Query(
                array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                )
            );
            if ( $journal_posts->have_posts() ) :
                while ( $journal_posts->have_posts() ) :
                    $journal_posts->the_post();
                    ?>
                    <article <?php post_class( 'klyora-journal-card' ); ?>>
                        <a href="<?php the_permalink(); ?>" class="klyora-journal-card__thumb"><?php the_post_thumbnail( 'large' ); ?></a>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e( 'Publish blog posts to populate this section.', 'perukar' ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="klyora-section container" id="klyora-dosha-quiz">
        <div class="klyora-quiz-card">
            <h2><?php esc_html_e( 'Find Your Dosha Ritual', 'perukar' ); ?></h2>
            <p><?php esc_html_e( 'Launch an interactive quiz via Elementor popup or plugin shortcode to recommend products by Vata, Pitta, and Kapha balance.', 'perukar' ); ?></p>
            <a class="klyora-btn klyora-btn--solid" href="#"><?php esc_html_e( 'Start Quiz', 'perukar' ); ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
