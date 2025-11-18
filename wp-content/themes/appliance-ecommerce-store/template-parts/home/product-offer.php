<?php
/**
 * Template part for displaying the offer product category section with "Offer Sale!" text
 */

$appliance_ecommerce_store_offer_image = get_template_directory_uri() . '/assets/images/offer-img1.png';
$appliance_ecommerce_store_offer_product_sec = get_theme_mod('appliance_ecommerce_store_offer_product_sec', true);

if ( $appliance_ecommerce_store_offer_product_sec == 1 ) : 
?>
<section id="offer-product" class="my-5">
  <div class="container"> 
    <div id="owl-carousel" class="offer-product owl-carousel product-blocks mb-4">
      <?php
      $appliance_ecommerce_store_number_of_categories = absint(get_theme_mod('appliance_ecommerce_store_offer_number_of_categories', 4));

      $appliance_ecommerce_store_args = array(
          'taxonomy'   => 'product_cat',
          'orderby'    => 'name',
          'order'      => 'ASC',
          'hide_empty' => false,
          'number'     => $appliance_ecommerce_store_number_of_categories,
          'parent'     => 0,
      );

      $appliance_ecommerce_store_product_categories = get_terms($appliance_ecommerce_store_args);

      if ( ! empty($appliance_ecommerce_store_product_categories) && ! is_wp_error($appliance_ecommerce_store_product_categories) ) :
          foreach ( $appliance_ecommerce_store_product_categories as $category ) :

            // Get category thumbnail ID and URL
            $appliance_ecommerce_store_thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $appliance_ecommerce_store_cat_image = $appliance_ecommerce_store_thumbnail_id ? wp_get_attachment_url($appliance_ecommerce_store_thumbnail_id) : $appliance_ecommerce_store_offer_image;

            // Check if category has any product on sale
            $appliance_ecommerce_store_products_on_sale = get_posts( array(
              'post_type'      => 'product',
              'post_status'    => 'publish',
              'numberposts'    => 1,
              'tax_query'      => array(
                  array(
                      'taxonomy' => 'product_cat',
                      'field'    => 'term_id',
                      'terms'    => $category->term_id,
                      'operator' => 'IN',
                  ),
              ),
              'meta_query'     => array(
                  array(
                      'key'     => '_sale_price',
                      'value'   => '',
                      'compare' => '!=',
                  ),
              ),
            ));
            $appliance_ecommerce_store_has_offer_sale = !empty($appliance_ecommerce_store_products_on_sale);
            ?>
            <div class="product-blocks-inner offer-sec">
              <div class="product-blocks-content">
                <?php if ( $appliance_ecommerce_store_has_offer_sale ) : ?>
                  <p class="offer-text">
                    <?php echo esc_html__('Offer Sale!', 'appliance-ecommerce-store'); ?>
                  </p>
                <?php endif; ?>
                <h3 class="offer-title">
                  <a href="<?php echo esc_url(get_term_link($category)); ?>">
                    <?php echo esc_html($category->name); ?>
                  </a>
                </h3>
                <?php if ( !empty($category->description) ) : ?>
                  <div class="category-description"><?php echo esc_html($category->description); ?></div>
                <?php endif; ?>
              </div>
              <div class="product-blocks-image position-relative offer-product-box">
                <img src="<?php echo esc_url($appliance_ecommerce_store_cat_image); ?>"
                     alt="<?php echo esc_attr($category->name); ?>" class="offer-card-img" />
              </div>
            </div>
            <?php
          endforeach;
      else :
          ?>
          <div class="no-postfound"><?php esc_html_e('No product categories found.', 'appliance-ecommerce-store'); ?></div>
      <?php
      endif;
      ?>
    </div>
  </div>
</section>
<?php 
endif;
?>
