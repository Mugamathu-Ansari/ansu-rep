<?php
/*
* Display Logo and header details
*/
?>
<div class="main-header">
  <div class="headerbox">
    <?php if (get_theme_mod('appliance_ecommerce_store_topbar_visibility', true)) : ?>
      <div class="top-header">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12 topbar-left align-self-center">
                <span class="abt-btn track-btn">
                <?php if ( class_exists( 'WeDevs_Dokan' ) ) : ?>
                    <?php if ( is_user_logged_in() ) : ?>
                        <a href="<?php echo esc_url( dokan_get_page_url( 'dashboard' ) ); ?>">
                            <?php esc_html_e( 'Go To Vendor Dashboard', 'appliance-ecommerce-store' ); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( dokan_get_page_url( 'registration' ) ); ?>">
                            <?php esc_html_e( 'Become A Seller', 'appliance-ecommerce-store' ); ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                </span>
               <?php if (!empty(get_theme_mod('appliance_ecommerce_store_about_us_link')) || !empty(get_theme_mod('appliance_ecommerce_store_about_us_text'))) : ?>
                <span class="track-btn">
                  <a class="text-center" href="<?php echo esc_url(get_theme_mod('appliance_ecommerce_store_about_us_link', '')); ?>">
                      <?php if (!empty(get_theme_mod('appliance_ecommerce_store_about_us_text'))) : ?>
                        <?php echo esc_html(get_theme_mod('appliance_ecommerce_store_about_us_text', '')); ?>
                      <?php endif; ?>
                  </a>
                </span>
               <?php endif; ?>
               <?php if (!empty(get_theme_mod('appliance_ecommerce_store_free_delivery_link')) || !empty(get_theme_mod('appliance_ecommerce_store_free_delivery_text'))) : ?>
                  <span class="track-btn">
                      <a class="text-center" href="<?php echo esc_url(get_theme_mod('appliance_ecommerce_store_free_delivery_link', '')); ?>">
                          <?php if (!empty(get_theme_mod('appliance_ecommerce_store_free_delivery_text'))) : ?>
                            <?php echo esc_html(get_theme_mod('appliance_ecommerce_store_free_delivery_text', '')); ?>
                          <?php endif; ?>
                      </a>
                  </span>
               <?php endif; ?>
               <?php if (!empty(get_theme_mod('appliance_ecommerce_store_return_policy_link')) || !empty(get_theme_mod('appliance_ecommerce_store_return_policy_text'))) : ?>
                  <span class="track-btn">
                      <a class="text-center" href="<?php echo esc_url(get_theme_mod('appliance_ecommerce_store_return_policy_link', '')); ?>">
                          <?php if (!empty(get_theme_mod('appliance_ecommerce_store_return_policy_text'))) : ?>
                            <?php echo esc_html(get_theme_mod('appliance_ecommerce_store_return_policy_text', '')); ?>
                          <?php endif; ?>
                      </a>
                  </span>
               <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-12 col-12 align-self-center">
              <div class="bottom-right-box">
                <?php if (!empty(get_theme_mod('appliance_ecommerce_store_help_center_link')) || !empty(get_theme_mod('appliance_ecommerce_store_help_center_text'))) : ?>
                    <span class="abt-btn pe-md-2">
                      <a class="text-center" href="<?php echo esc_url(get_theme_mod('appliance_ecommerce_store_help_center_link', '')); ?>">
                        <?php if (!empty(get_theme_mod('appliance_ecommerce_store_help_center_text'))) : ?>
                          <?php echo esc_html(get_theme_mod('appliance_ecommerce_store_help_center_text', '')); ?>
                        <?php endif; ?>
                      </a>
                    </span>
                <?php endif; ?>
                <div class="langauge-box">
                  <span class="translate-btn d-flex">
                    <?php if (get_theme_mod('appliance_ecommerce_store_cart_language_translator', true) && class_exists('GTranslate')) : ?>
                      <div class="translate-lang position-relative d-md-inline-block">
                        <?php echo wp_kses_post(do_shortcode('[gtranslate]')); ?>
                      </div>
                    <?php endif; ?>
                  </span>
                </div>
                <div class="langauge-box">
                    <span class="currency">
                        <?php if (get_theme_mod('appliance_ecommerce_store_currency_switcher', true) && class_exists('WooCommerce')) : ?>
                            <div class="currency-box d-md-inline-block">
                                <?php echo do_shortcode('[woocs]'); ?>
                            </div>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="mb-0">
                  <?php if (class_exists('woocommerce')) : ?>
                    <?php if (is_user_logged_in()) : ?>
                      <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" aria-label="<?php esc_attr_e('My Account', 'appliance-ecommerce-store'); ?>">
                        <i class="far fa-user-circle"></i>
                        <span class="login-text"><?php esc_html_e('My Account', 'appliance-ecommerce-store'); ?></span>
                      </a>
                    <?php else : ?>
                      <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" aria-label="<?php esc_attr_e('My Account', 'appliance-ecommerce-store'); ?>">
                        <i class="far fa-user-circle"></i>
                        <span class="login-text"><?php esc_html_e('My Account', 'appliance-ecommerce-store'); ?></span>
                      </a>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="menubox py-md-2 py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3 logo-col align-self-center">
            <div class="logo my-lg-2 my-3">
              <?php if( has_custom_logo() ) appliance_ecommerce_store_the_custom_logo(); ?>
              <?php if(get_theme_mod('appliance_ecommerce_store_site_title',true) == 1){ ?>
                <?php if (is_front_page() && is_home()) : ?>
                  <h1 class="text-capitalize">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </h1> 
                <?php else : ?>
                  <p class="text-capitalize site-title mb-1">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </p>
                <?php endif; ?>
              <?php }?>
              <?php $appliance_ecommerce_store_description = get_bloginfo( 'description', 'display' );
              if ( $appliance_ecommerce_store_description || is_customize_preview() ) : ?>
                <?php if(get_theme_mod('appliance_ecommerce_store_site_tagline',false)){ ?>
                  <p class="site-description mb-0"><?php echo esc_html($appliance_ecommerce_store_description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-5 col-md-4 align-self-center">
            <div class="search-sidebar">
              <div class="search-block ms-lg-2 ms-3">
                <?php if ( function_exists('get_product_search_form') ) {
                    get_product_search_form();
                } ?>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 align-self-center btn-col">
            <div class="header-admin">
              <p class="mb-0">
                <?php if (class_exists('woocommerce')) : ?>
                  <span class="product-cart">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Shopping Cart', 'appliance-ecommerce-store'); ?>" aria-label="<?php esc_attr_e('My Cart', 'appliance-ecommerce-store'); ?>">
                        <i class="fas fa-shopping-cart"></i>
                      <?php 
                      $appliance_ecommerce_store_cart_count = WC()->cart->get_cart_contents_count(); 
                      if ($appliance_ecommerce_store_cart_count > 0) : ?>
                          <span class="cart-count"><?php echo esc_html($appliance_ecommerce_store_cart_count); ?></span>
                      <?php endif; ?>
                    </a>
                  </span>
                <?php endif; ?>
              </p>
              <?php if (class_exists('woocommerce')) : ?>
                <?php if (get_theme_mod('appliance_ecommerce_store_like_option') != '') : ?>
                    <p class="mb-0">
                        <a href="<?php echo esc_url(get_theme_mod('appliance_ecommerce_store_like_option')); ?>" aria-label="<?php esc_attr_e('Wishlist', 'appliance-ecommerce-store'); ?>">
                            <i class="far fa-heart"></i>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if (class_exists('YITH_WCWL')) : ?>
                    <p class="mb-0">
                      <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" aria-label="<?php esc_attr_e('Wishlist', 'appliance-ecommerce-store'); ?>">
                          <i class="far fa-heart"></i>
                      </a>
                    </p>
                <?php endif; ?>
              <?php endif; ?>
              <p class="mb-0">
                <?php if (class_exists('WooCommerce')): ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                        <i class="<?php echo is_user_logged_in() ? 'fas' : 'far'; ?> fa-user" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
              </p>
             </div> 
            </div>
            <div class="col-lg-2 col-md-3 align-self-center btn-col">
              <div class="contact call">
                <?php if (get_theme_mod('appliance_ecommerce_store_call_contact_no_text') || get_theme_mod('appliance_ecommerce_store_call_contact_no')) : ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-3 p-0 top-icon align-self-center text-center text-md-left">
                      <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="col-lg-9 col-md-9 col-9 align-self-center text-lg-start contact-col call">
                      <p class="infotext text-capitalize"><?php echo esc_html(get_theme_mod('appliance_ecommerce_store_call_contact_no_text', '')); ?></p>
                      <p class="mb-0 contact-content">
                        <a href="tel:<?php echo esc_attr(get_theme_mod('appliance_ecommerce_store_call_contact_no', '')); ?>">
                          <?php echo esc_html(get_theme_mod('appliance_ecommerce_store_call_contact_no', '')); ?>
                        </a>
                      </p>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-header">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-6 align-self-center">
              <?php get_template_part('template-parts/navigation/site-nav'); ?>
            </div>
            <div class="col-lg-3 col-md-6 align-self-center btn-col position-relative">
              <?php if (class_exists('WooCommerce')) : ?>
                  <button class="category-btn text-md-start text-center" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-bars"></i>
                      <?php echo esc_html(get_theme_mod('appliance_ecommerce_store_category_text', __('Browse Categories', 'appliance-ecommerce-store'))); ?>
                      <i class="fa-solid fa-chevron-down down-icon"></i>
                  </button>
                  <div class="category-dropdown">
                      <?php
                      $appliance_ecommerce_store_args = array(
                          'number'     => absint(get_theme_mod('appliance_ecommerce_store_product_category_number')),
                          'orderby'    => 'title',
                          'order'      => 'ASC',
                          'hide_empty' => 0,
                          'parent'     => 0,
                      );
                      $appliance_ecommerce_store_product_categories = get_terms('product_cat', $appliance_ecommerce_store_args);
                      if (!empty($appliance_ecommerce_store_product_categories)) {
                          foreach ($appliance_ecommerce_store_product_categories as $product_category) { ?>
                              <li class="drp_dwn_menu">
                                  <a href="<?php echo esc_url(get_term_link($product_category)); ?>">
                                      <?php echo esc_html($product_category->name); ?>
                                  </a>
                              </li>
                          <?php }
                      } ?>
                  </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>