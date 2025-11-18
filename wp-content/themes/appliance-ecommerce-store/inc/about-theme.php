<?php
/**
 * Appliance Ecommerce Store Theme Page
 *
 * @package Appliance Ecommerce Store
 */

function appliance_ecommerce_store_admin_scripts() {
	wp_dequeue_script('appliance-ecommerce-store-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'appliance_ecommerce_store_admin_scripts' );

if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_FREE_THEME_URL' ) ) {
	define( 'APPLIANCE_ECOMMERCE_STORE_FREE_THEME_URL', 'https://www.themespride.com/products/appliance-ecommerce-store' );
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL' ) ) {
	define( 'APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL', 'https://www.themespride.com/products/appliance-wordpress-theme' );
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_DEMO_THEME_URL' ) ) {
	define( 'APPLIANCE_ECOMMERCE_STORE_DEMO_THEME_URL', 'https://page.themespride.com/appliance-ecommerce-store/' );
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_DOCS_THEME_URL' ) ) {
    define( 'APPLIANCE_ECOMMERCE_STORE_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/free-appliance-ecommerce-store' );
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_RATE_THEME_URL' ) ) {
    define( 'APPLIANCE_ECOMMERCE_STORE_RATE_THEME_URL', 'https://wordpress.org/support/theme/appliance-ecommerce-store/reviews/#new-post' );
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_CHANGELOG_THEME_URL' ) ) {
    define( 'APPLIANCE_ECOMMERCE_STORE_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_SUPPORT_THEME_URL' ) ) {
    define( 'APPLIANCE_ECOMMERCE_STORE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/appliance-ecommerce-store/' );
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_THEME_BUNDLE' ) ) {
    define( 'APPLIANCE_ECOMMERCE_STORE_THEME_BUNDLE', 'https://www.themespride.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function appliance_ecommerce_store_menu() {
	add_theme_page( esc_html__( 'About Theme', 'appliance-ecommerce-store' ), esc_html__( 'Begin Installation - Import Demo', 'appliance-ecommerce-store' ), 'edit_theme_options', 'appliance-ecommerce-store-about', 'appliance_ecommerce_store_about_display' );
}
add_action( 'admin_menu', 'appliance_ecommerce_store_menu' );

/**
 * Display About page
 */
function appliance_ecommerce_store_about_display() {
	$appliance_ecommerce_store_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">

		<!-- top-detail -->
		<!-- top-detail -->
		<div class="detail-theme" id="detail-theme-box">
		    <button class="close-btn" id="close-detail-theme"><?php esc_html_e( 'Dismiss', 'appliance-ecommerce-store' ); ?></button>
		    <h2><?php echo esc_html__( 'Hey, Thank you for Installing Appliance Ecommerce Store Theme!', 'appliance-ecommerce-store' ); ?></h2>

		    <a href="<?php echo esc_url( admin_url( 'themes.php?page=appliance-ecommerce-store-about' ) ); ?>">
		        <?php esc_html_e( 'Get Started', 'appliance-ecommerce-store' ); ?>
		    </a>
		    <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="site-editor" target="_blank">
		        <?php esc_html_e( 'Site Editor', 'appliance-ecommerce-store' ); ?>
		    </a>

		    <a href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ); ?>" class="pro-btn-theme" target="_blank">
		        <?php esc_html_e( 'Upgrade to Pro', 'appliance-ecommerce-store' ); ?>
		    </a>

		    <a href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_THEME_BUNDLE ); ?>" class="rate-theme" target="_blank">
		        <?php esc_html_e( 'Get Bundle', 'appliance-ecommerce-store' ); ?>
		    </a>
		</div>
		<h1><?php echo esc_html( $appliance_ecommerce_store_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text content">
					<?php
					// Remove last sentence of description.
					$appliance_ecommerce_store_description = explode( '. ', $appliance_ecommerce_store_theme->get( 'Description' ) );

					array_pop( $appliance_ecommerce_store_description );

					$appliance_ecommerce_store_description = implode( '. ', $appliance_ecommerce_store_description );

					echo esc_html( $appliance_ecommerce_store_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank"href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_FREE_THEME_URL ); ?>" class="theme-info-btn" target="_blank" target="_blank"><?php esc_html_e( 'Theme Info', 'appliance-ecommerce-store' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_DEMO_THEME_URL ); ?>" class="view-demo" target="_blank"><?php esc_html_e( 'View Demo', 'appliance-ecommerce-store' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_DOCS_THEME_URL ); ?>" class="instruction-theme" target="_blank"><?php esc_html_e( 'Theme Documentation', 'appliance-ecommerce-store' ); ?></a>
					<a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ); ?>" class="pro-btn-theme" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'appliance-ecommerce-store' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $appliance_ecommerce_store_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'appliance-ecommerce-store' ); ?>">

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'appliance-ecommerce-store-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'appliance-ecommerce-store-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'One Click Demo Import', 'appliance-ecommerce-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'appliance-ecommerce-store-about', 'tab' => 'about_theme' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'about_theme' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'appliance-ecommerce-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'appliance-ecommerce-store-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'appliance-ecommerce-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'appliance-ecommerce-store-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'appliance-ecommerce-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'appliance-ecommerce-store-about', 'tab' => 'get_bundle' ), 'themes.php' ) ) ); ?>" class="blink wp-bundle nav-tab<?php echo ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Get WordPress Theme Bundle (120+ Themes)', 'appliance-ecommerce-store' ); ?></a>

		</nav>

		<?php
			appliance_ecommerce_store_demo_import();

			appliance_ecommerce_store_main_screen();

			appliance_ecommerce_store_changelog_screen();

			appliance_ecommerce_store_free_vs_pro();

			appliance_ecommerce_store_get_bundle();

		?>
	</div>

	<?php
}


