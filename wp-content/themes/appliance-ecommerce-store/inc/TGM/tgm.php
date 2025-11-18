<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function appliance_ecommerce_store_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'WooCommerce', 'appliance-ecommerce-store' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'YITH WooCommerce Wishlist', 'appliance-ecommerce-store' ),
			'slug'             => 'yith-woocommerce-wishlist',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Translate WordPress with GTranslate', 'appliance-ecommerce-store' ),
			'slug'             => 'gtranslate',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
		    'name'             => __( 'FOX - Currency Switcher', 'appliance-ecommerce-store' ),
		    'slug'             => 'woocommerce-currency-switcher',
		    'required'         => false,
		    'force_activation' => false,
		),
		array(
		    'name'             => __( 'Dokan', 'appliance-ecommerce-store' ),
		    'slug'             => 'dokan-lite', 
		    'required'         => false,
		    'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'appliance_ecommerce_store_register_recommended_plugins' );