<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function perukar_klyora_get_css_vars() {
    $scheme    = get_theme_mod( 'klyora_color_scheme', 'gold-dark' );
    $density   = get_theme_mod( 'klyora_layout_density', 'comfortable' );
    $scale     = perukar_klyora_sanitize_range( get_theme_mod( 'klyora_typography_scale', 1 ) );
    $anim      = get_theme_mod( 'klyora_animation_intensity', 'medium' );

    $palettes = array(
        'gold-dark'  => array(
            '--klyora-primary'   => '#D4AF37',
            '--klyora-secondary' => '#C5A028',
            '--klyora-bg'        => '#0A0A0A',
            '--klyora-bg-soft'   => '#1A1A1A',
            '--klyora-surface'   => '#F5F0E6',
            '--klyora-text'      => '#F5F0E6',
            '--klyora-text-dark' => '#111111',
        ),
        'gold-cream' => array(
            '--klyora-primary'   => '#C5A028',
            '--klyora-secondary' => '#D4AF37',
            '--klyora-bg'        => '#F5F0E6',
            '--klyora-bg-soft'   => '#E8DFD0',
            '--klyora-surface'   => '#FFFFFF',
            '--klyora-text'      => '#151515',
            '--klyora-text-dark' => '#151515',
        ),
        'sage-earth' => array(
            '--klyora-primary'   => '#8FA68E',
            '--klyora-secondary' => '#C67C5C',
            '--klyora-bg'        => '#101412',
            '--klyora-bg-soft'   => '#1D2722',
            '--klyora-surface'   => '#F5F0E6',
            '--klyora-text'      => '#EDE7DA',
            '--klyora-text-dark' => '#121212',
        ),
    );

    $spacing = array(
        'compact'     => '56px',
        'comfortable' => '84px',
        'spacious'    => '112px',
    );

    $animation = array(
        'none'   => '0s',
        'medium' => '0.35s',
        'high'   => '0.55s',
    );

    $palette = isset( $palettes[ $scheme ] ) ? $palettes[ $scheme ] : $palettes['gold-dark'];

    $vars = $palette;
    $vars['--klyora-scale']           = (string) $scale;
    $vars['--klyora-section-space']   = isset( $spacing[ $density ] ) ? $spacing[ $density ] : $spacing['comfortable'];
    $vars['--klyora-anim-duration']   = isset( $animation[ $anim ] ) ? $animation[ $anim ] : $animation['medium'];
    $vars['--klyora-body-font']       = "'Poppins', 'Outfit', sans-serif";
    $vars['--klyora-heading-font']    = "'Playfair Display', serif";
    $vars['--klyora-decorative-font'] = "'Allura', cursive";

    $css = ':root {';

    foreach ( $vars as $key => $value ) {
        $css .= sprintf( '%s:%s;', esc_html( $key ), esc_html( $value ) );
    }

    $css .= '}';

    return $css;
}

function perukar_klyora_body_classes( $classes ) {
    $classes[] = 'klyora-theme';
    $classes[] = 'klyora-header-' . sanitize_html_class( get_theme_mod( 'klyora_header_layout', 'transparent' ) );
    $classes[] = 'klyora-footer-' . sanitize_html_class( get_theme_mod( 'klyora_footer_layout', 'luxury-dark' ) );

    return $classes;
}
add_filter( 'body_class', 'perukar_klyora_body_classes' );

function perukar_klyora_preconnect_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action( 'wp_head', 'perukar_klyora_preconnect_fonts', 1 );

function perukar_klyora_announcement_enabled() {
    return (bool) get_theme_mod( 'klyora_announcement_enabled', true );
}
