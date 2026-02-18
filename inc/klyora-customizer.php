<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function perukar_klyora_customize_register( $wp_customize ) {
    $wp_customize->add_panel(
        'klyora_panel',
        array(
            'title'       => __( 'KLYORA Theme Settings', 'perukar' ),
            'priority'    => 25,
            'description' => __( 'Luxury Ayurvedic storefront controls.', 'perukar' ),
        )
    );

    $wp_customize->add_section(
        'klyora_global',
        array(
            'title'    => __( 'Global Styles', 'perukar' ),
            'priority' => 10,
            'panel'    => 'klyora_panel',
        )
    );

    $wp_customize->add_setting(
        'klyora_color_scheme',
        array(
            'default'           => 'gold-dark',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_color_scheme',
        array(
            'label'   => __( 'Color Scheme', 'perukar' ),
            'section' => 'klyora_global',
            'type'    => 'select',
            'choices' => array(
                'gold-dark'  => __( 'Royal Gold / Dark Luxury', 'perukar' ),
                'gold-cream' => __( 'Gold / Cream Editorial', 'perukar' ),
                'sage-earth' => __( 'Sage / Terracotta Natural', 'perukar' ),
            ),
        )
    );

    $wp_customize->add_setting(
        'klyora_typography_scale',
        array(
            'default'           => 1,
            'sanitize_callback' => 'perukar_klyora_sanitize_range',
        )
    );

    $wp_customize->add_control(
        'klyora_typography_scale',
        array(
            'label'       => __( 'Typography Scale', 'perukar' ),
            'section'     => 'klyora_global',
            'type'        => 'range',
            'input_attrs' => array(
                'min'  => 0.9,
                'max'  => 1.15,
                'step' => 0.01,
            ),
        )
    );

    $wp_customize->add_setting(
        'klyora_layout_density',
        array(
            'default'           => 'comfortable',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_layout_density',
        array(
            'label'   => __( 'Layout Density', 'perukar' ),
            'section' => 'klyora_global',
            'type'    => 'select',
            'choices' => array(
                'compact'     => __( 'Compact', 'perukar' ),
                'comfortable' => __( 'Comfortable', 'perukar' ),
                'spacious'    => __( 'Spacious', 'perukar' ),
            ),
        )
    );

    $wp_customize->add_setting(
        'klyora_animation_intensity',
        array(
            'default'           => 'medium',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_animation_intensity',
        array(
            'label'   => __( 'Animation Intensity', 'perukar' ),
            'section' => 'klyora_global',
            'type'    => 'select',
            'choices' => array(
                'none'   => __( 'Reduced', 'perukar' ),
                'medium' => __( 'Balanced', 'perukar' ),
                'high'   => __( 'Expressive', 'perukar' ),
            ),
        )
    );

    $wp_customize->add_section(
        'klyora_header',
        array(
            'title'    => __( 'Header & Announcement', 'perukar' ),
            'priority' => 20,
            'panel'    => 'klyora_panel',
        )
    );

    $wp_customize->add_setting(
        'klyora_header_layout',
        array(
            'default'           => 'transparent',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_header_layout',
        array(
            'label'   => __( 'Header Layout', 'perukar' ),
            'section' => 'klyora_header',
            'type'    => 'select',
            'choices' => array(
                'transparent' => __( 'Transparent Overlay', 'perukar' ),
                'classic'     => __( 'Classic Top Bar', 'perukar' ),
                'centered'    => __( 'Centered Logo', 'perukar' ),
                'minimal'     => __( 'Minimal', 'perukar' ),
            ),
        )
    );

    $wp_customize->add_setting(
        'klyora_announcement_enabled',
        array(
            'default'           => true,
            'sanitize_callback' => 'rest_sanitize_boolean',
        )
    );

    $wp_customize->add_control(
        'klyora_announcement_enabled',
        array(
            'label'   => __( 'Enable Announcement Bar', 'perukar' ),
            'section' => 'klyora_header',
            'type'    => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'klyora_announcement_text',
        array(
            'default'           => __( 'Get 15% off your first Ayurvedic ritual. Free shipping over Rs. 999.', 'perukar' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_announcement_text',
        array(
            'label'   => __( 'Announcement Text', 'perukar' ),
            'section' => 'klyora_header',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'klyora_countdown_text',
        array(
            'default'           => __( 'Flash Sale Ends Sunday 11:59 PM', 'perukar' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_countdown_text',
        array(
            'label'   => __( 'Flash Countdown Label', 'perukar' ),
            'section' => 'klyora_header',
            'type'    => 'text',
        )
    );

    $wp_customize->add_section(
        'klyora_home',
        array(
            'title'    => __( 'Homepage Content', 'perukar' ),
            'priority' => 30,
            'panel'    => 'klyora_panel',
        )
    );

    $wp_customize->add_setting(
        'klyora_hero_title',
        array(
            'default'           => __( 'Ancient Ayurvedic Wisdom, Modern Luxury', 'perukar' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_hero_title',
        array(
            'label'   => __( 'Hero Title', 'perukar' ),
            'section' => 'klyora_home',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'klyora_hero_subtitle',
        array(
            'default'           => __( 'Discover our curated collection of organic hair oils, face serums, and beauty rituals.', 'perukar' ),
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );

    $wp_customize->add_control(
        'klyora_hero_subtitle',
        array(
            'label'   => __( 'Hero Subtitle', 'perukar' ),
            'section' => 'klyora_home',
            'type'    => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'klyora_hero_primary_cta',
        array(
            'default'           => __( 'Shop Collection', 'perukar' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_hero_primary_cta',
        array(
            'label'   => __( 'Hero Primary CTA Label', 'perukar' ),
            'section' => 'klyora_home',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'klyora_hero_secondary_cta',
        array(
            'default'           => __( 'Take Skin Quiz', 'perukar' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_hero_secondary_cta',
        array(
            'label'   => __( 'Hero Secondary CTA Label', 'perukar' ),
            'section' => 'klyora_home',
            'type'    => 'text',
        )
    );

    $wp_customize->add_section(
        'klyora_footer',
        array(
            'title'    => __( 'Footer', 'perukar' ),
            'priority' => 40,
            'panel'    => 'klyora_panel',
        )
    );

    $wp_customize->add_setting(
        'klyora_footer_layout',
        array(
            'default'           => 'luxury-dark',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_footer_layout',
        array(
            'label'   => __( 'Footer Style', 'perukar' ),
            'section' => 'klyora_footer',
            'type'    => 'select',
            'choices' => array(
                'luxury-dark' => __( 'Luxury Dark', 'perukar' ),
                'clean-light' => __( 'Clean Light', 'perukar' ),
                'image-bg'    => __( 'Image Background', 'perukar' ),
            ),
        )
    );

    $wp_customize->add_setting(
        'klyora_newsletter_title',
        array(
            'default'           => __( 'Get 15% off your first Ayurvedic ritual', 'perukar' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'klyora_newsletter_title',
        array(
            'label'   => __( 'Newsletter Title', 'perukar' ),
            'section' => 'klyora_footer',
            'type'    => 'text',
        )
    );
}
add_action( 'customize_register', 'perukar_klyora_customize_register' );

function perukar_klyora_sanitize_range( $value ) {
    return min( 1.2, max( 0.8, floatval( $value ) ) );
}
