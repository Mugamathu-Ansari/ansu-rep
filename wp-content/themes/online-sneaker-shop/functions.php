<?php
/**
 * Online Sneaker Shop functions
 */

if ( ! function_exists( 'online_sneaker_shop_setup' ) ) :
function online_sneaker_shop_setup() {

    load_theme_textdomain( 'online-sneaker-shop', get_template_directory() . '/languages' );

	// Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'online_sneaker_shop_custom_background_args', array(
	    'default-color' => 'ffffff',
	    'default-image' => '',
    ) ) );

	/**
	 * About Theme Function
	 */
	require get_theme_file_path( '/about-theme/about-theme.php' );

	/**
	 * Customizer
	 */
	require get_template_directory() . '/inc/customizer.php';

	/**
	 * TGM
	 */
	require get_template_directory() . '/tgm.php';
}
endif; 
add_action( 'after_setup_theme', 'online_sneaker_shop_setup' );

if ( ! function_exists( 'online_sneaker_shop_styles' ) ) :
	function online_sneaker_shop_styles() {
		// Register theme stylesheet.
		wp_register_style('online-sneaker-shop-style',
			get_template_directory_uri() . '/style.css',array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'online-sneaker-shop-style' );

		wp_enqueue_script( 'online-sneaker-shop-custom-script', get_theme_file_uri( '/assets/js/custom-script.js' ), array( 'jquery' ), true );
	}
endif;
add_action( 'wp_enqueue_scripts', 'online_sneaker_shop_styles' );
function allow_custom_upload_mimes($mimes) {
    $mimes['mkv']  = 'video/x-matroska';
    $mimes['avi']  = 'video/x-msvideo';
    $mimes['mov']  = 'video/quicktime';
    $mimes['webm'] = 'video/webm';
    return $mimes;
}
add_filter('upload_mimes', 'allow_custom_upload_mimes');
add_filter('cr_upload_duplicate_check', '__return_false');

add_filter('wp_handle_upload', function($fileinfo) {
    static $uploaded_files = [];

    $hash = md5_file($fileinfo['file']);

    // If already processed in this request, return existing info
    if (isset($uploaded_files[$hash])) {
        return $uploaded_files[$hash];
    }

    // Check if an identical file already exists in uploads folder
    $upload_dir = wp_upload_dir();
    $existing_file = glob($upload_dir['path'] . '/*' . basename($fileinfo['file']));

    if (!empty($existing_file)) {
        return [
            'file' => $existing_file[0],
            'url'  => $upload_dir['url'] . '/' . basename($existing_file[0]),
            'type' => $fileinfo['type']
        ];
    }

    // Store this file info for reuse in this request
    $uploaded_files[$hash] = $fileinfo;
    return $fileinfo;
});
add_filter('cr_review_media_url', function($url) {
    // Get the file name without extension
    $path_info = pathinfo($url);
    
    // Replace extension with .mp4
    $new_url = $path_info['dirname'] . '/' . $path_info['filename'] . '.mp4';
    
    return $new_url;
});
add_filter('pre_comment_approved', function($approved, $commentdata) {
    return '1'; // Automatically approve all comments/reviews
}, 10, 2);


add_filter('cr_allowed_file_types', function($types) {
    $types[] = 'mkv';
    return $types;
});
add_filter('wp_get_attachment_url', function($url, $post_id) {
    // Get the MIME type of the attachment
    $mime_type = get_post_mime_type($post_id);

    // Check if it's a video type
    if (strpos($mime_type, 'video/') === 0) {
        $path_info = pathinfo($url);
        // Replace extension with .mp4
        return $path_info['dirname'] . '/' . $path_info['filename'] . '.mp4';
    }

    // For non-video files, return original URL
    return $url;
}, 10, 2);
