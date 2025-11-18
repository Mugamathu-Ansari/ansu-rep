<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Appliance Ecommerce Store
 * @subpackage appliance_ecommerce_store
 */

function appliance_ecommerce_store_custom_header_setup() {
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'description'   => __( 'Default Header Image', 'appliance-ecommerce-store' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'appliance_ecommerce_store_custom_header_setup' );

/**
 * Styles the header image based on Customizer settings.
 */
function appliance_ecommerce_store_header_style() {
    $appliance_ecommerce_store_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/sliderimage.png';

    $appliance_ecommerce_store_height     = get_theme_mod( 'appliance_ecommerce_store_header_image_height', 400 );
    $appliance_ecommerce_store_position   = get_theme_mod( 'appliance_ecommerce_store_header_background_position', 'center' );
    $appliance_ecommerce_store_attachment = get_theme_mod( 'appliance_ecommerce_store_header_background_attachment', 1 ) ? 'fixed' : 'scroll';

    $appliance_ecommerce_store_custom_css = "
        .header-img, .single-page-img, .external-div .box-image-page img, .external-div {
            background-image: url('" . esc_url( $appliance_ecommerce_store_header_image ) . "');
            background-size: cover;
            height: " . esc_attr( $appliance_ecommerce_store_height ) . "px;
            background-position: " . esc_attr( $appliance_ecommerce_store_position ) . ";
            background-attachment: " . esc_attr( $appliance_ecommerce_store_attachment ) . ";
        }

        @media (max-width: 1000px) {
            .header-img, .single-page-img, .external-div .box-image-page img,.external-div,.featured-image{
                height: 250px !important;
            }
            .box-text h2{
                font-size: 27px;
            }
        }
    ";

    wp_add_inline_style( 'appliance-ecommerce-store-style', $appliance_ecommerce_store_custom_css );
}
add_action( 'wp_enqueue_scripts', 'appliance_ecommerce_store_header_style' );

/**
 * Enqueue the main theme stylesheet.
 */
function appliance_ecommerce_store_enqueue_styles() {
    wp_enqueue_style( 'appliance-ecommerce-store-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'appliance_ecommerce_store_enqueue_styles' );