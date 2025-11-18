<?php
/**
 * Template part for displaying Our Products section
 *
 * @package Appliance Ecommerce Store
 * @subpackage appliance_ecommerce_store
 */
$appliance_ecommerce_store_static_image2 = get_template_directory_uri() . '/assets/images/product-img3.png';
?>
<?php if (get_theme_mod('appliance_ecommerce_store_slider_arrows', 1) != '') : ?>
  <div id="slider" class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 main-product-slider">
          <div id="owl-carousel" class="slides left-side owl-carousel">
            <?php for ($appliance_ecommerce_store_i = 1; $appliance_ecommerce_store_i <= 3; $appliance_ecommerce_store_i++) : 
                $appliance_ecommerce_store_image     = get_theme_mod('appliance_ecommerce_store_slider_image' . $appliance_ecommerce_store_i);
                $appliance_ecommerce_store_short_head= get_theme_mod('appliance_ecommerce_store_slider_short_heading' . $appliance_ecommerce_store_i);
                $appliance_ecommerce_store_heading   = get_theme_mod('appliance_ecommerce_store_slider_heading' . $appliance_ecommerce_store_i);
                $appliance_ecommerce_store_content   = get_theme_mod('appliance_ecommerce_store_slider_content' . $appliance_ecommerce_store_i);
                $appliance_ecommerce_store_btn_text  = get_theme_mod('appliance_ecommerce_store_slider_button_text' . $appliance_ecommerce_store_i);
                $appliance_ecommerce_store_btn_link  = get_theme_mod('appliance_ecommerce_store_slider_button_link' . $appliance_ecommerce_store_i);

                if ($appliance_ecommerce_store_image) : ?>
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 align-self-center">
                                <div class="carousel-caption">
                                    <div class="inner_carousel">
                                      <?php if ($appliance_ecommerce_store_short_head) : ?>
                                        <p class="slidetop-text mb-2"><?php echo esc_html($appliance_ecommerce_store_short_head); ?></p>
                                      <?php endif; ?>
                                      <?php if ($appliance_ecommerce_store_heading) : ?>
                                        <h1 class="mt-2">
                                          <?php echo esc_html($appliance_ecommerce_store_heading); ?>
                                        </h1>
                                      <?php endif; ?>
                                      <?php if ($appliance_ecommerce_store_content) : ?>
                                          <p class="mt-2 slider-content"><?php echo esc_html($appliance_ecommerce_store_content); ?></p>
                                      <?php endif; ?>
                                      <?php if ($appliance_ecommerce_store_btn_text && $appliance_ecommerce_store_btn_link) : ?>
                                          <div class="more-btn mt-lg-5 mt-3">
                                              <a href="<?php echo esc_url($appliance_ecommerce_store_btn_link); ?>" class="text-capitalize"><?php echo esc_html($appliance_ecommerce_store_btn_text); ?></a>
                                          </div>
                                      <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 align-self-center">
                              <div class="slider-border">
                                <img src="<?php echo esc_url($appliance_ecommerce_store_image); ?>" alt="<?php echo esc_attr($appliance_ecommerce_store_heading ?: 'Slider Image'); ?>" />
                              </div>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endfor; ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="sale-product-box">
            <div class="ps-3">
              <?php if ( get_theme_mod( 'appliance_ecommerce_store_product_title' ) ) : ?>
                <h2 class="top-product-title" id="top-product-title"><?php echo esc_html( get_theme_mod( 'appliance_ecommerce_store_product_title' ) ); ?></h2>
              <?php endif; ?>
              <?php if ( get_theme_mod( 'appliance_ecommerce_store_product_content' ) ) : ?>
                <p class="top-slider-content m-0"><?php echo esc_html( get_theme_mod( 'appliance_ecommerce_store_product_content' ) ); ?></p>
              <?php endif; ?>
            </div>
            <?php $appliance_ecommerce_store_product_of_day_id = absint( get_theme_mod( 'appliance_ecommerce_store_product_of_day', '' ) );
            if ( $appliance_ecommerce_store_product_of_day_id ) :
              $product = wc_get_product( $appliance_ecommerce_store_product_of_day_id );
              if ( $product ) : ?>
                <div class="product-of-day" role="listitem" aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
                  <div class="product-box">
                    <div class="product-image">
                      <?php
                      $appliance_ecommerce_store_image_id = $product->get_image_id();
                      if ( $appliance_ecommerce_store_image_id ) {
                          $appliance_ecommerce_store_image_url = wp_get_attachment_url( $appliance_ecommerce_store_image_id );
                          $alt = $product->get_name();
                      } else {
                          $appliance_ecommerce_store_image_url = $appliance_ecommerce_store_static_image2;
                          $alt = esc_attr__('Default Image', 'appliance-ecommerce-store');
                      }
                      ?>
                      <img src="<?php echo esc_url($appliance_ecommerce_store_image_url); ?>" alt="<?php echo esc_attr($alt); ?>" />
                      <div class="bottom-icons" role="group" aria-label="Product actions">
                        <div class="cart-button">
                          <?php if ( $product->is_purchasable() || $product->is_in_stock() ) : ?>
                            <form class="cart" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype='multipart/form-data'>
                              <button type="submit" class="add-to-cart-btn">
                                <i class="fa fa-shopping-cart"></i> <!-- Icon here -->
                              </button>
                            </form>
                          <?php endif; ?>
                        </div>
                        <div class="wishlistbox"><a href="<?php echo esc_url( wc_get_page_permalink( 'wishlist' ) ); ?>" class="wishlist-button" aria-label="<?php esc_attr_e( 'Add to wishlist', 'appliance-ecommerce-store' ); ?>"><i class="fas fa-heart" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Add to wishlist', 'appliance-ecommerce-store' ); ?></span></a></div>
                        <div class="share-icon" tabindex="0" aria-label="<?php esc_attr_e( 'Share product', 'appliance-ecommerce-store' ); ?>"><i class="fas fa-share-alt share-box" aria-hidden="true"></i>
                          <div class="share-options" aria-label="<?php esc_attr_e( 'Share options', 'appliance-ecommerce-store' ); ?>">
                            <a href="<?php echo esc_url( get_theme_mod( 'appliance_ecommerce_store_product_social_link1', 'https://facebook.com' ) ); ?>" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="<?php echo esc_url( get_theme_mod( 'appliance_ecommerce_store_product_social_link2', 'https://twitter.com' ) ); ?>" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="<?php echo esc_url( get_theme_mod( 'appliance_ecommerce_store_product_social_link3', 'https://instagram.com' ) ); ?>" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="product-content">
                      <h3><a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h3>
                      <p class="price"><?php echo wp_kses_post( $product->get_price_html() ); ?></p>
                      <?php if ( $product->get_rating_count() > 0 && $product->get_average_rating() > 0 ) : ?>
                        <div class="rating-container" aria-label="<?php echo esc_attr( sprintf( __( 'Rated %s out of 5 based on %s reviews', 'appliance-ecommerce-store' ), $product->get_average_rating(), $product->get_rating_count() ) ); ?>">
                          <div class="star-rating-right" title="<?php echo esc_attr( sprintf( __( 'Rated %s out of 5', 'appliance-ecommerce-store' ), $product->get_average_rating() ) ); ?>">
                            <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                          </div>
                          <span class="rating-count">(<?php echo esc_html( $product->get_rating_count() ); ?>)</span>
                        </div>
                      <?php endif; ?>
                      <?php 
                        // Fetch values from theme settings
                        $appliance_ecommerce_store_available = absint( get_theme_mod('appliance_ecommerce_store_stock_available', '') );
                        $appliance_ecommerce_store_sold = absint( get_theme_mod('appliance_ecommerce_store_stock_sold', '') );
                        $appliance_ecommerce_store_total = $appliance_ecommerce_store_available + $appliance_ecommerce_store_sold;
                        $appliance_ecommerce_store_stock_percent = $appliance_ecommerce_store_total > 0 ? intval( ($appliance_ecommerce_store_sold / $appliance_ecommerce_store_total) * 100 ) : 0;
                        ?>
                        <?php
                      // Assuming $product is a WC_Product object in context

                      // Get stock quantity (available stock)
                      $appliance_ecommerce_store_stock_available = $product->get_stock_quantity();

                      if ( $appliance_ecommerce_store_stock_available !== null ) {
                          // If you have a custom way to get sold stock, replace below line with actual logic.
                          $appliance_ecommerce_store_stock_sold = 0;

                          $appliance_ecommerce_store_stock_total = $appliance_ecommerce_store_stock_sold + $appliance_ecommerce_store_stock_available;
                          $appliance_ecommerce_store_stock_percent = ( $appliance_ecommerce_store_stock_total > 0 ) ? intval( ( $appliance_ecommerce_store_stock_sold / $appliance_ecommerce_store_stock_total ) * 100 ) : 0;
                          ?>
                          <?php if ( $appliance_ecommerce_store_stock_total > 0 ) : ?>
                              <div class="stock-progress-bar-wrap">
                                  <div class="stock-label-row">
                                      <span class="stock-label"><?php esc_html_e( 'Stock', 'appliance-ecommerce-store' ); ?></span>
                                  </div>
                                  <div class="stock-progress-bar-bg">
                                      <div class="stock-progress-bar-fill" style="width: <?php echo esc_attr( $appliance_ecommerce_store_stock_percent ); ?>%;"></div>
                                  </div>
                                  <div class="stock-meta-row">
                                      <span class="stock-sold"><?php echo esc_html__( 'Sold: ', 'appliance-ecommerce-store' ) . esc_html( $appliance_ecommerce_store_stock_sold ); ?></span>
                                      <span class="stock-available"><?php echo esc_html__( 'Available: ', 'appliance-ecommerce-store' ) . esc_html( $appliance_ecommerce_store_stock_available ); ?></span>
                                  </div>
                              </div>
                          <?php endif; ?>
                          <?php
                      } else {
                          // Product does not have stock management or quantity set (e.g., virtual/unmanaged)
                          echo '<p>' . esc_html__( 'Stock information not available.', 'appliance-ecommerce-store' ) . '</p>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              <?php endif;
            endif; ?>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>