/**
 * Output the Demo Import screen.
 */

function appliance_ecommerce_store_demo_import() {
    if ( isset( $_GET['page'] ) && 'appliance-ecommerce-store-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {

         // Path to whizzie.php in child theme
	    $child_whizzie_path = get_stylesheet_directory() . '/inc/whizzie.php';
	    
	    // Path to whizzie.php in parent theme
	    $parent_whizzie_path = get_template_directory() . '/inc/whizzie.php';

	    // Check if the child theme is active and if whizzie.php exists in the child theme
	    if ( file_exists( $child_whizzie_path ) ) {
	        require_once $child_whizzie_path;
	    } else {
	        // Fallback to parent theme if child theme does not have whizzie.php
	        require_once $parent_whizzie_path;
	    }

        if ( isset( $_GET['import-demo'] ) && $_GET['import-demo'] == true ) { ?>
            <div class="col card success-demo" style="text-align: center;">
                <p class="imp-success"><?php echo esc_html__('Imported Successfully', 'appliance-ecommerce-store'); ?></p><br>
                <a class="button" href="<?php echo esc_url(home_url('/')); ?>" target="_blank">
                    <?php echo esc_html__('View Site', 'appliance-ecommerce-store'); ?>
                </a>
            </div>

            <!-- Modal Popup -->
            <div id="demo-success-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999;">
                <div style="background: #fff; padding:3em; max-width: 500px; margin: 15% auto; text-align: center;">
                	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo-icon.png" alt="icon" />
                    <h2 style="margin-bottom: 3em; margin-top: 15px">
					    <?php echo esc_html__('Logistic Provider Is Successfully Installed.', 'appliance-ecommerce-store'); ?>
					</h2>
                    <button onclick="document.getElementById('demo-success-modal').style.display='none'">
                       <a class="view-demo-btn" href="<?php echo esc_url(home_url('/')); ?>" target="_blank">
                    		<?php echo esc_html__('View Site', 'appliance-ecommerce-store'); ?>
                	</a>
                    </button>
                    <!-- Get Started button -->
					<button onclick="document.getElementById('demo-success-modal').style.display='none'">
					    <a class="view-dashboard" href="<?php echo esc_url( admin_url( 'themes.php?page=appliance-ecommerce-store-about' ) ); ?>">
					        <?php echo esc_html__( 'Return To Dashboard', 'appliance-ecommerce-store' ); ?>
					    </a>
					</button>

                </div>
            </div>

            <script type="text/javascript">
                window.onload = function () {
                    // Show the popup modal after load
                    document.getElementById('demo-success-modal').style.display = 'block';
                };
            </script>
        <?php } else { ?>
        	<div class="content-row">
	            <div class="col card demo-btn text-center">
	                <form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php" method="POST">
	                    <p class="demo-title"><?php echo esc_html__('Demo Importer', 'appliance-ecommerce-store'); ?></p>
	                    <p class="demo-des"><?php echo esc_html__('This theme supports importing demo content with a single click. Use the button below to quickly set up your site. You can easily customize or deactivate the imported content later through the Customizer.', 'appliance-ecommerce-store'); ?></p>
	                    <i class="fas fa-long-arrow-alt-down"></i>

	                    <button type="submit" class="button with-icon" id="begin-install-btn">
	                        <?php echo esc_html__('Begin Installation - Import Demo', 'appliance-ecommerce-store'); ?>
	                    </button>

	                    <!-- Loader area shown in page content -->
	                    <div id="page-loader" style="display:none; margin-top: 20px; text-align: center;">
	                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/loader.png" alt="Loading..." width="40" height="40" />
	                        <p style="margin-top:10px;"><?php echo esc_html__('Importing demo, please wait...', 'appliance-ecommerce-store'); ?></p>
	                    </div>
	                </form>
	            </div>
	            <div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<h3><?php esc_html_e( 'Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'appliance-ecommerce-store' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'appliance-ecommerce-store' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'appliance-ecommerce-store' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'appliance-ecommerce-store' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'appliance-ecommerce-store' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></a>
				</div>
			</div>
	        </div>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $('#demo-importer-form').on('submit', function(e) {
                        e.preventDefault();

                        if (confirm("Are you sure you want to proceed with the demo import?")) {
                            $('#page-loader').show(); // Show loader
                            
                            // Redirect to same page with import-demo param
                            var url = new URL(window.location.href);
                            url.searchParams.append('import-demo', 'true');
                            window.location.href = url;
                        } else {
                            return false;
                        }
                    });
                });
            </script>
        <?php }
    }
}

