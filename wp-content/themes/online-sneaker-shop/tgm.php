<?php

require get_template_directory() . '/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function online_sneaker_shop_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'      => esc_html__( 'WooCommerce', 'online-sneaker-shop' ),
			'slug'      => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'online_sneaker_shop_register_recommended_plugins' );