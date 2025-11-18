<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Appliance Ecommerce Store
 * @subpackage appliance_ecommerce_store
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'appliance_ecommerce_store_before_our_product' ); ?>

	<?php get_template_part( 'template-parts/home/our-product' ); ?>
	<?php do_action( 'appliance_ecommerce_store_after_our_product' ); ?>

	<?php get_template_part( 'template-parts/home/product-offer' ); ?>
	<?php do_action( 'appliance_ecommerce_store_after_product-offer' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'appliance_ecommerce_store_after_home_content' ); ?>
</main>

<?php get_footer();