/**
 * Output the main about screen.
 */
function appliance_ecommerce_store_main_screen() {
	if ( isset( $_GET['tab'] ) && 'about_theme' === $_GET['tab'] ) {
	?>
	<div class="content-row">
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'appliance-ecommerce-store' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'appliance-ecommerce-store' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'appliance-ecommerce-store' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'appliance-ecommerce-store' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'appliance-ecommerce-store' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'appliance-ecommerce-store' ); ?></a></p>
			</div>
		</div>
		<div class="theme-price col card">
			<div class="price-flex">
				<div class="price-content">
					<h3><?php esc_html_e( 'Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></h3>
					<p class="main-flash"><?php 
					  printf(
					    /* translators: 1: bold FLASH DEAL text, 2: discount code */
					    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'appliance-ecommerce-store' ),
					    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'appliance-ecommerce-store' ) . '</strong>',
					    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'appliance-ecommerce-store' ) . '</strong>'
					  ); 
					  ?></p>
					 <p>
					  <del><?php echo esc_html__( '$59', 'appliance-ecommerce-store' ); ?></del>
					  <strong class="bold-price"><?php echo esc_html__( '$39', 'appliance-ecommerce-store' ); ?></strong>
					</p>
				</div>
				<div class="price-img">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
				</div>
			</div>
			<div class="main-pro-price">
				<a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></a>
			</div>
		</div>
	</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function appliance_ecommerce_store_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
	<div class="content-row">
		<div class="wrap about-wrap change-log">
			<?php
				$changelog_file = apply_filters( 'appliance_ecommerce_store_changelog_file', APPLIANCE_ECOMMERCE_STORE_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = appliance_ecommerce_store_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<div class="theme-price col card">
				<div class="price-flex">
					<div class="price-content">
						<h3><?php esc_html_e( 'Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></h3>
						<p class="main-flash"><?php 
						  printf(
						    /* translators: 1: bold FLASH DEAL text, 2: discount code */
						    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'appliance-ecommerce-store' ),
						    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'appliance-ecommerce-store' ) . '</strong>',
						    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'appliance-ecommerce-store' ) . '</strong>'
						  ); 
						  ?></p>
						 <p>
						  <del><?php echo esc_html__( '$59', 'appliance-ecommerce-store' ); ?></del>
						  <strong class="bold-price"><?php echo esc_html__( '$39', 'appliance-ecommerce-store' ); ?></strong>
						</p>
					</div>
					<div class="price-img">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
					</div>
				</div>
				<div class="main-pro-price">
					<a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></a>
				</div>
			</div>
	</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function appliance_ecommerce_store_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function appliance_ecommerce_store_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
	<div class="content-row">
		<div class="wrap about-wrap change-log">
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'appliance-ecommerce-store' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'appliance-ecommerce-store' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'appliance-ecommerce-store' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'appliance-ecommerce-store' ); ?></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'appliance-ecommerce-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'appliance-ecommerce-store' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="theme-price col card">
			<div class="price-flex">
				<div class="price-content">
					<h3><?php esc_html_e( 'Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></h3>
					<p class="main-flash"><?php 
					  printf(
					    /* translators: 1: bold FLASH DEAL text, 2: discount code */
					    esc_html__( '%1$s - Get 20%% Discount on All Themes, Use code %2$s', 'appliance-ecommerce-store' ),
					    '<strong class="bold-text">' . esc_html__( 'FLASH DEAL', 'appliance-ecommerce-store' ) . '</strong>',
					    '<strong class="bold-text">' . esc_html__( 'QBSALE20', 'appliance-ecommerce-store' ) . '</strong>'
					  ); 
					  ?></p>
					 <p>
					  <del><?php echo esc_html__( '$59', 'appliance-ecommerce-store' ); ?></del>
					  <strong class="bold-price"><?php echo esc_html__( '$39', 'appliance-ecommerce-store' ); ?></strong>
					</p>
				</div>
				<div class="price-img">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-img.png" alt="theme-img" />
				</div>
			</div>
			<div class="main-pro-price">
				<a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ); ?>" class="pro-btn-theme price-pro" target="_blank"><?php esc_html_e( 'Upgrade To Premium Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ); ?></a>
			</div>
		</div>
	</div>
	<?php
	}
}

function appliance_ecommerce_store_get_bundle() {
	if ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap theme-main-bundle">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/theme-bundle.png" alt="theme-bundle" width="300" height="300" />
			<p class="bundle-link"><a target="_blank" href="<?php echo esc_url( APPLIANCE_ECOMMERCE_STORE_THEME_BUNDLE ); ?>" class="button button-primary bundle-btn"><?php esc_html_e( 'Buy WordPress Theme Bundle (120+ Themes)', 'appliance-ecommerce-store' ); ?></a></p>
		</div>
	<?php
	}
}