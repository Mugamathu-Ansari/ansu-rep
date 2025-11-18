<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Appliance Ecommerce Store
 * @subpackage appliance_ecommerce_store
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function appliance_ecommerce_store_categorized_blog() {
	$appliance_ecommerce_store_category_count = get_transient( 'appliance_ecommerce_store_categories' );

	if ( false === $appliance_ecommerce_store_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$appliance_ecommerce_store_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$appliance_ecommerce_store_category_count = count( $appliance_ecommerce_store_categories );

		set_transient( 'appliance_ecommerce_store_categories', $appliance_ecommerce_store_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $appliance_ecommerce_store_category_count > 1;
}

if ( ! function_exists( 'appliance_ecommerce_store_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Appliance Ecommerce Store
 */
function appliance_ecommerce_store_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in appliance_ecommerce_store_categorized_blog.
 */
function appliance_ecommerce_store_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'appliance_ecommerce_store_categories' );
}
add_action( 'edit_category', 'appliance_ecommerce_store_category_transient_flusher' );
add_action( 'save_post',     'appliance_ecommerce_store_category_transient_flusher' );