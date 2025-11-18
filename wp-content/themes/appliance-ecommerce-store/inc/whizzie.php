<?php 
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {
 
    // Function to install and activate plugins
    function appliance_ecommerce_store_import_demo_content() {

        // Display the preloader only for plugin installation
        echo '<div id="plugin-loader" style="display: flex; align-items: center; justify-content: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999;">
                <img src="' . esc_url(get_template_directory_uri()) . '/assets/images/loader.png" alt="Loading..." width="60" height="60" />
              </div>';
              
        // Define the plugins you want to install and activate
        $plugins = array(
            array(
                'slug' => 'woocommerce',
                'file' => 'woocommerce/woocommerce.php',
                'url'  => 'https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip'
            ),
             array(
                'slug' => 'yith-woocommerce-wishlist',
                'file' => 'yith-woocommerce-wishlist/init.php',
                'url'  => 'https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.latest-stable.zip'
            ),
            array(
                'slug' => 'currency-switcher-woocommerce',
                'file' => 'currency-switcher-woocommerce/currency-switcher-woocommerce.php',
                'url'  => 'https://downloads.wordpress.org/plugin/currency-switcher-woocommerce.latest-stable.zip'
            ),
            array(
                'slug' => 'gtranslate',
                'file' => 'gtranslate/gtranslate.php',
                'url'  => 'https://downloads.wordpress.org/plugin/gtranslate.latest-stable.zip' // Correct GTranslate URL
            ),
            array(
                'slug' => 'advanced-appointment-booking-scheduling',
                'file' => 'advanced-appointment-booking-scheduling/advanced-appointment-booking.php',
                'url'  => 'https://downloads.wordpress.org/plugin/advanced-appointment-booking-scheduling.zip'
            ),
        );

        // Include required files for plugin installation
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

        // Loop through each plugin
        foreach ($plugins as $plugin) {
            $plugin_file = WP_PLUGIN_DIR . '/' . $plugin['file'];

            // Check if the plugin is installed
            if (!file_exists($plugin_file)) {
                // If the plugin is not installed, download and install it
                $upgrader = new Plugin_Upgrader();
                $result = $upgrader->install($plugin['url']);

                // Check for installation errors
                if (is_wp_error($result)) {
                    error_log('Plugin installation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error installing plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                    continue;
                }
            }

            // If the plugin exists but is not active, activate it
            if (file_exists($plugin_file) && !is_plugin_active($plugin['file'])) {
                $result = activate_plugin($plugin['file']);

                // Check for activation errors
                if (is_wp_error($result)) {
                    error_log('Plugin activation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error activating plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                }
            }
        }

        // Hide the preloader after the process is complete
        echo '<script type="text/javascript">
                document.getElementById("plugin-loader").style.display = "none";
              </script>';

        // Add filter to skip WooCommerce setup wizard after activation
        add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_true');
    }

    // Call the import function
    appliance_ecommerce_store_import_demo_content();


    // ------- Create Nav Menu --------
$appliance_ecommerce_store_menuname = 'Main Menus';
$appliance_ecommerce_store_bpmenulocation = 'primary-menu';
$appliance_ecommerce_store_menu_exists = wp_get_nav_menu_object($appliance_ecommerce_store_menuname);

if (!$appliance_ecommerce_store_menu_exists) {
    $appliance_ecommerce_store_menu_id = wp_create_nav_menu($appliance_ecommerce_store_menuname);

    // Create Home Page
    $appliance_ecommerce_store_home_title = 'Home';
    $appliance_ecommerce_store_home = array(
        'post_type' => 'page',
        'post_title' => $appliance_ecommerce_store_home_title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'home'
    );
    $appliance_ecommerce_store_home_id = wp_insert_post($appliance_ecommerce_store_home);

    // Assign Home Page Template
    add_post_meta($appliance_ecommerce_store_home_id, '_wp_page_template', 'page-template/front-page.php');

    // Update options to set Home Page as the front page
    update_option('page_on_front', $appliance_ecommerce_store_home_id);
    update_option('show_on_front', 'page');

    // Add Home Page to Menu
    wp_update_nav_menu_item($appliance_ecommerce_store_menu_id, 0, array(
        'menu-item-title' => __('Home', 'appliance-ecommerce-store'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $appliance_ecommerce_store_home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create About Us Page with Dummy Content
    $appliance_ecommerce_store_about_title = 'About Us';
    $appliance_ecommerce_store_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $appliance_ecommerce_store_about = array(
        'post_type' => 'page',
        'post_title' => $appliance_ecommerce_store_about_title,
        'post_content' => $appliance_ecommerce_store_about_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'about-us'
    );
    $appliance_ecommerce_store_about_id = wp_insert_post($appliance_ecommerce_store_about);

    // Add About Us Page to Menu
    wp_update_nav_menu_item($appliance_ecommerce_store_menu_id, 0, array(
        'menu-item-title' => __('About Us', 'appliance-ecommerce-store'),
        'menu-item-classes' => 'about-us',
        'menu-item-url' => home_url('/about-us/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $appliance_ecommerce_store_about_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Services Page with Dummy Content
    $appliance_ecommerce_store_services_title = 'Services';
    $appliance_ecommerce_store_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $appliance_ecommerce_store_services = array(
        'post_type' => 'page',
        'post_title' => $appliance_ecommerce_store_services_title,
        'post_content' => $appliance_ecommerce_store_services_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'services'
    );
    $appliance_ecommerce_store_services_id = wp_insert_post($appliance_ecommerce_store_services);

    // Add Services Page to Menu
    wp_update_nav_menu_item($appliance_ecommerce_store_menu_id, 0, array(
        'menu-item-title' => __('Services', 'appliance-ecommerce-store'),
        'menu-item-classes' => 'services',
        'menu-item-url' => home_url('/services/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $appliance_ecommerce_store_services_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Pages Page with Dummy Content
    $appliance_ecommerce_store_pages_title = 'Pages';
    $appliance_ecommerce_store_pages_content = '<h2>Our Pages</h2>
    <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>';
    $appliance_ecommerce_store_pages = array(
        'post_type' => 'page',
        'post_title' => $appliance_ecommerce_store_pages_title,
        'post_content' => $appliance_ecommerce_store_pages_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'pages'
    );
    $appliance_ecommerce_store_pages_id = wp_insert_post($appliance_ecommerce_store_pages);

    // Add Pages Page to Menu
    wp_update_nav_menu_item($appliance_ecommerce_store_menu_id, 0, array(
        'menu-item-title' => __('Pages', 'appliance-ecommerce-store'),
        'menu-item-classes' => 'pages',
        'menu-item-url' => home_url('/pages/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $appliance_ecommerce_store_pages_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Contact Page with Dummy Content
    $appliance_ecommerce_store_contact_title = 'Contact';
    $appliance_ecommerce_store_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $appliance_ecommerce_store_contact = array(
        'post_type' => 'page',
        'post_title' => $appliance_ecommerce_store_contact_title,
        'post_content' => $appliance_ecommerce_store_contact_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'contact'
    );
    $appliance_ecommerce_store_contact_id = wp_insert_post($appliance_ecommerce_store_contact);

    // Add Contact Page to Menu
    wp_update_nav_menu_item($appliance_ecommerce_store_menu_id, 0, array(
        'menu-item-title' => __('Contact', 'appliance-ecommerce-store'),
        'menu-item-classes' => 'contact',
        'menu-item-url' => home_url('/contact/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $appliance_ecommerce_store_contact_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Set the menu location if it's not already set
    if (!has_nav_menu($appliance_ecommerce_store_bpmenulocation)) {
        $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
        if (empty($locations)) {
            $locations = array();
        }
        $locations[$appliance_ecommerce_store_bpmenulocation] = $appliance_ecommerce_store_menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

        //---Header--//
        set_theme_mod('appliance_ecommerce_store_about_us_text', 'About Us');
        set_theme_mod('appliance_ecommerce_store_about_us_link', '#');
        set_theme_mod('appliance_ecommerce_store_free_delivery_text', 'Free Delivery');
        set_theme_mod('appliance_ecommerce_store_free_delivery_link', '#');
        set_theme_mod('appliance_ecommerce_store_return_policy_text', 'Return Policy');
        set_theme_mod('appliance_ecommerce_store_return_policy_link', '#');
        set_theme_mod('appliance_ecommerce_store_help_center_text', 'Help Center');
        set_theme_mod('appliance_ecommerce_store_help_center_link', '#');
        set_theme_mod('appliance_ecommerce_store_call_contact_no_text', 'Call Us');
        set_theme_mod('appliance_ecommerce_store_call_contact_no', '(00) 123 456 789');
        set_theme_mod('appliance_ecommerce_store_category_text', 'Browse Categories');
        set_theme_mod('appliance_ecommerce_store_product_category_number', '10');
        
        // Slider sec
        set_theme_mod('appliance_ecommerce_store_slider_arrows', true);

        set_theme_mod('appliance_ecommerce_store_slider_image1', get_template_directory_uri().'/assets/images/banner.png');
        set_theme_mod('appliance_ecommerce_store_slider_image2', get_template_directory_uri().'/assets/images/banne.png');
        set_theme_mod('appliance_ecommerce_store_slider_image3', get_template_directory_uri().'/assets/images/banner.png');

        set_theme_mod('appliance_ecommerce_store_slider_short_heading1', 'From 240$');
        set_theme_mod('appliance_ecommerce_store_slider_short_heading2', 'From 240$');
        set_theme_mod('appliance_ecommerce_store_slider_short_heading3', 'From 240$');

        set_theme_mod('appliance_ecommerce_store_slider_heading1', 'Apple Watch Series SE Gen 2 Aluminum Case');
        set_theme_mod('appliance_ecommerce_store_slider_heading2', 'Apple Watch Series SE Gen 2 Aluminum Case');
        set_theme_mod('appliance_ecommerce_store_slider_heading3', 'Apple Watch Series SE Gen 2 Aluminum Case');

        set_theme_mod('appliance_ecommerce_store_slider_content1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut.');
        set_theme_mod('appliance_ecommerce_store_slider_content2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut.');
        set_theme_mod('appliance_ecommerce_store_slider_content3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut.');

        set_theme_mod('appliance_ecommerce_store_slider_button_text1', 'Buy Now');
        set_theme_mod('appliance_ecommerce_store_slider_button_text2', 'Buy Now');
        set_theme_mod('appliance_ecommerce_store_slider_button_text3', 'Buy Now');

        set_theme_mod('appliance_ecommerce_store_slider_button_link1', '#');
        set_theme_mod('appliance_ecommerce_store_slider_button_link2', '#');
        set_theme_mod('appliance_ecommerce_store_slider_button_link3', '#');

// === Product of the Day Setup ===

        set_theme_mod('appliance_ecommerce_store_product_title', 'Top Selling Products');
        set_theme_mod('appliance_ecommerce_store_product_content', 'Lorem ipsum dolor sit amet, consectetur');
    // Custom Product of the Day Setup
    $product_title = 'Samsung Galaxy 64GB';

    // --- Safe Product Check (replacing get_page_by_title) ---
    $query = new WP_Query(array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'title'          => $product_title,
    ));

    $existing_product = !empty($query->posts) ? $query->posts[0] : null;

    if (!$existing_product) {

        // --- Create new Product ---
        $product_id = wp_insert_post(array(
            'post_title'   => wp_strip_all_tags($product_title),
            'post_status'  => 'publish',
            'post_type'    => 'product',
        ));

        if (!is_wp_error($product_id)) {

            // --- Prices ---
            update_post_meta($product_id, '_regular_price', '1150.99');
            update_post_meta($product_id, '_sale_price', '799.99');
            update_post_meta($product_id, '_price', '799.99');

            // --- Ratings ---
            update_post_meta($product_id, '_wc_average_rating', '4.8');
            update_post_meta($product_id, '_wc_rating_count', 26);
            update_post_meta($product_id, '_wc_review_count', 26);

            // --- Stock ---
            update_post_meta($product_id, '_manage_stock', 'yes');
            update_post_meta($product_id, '_stock', 56);
            update_post_meta($product_id, '_stock_status', 'instock');
            update_post_meta($product_id, '_sold_count', 2);

            // --- Type and Category ---
            wp_set_object_terms($product_id, 'simple', 'product_type');
            wp_set_object_terms($product_id, 'uncategorized', 'product_cat');

            // --- Featured Image ---
            $image_url = get_template_directory_uri() . '/assets/images/product-img3.png';
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');

            $image_id = media_sideload_image($image_url, $product_id, null, 'id');
            if (!is_wp_error($image_id)) {
                set_post_thumbnail($product_id, $image_id);
            }

            // --- Sync with WooCommerce ---
            $product = wc_get_product($product_id);
            if ($product) {
                $product->save();
            }

            // --- Save for later use ---
            set_theme_mod('appliance_ecommerce_store_product_of_day', $product_id);

            error_log('Created Product of the Day: ' . $product_title);
        }

    } else {
        // If it already exists
        set_theme_mod('appliance_ecommerce_store_product_of_day', $existing_product->ID);
        error_log('Product already exists: ' . $product_title);
    }

        // ----------------------- Second Section - Product Categories with Products -----------------------
        set_theme_mod('appliance_ecommerce_store_offer_product_sec', true);

        $appliance_ecommerce_store_categories = array(
            array(
                'name'    => 'Best Offer Week New Deals',
                'slug'    => 'best-offer-week-new-deals',
                'image'   => get_template_directory_uri() . '/assets/images/offer-img2.png',
                'regular' => '999.00',
                'sale'    => '749.00',
                'product' => array(
                    'title'         => 'Samsung Galaxy S24',
                    'regular_price' => '999.00',
                    'sale_price'    => '749.00',
                    'image'         => get_template_directory_uri() . '/assets/images/product-img1.png',
                ),
            ),
            array(
                'name'    => 'Best Offer Summer Deals Sale',
                'slug'    => 'best-offer-summer-deals-sale',
                'image'   => get_template_directory_uri() . '/assets/images/offer-img1.png',
                'regular' => '899.00',
                'sale'    => '599.00',
                'product' => array(
                    'title'         => 'Apple MacBook Air M3',
                    'regular_price' => '899.00',
                    'sale_price'    => '599.00',
                    'image'         => get_template_directory_uri() . '/assets/images/product-img2.png',
                ),
            ),
            array(
                'name'    => 'Best Offer Winter Deals Sale',
                'slug'    => 'best-offer-winter-deals-sale',
                'image'   => get_template_directory_uri() . '/assets/images/product-img3.png',
                'regular' => '1150.00',
                'sale'    => '850.00',
                'product' => array(
                    'title'         => 'HP Gaming Laptop 2025',
                    'regular_price' => '1150.00',
                    'sale_price'    => '850.00',
                    'image'         => get_template_directory_uri() . '/assets/images/product-img3.png',
                ),
            ),
        );

        foreach ($appliance_ecommerce_store_categories as $cat) {
            // Check if category exists
            $term = get_term_by('slug', $cat['slug'], 'product_cat');

            if (!$term) {
                $term = wp_insert_term(
                    $cat['name'],
                    'product_cat',
                    array('slug' => sanitize_title($cat['slug']))
                );
            }

            if (!is_wp_error($term)) {
                $term_id = is_array($term) ? $term['term_id'] : $term->term_id;

                // --- Category image ---
                $image_id = media_sideload_image($cat['image'], 0, null, 'id');
                if (!is_wp_error($image_id)) {
                    update_term_meta($term_id, 'thumbnail_id', $image_id);
                }

                // --- Category prices ---
                update_term_meta($term_id, 'category_regular_price', $cat['regular']);
                update_term_meta($term_id, 'category_sale_price', $cat['sale']);

                // --- Add one product in this category ---
                $product_data = $cat['product'];

                // Use WP_Query instead of deprecated get_page_by_title
                $existing_product = new WP_Query(array(
                    'post_type'      => 'product',
                    'title'          => $product_data['title'],
                    'posts_per_page' => 1,
                    'post_status'    => 'any',
                ));

                if (!$existing_product->have_posts()) {
                    $product_post = array(
                        'post_title'  => wp_strip_all_tags($product_data['title']),
                        'post_status' => 'publish',
                        'post_type'   => 'product',
                    );

                    $product_id = wp_insert_post($product_post);

                    if (!is_wp_error($product_id)) {
                        // Add product price
                        update_post_meta($product_id, '_regular_price', $product_data['regular_price']);
                        update_post_meta($product_id, '_sale_price', $product_data['sale_price']);
                        update_post_meta($product_id, '_price', $product_data['sale_price']);

                        // Assign category
                        wp_set_object_terms($product_id, (int)$term_id, 'product_cat');

                        // Stock data
                        update_post_meta($product_id, '_manage_stock', 'yes');
                        update_post_meta($product_id, '_stock', 15);
                        update_post_meta($product_id, '_stock_status', 'instock');

                        // Add image
                        $product_image_id = media_sideload_image($product_data['image'], $product_id, null, 'id');
                        if (!is_wp_error($product_image_id)) {
                            set_post_thumbnail($product_id, $product_image_id);
                        }

                        // Set product type
                        wp_set_object_terms($product_id, 'simple', 'product_type');

                        error_log('Created product: ' . $product_data['title']);
                    }
                } else {
                    error_log('Product already exists: ' . $product_data['title']);
                }
                wp_reset_postdata();
            } else {
                error_log('Category creation failed: ' . $term->get_error_message());
            }
        }

    }
?>