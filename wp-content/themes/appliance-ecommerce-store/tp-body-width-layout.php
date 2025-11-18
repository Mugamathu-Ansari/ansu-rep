<?php

$appliance_ecommerce_store_tp_theme_css = '';

$appliance_ecommerce_store_theme_lay = get_theme_mod( 'appliance_ecommerce_store_tp_body_layout_settings','Full');
if($appliance_ecommerce_store_theme_lay == 'Container'){
$appliance_ecommerce_store_tp_theme_css .='body{';
$appliance_ecommerce_store_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$appliance_ecommerce_store_tp_theme_css .='}';
$appliance_ecommerce_store_tp_theme_css .='@media screen and (max-width:575px){';
$appliance_ecommerce_store_tp_theme_css .='body{';
	$appliance_ecommerce_store_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
$appliance_ecommerce_store_tp_theme_css .='} }';
$appliance_ecommerce_store_tp_theme_css .='.scrolled{';
$appliance_ecommerce_store_tp_theme_css .='width: auto; left:0; right:0;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_theme_lay == 'Container Fluid'){
$appliance_ecommerce_store_tp_theme_css .='body{';
$appliance_ecommerce_store_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$appliance_ecommerce_store_tp_theme_css .='}';
$appliance_ecommerce_store_tp_theme_css .='@media screen and (max-width:575px){';
$appliance_ecommerce_store_tp_theme_css .='body{';
	$appliance_ecommerce_store_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
$appliance_ecommerce_store_tp_theme_css .='} }';
$appliance_ecommerce_store_tp_theme_css .='.scrolled{';
$appliance_ecommerce_store_tp_theme_css .='width: auto; left:0; right:0;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_theme_lay == 'Full'){
$appliance_ecommerce_store_tp_theme_css .='body{';
$appliance_ecommerce_store_tp_theme_css .='max-width: 100%;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

$appliance_ecommerce_store_scroll_position = get_theme_mod( 'appliance_ecommerce_store_scroll_top_position','Right');
if($appliance_ecommerce_store_scroll_position == 'Right'){
$appliance_ecommerce_store_tp_theme_css .='#return-to-top{';
$appliance_ecommerce_store_tp_theme_css .='right: 20px;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_scroll_position == 'Left'){
$appliance_ecommerce_store_tp_theme_css .='#return-to-top{';
$appliance_ecommerce_store_tp_theme_css .='left: 20px;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_scroll_position == 'Center'){
$appliance_ecommerce_store_tp_theme_css .='#return-to-top{';
$appliance_ecommerce_store_tp_theme_css .='right: 50%;left: 50%;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

// related post
$appliance_ecommerce_store_related_post_mob = get_theme_mod('appliance_ecommerce_store_related_post_mob', true);
$appliance_ecommerce_store_related_post = get_theme_mod('appliance_ecommerce_store_remove_related_post', true);
$appliance_ecommerce_store_tp_theme_css .= '.related-post-block {';
if ($appliance_ecommerce_store_related_post == false) {
    $appliance_ecommerce_store_tp_theme_css .= 'display: none;';
}
$appliance_ecommerce_store_tp_theme_css .= '}';
$appliance_ecommerce_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($appliance_ecommerce_store_related_post == false || $appliance_ecommerce_store_related_post_mob == false) {
    $appliance_ecommerce_store_tp_theme_css .= '.related-post-block { display: none; }';
}
$appliance_ecommerce_store_tp_theme_css .= '}';

// slider btn
$appliance_ecommerce_store_slider_buttom_mob = get_theme_mod('appliance_ecommerce_store_slider_buttom_mob', true);
$appliance_ecommerce_store_slider_button = get_theme_mod('appliance_ecommerce_store_slider_button', true);
$appliance_ecommerce_store_tp_theme_css .= '#main-slider .more-btn {';
if ($appliance_ecommerce_store_slider_button == false) {
    $appliance_ecommerce_store_tp_theme_css .= 'display: none;';
}
$appliance_ecommerce_store_tp_theme_css .= '}';
$appliance_ecommerce_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($appliance_ecommerce_store_slider_button == false || $appliance_ecommerce_store_slider_buttom_mob == false) {
    $appliance_ecommerce_store_tp_theme_css .= '#main-slider .more-btn { display: none; }';
}
$appliance_ecommerce_store_tp_theme_css .= '}';

//return to header mobile               
$appliance_ecommerce_store_return_to_header_mob = get_theme_mod('appliance_ecommerce_store_return_to_header_mob', true);
$appliance_ecommerce_store_return_to_header = get_theme_mod('appliance_ecommerce_store_return_to_header', true);
$appliance_ecommerce_store_tp_theme_css .= '.return-to-header{';
if ($appliance_ecommerce_store_return_to_header == false) {
    $appliance_ecommerce_store_tp_theme_css .= 'display: none;';
}
$appliance_ecommerce_store_tp_theme_css .= '}';
$appliance_ecommerce_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($appliance_ecommerce_store_return_to_header == false || $appliance_ecommerce_store_return_to_header_mob == false) {
    $appliance_ecommerce_store_tp_theme_css .= '.return-to-header{ display: none; }';
}
$appliance_ecommerce_store_tp_theme_css .= '}';

//blog description              
$appliance_ecommerce_store_mobile_blog_description = get_theme_mod('appliance_ecommerce_store_mobile_blog_description', true);
$appliance_ecommerce_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($appliance_ecommerce_store_mobile_blog_description == false) {
    $appliance_ecommerce_store_tp_theme_css .= '.blog-description{ display: none; }';
}
$appliance_ecommerce_store_tp_theme_css .= '}';


$appliance_ecommerce_store_footer_widget_image = get_theme_mod('appliance_ecommerce_store_footer_widget_image');
if($appliance_ecommerce_store_footer_widget_image != false){
$appliance_ecommerce_store_tp_theme_css .='#footer{';
$appliance_ecommerce_store_tp_theme_css .='background: url('.esc_attr($appliance_ecommerce_store_footer_widget_image).');';
$appliance_ecommerce_store_tp_theme_css .='}';
}

//Social icon Font size
$appliance_ecommerce_store_social_icon_fontsize = get_theme_mod('appliance_ecommerce_store_social_icon_fontsize');
$appliance_ecommerce_store_tp_theme_css .='.social-media a i{';
$appliance_ecommerce_store_tp_theme_css .='font-size: '.esc_attr($appliance_ecommerce_store_social_icon_fontsize).'px;';
$appliance_ecommerce_store_tp_theme_css .='}';

// site title and tagline font size option
$appliance_ecommerce_store_site_title_font_size = get_theme_mod('appliance_ecommerce_store_site_title_font_size', ''); {
$appliance_ecommerce_store_tp_theme_css .='.logo h1 a, .logo p a{';
$appliance_ecommerce_store_tp_theme_css .='font-size: '.esc_attr($appliance_ecommerce_store_site_title_font_size).'px !important;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

$appliance_ecommerce_store_site_tagline_font_size = get_theme_mod('appliance_ecommerce_store_site_tagline_font_size', '');{
$appliance_ecommerce_store_tp_theme_css .='.logo p{';
$appliance_ecommerce_store_tp_theme_css .='font-size: '.esc_attr($appliance_ecommerce_store_site_tagline_font_size).'px;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

$appliance_ecommerce_store_related_product = get_theme_mod('appliance_ecommerce_store_related_product',true);
if($appliance_ecommerce_store_related_product == false){
$appliance_ecommerce_store_tp_theme_css .='.related.products{';
	$appliance_ecommerce_store_tp_theme_css .='display: none;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

//menu font size
$appliance_ecommerce_store_menu_font_size = get_theme_mod('appliance_ecommerce_store_menu_font_size', '');{
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after, .main-navigation li.menu-item-has-children:after{';
	$appliance_ecommerce_store_tp_theme_css .='font-size: '.esc_attr($appliance_ecommerce_store_menu_font_size).'px;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

// menu text transform
$appliance_ecommerce_store_menu_text_tranform = get_theme_mod( 'appliance_ecommerce_store_menu_text_tranform','');
if($appliance_ecommerce_store_menu_text_tranform == 'Uppercase'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a {';
	$appliance_ecommerce_store_tp_theme_css .='text-transform: uppercase;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_text_tranform == 'Lowercase'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a {';
	$appliance_ecommerce_store_tp_theme_css .='text-transform: lowercase;';
$appliance_ecommerce_store_tp_theme_css .='}';
}
else if($appliance_ecommerce_store_menu_text_tranform == 'Capitalize'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a {';
	$appliance_ecommerce_store_tp_theme_css .='text-transform: capitalize;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

//sale position
$appliance_ecommerce_store_scroll_position = get_theme_mod( 'appliance_ecommerce_store_sale_tag_position','right');
if($appliance_ecommerce_store_scroll_position == 'right'){
$appliance_ecommerce_store_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $appliance_ecommerce_store_tp_theme_css .='right: 25px !important;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_scroll_position == 'left'){
$appliance_ecommerce_store_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $appliance_ecommerce_store_tp_theme_css .='left: 25px !important; right: auto !important;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

//Font Weight
$appliance_ecommerce_store_menu_font_weight = get_theme_mod( 'appliance_ecommerce_store_menu_font_weight','');
if($appliance_ecommerce_store_menu_font_weight == '100'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 100;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '200'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 200;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '300'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 300;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '400'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 400;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '500'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 500;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '600'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 600;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '700'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 700;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '800'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 800;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_menu_font_weight == '900'){
$appliance_ecommerce_store_tp_theme_css .='.main-navigation a{';
    $appliance_ecommerce_store_tp_theme_css .='font-weight: 900;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
$appliance_ecommerce_store_post_image_round = get_theme_mod('appliance_ecommerce_store_post_image_round', 0);
if($appliance_ecommerce_store_post_image_round != false){
    $appliance_ecommerce_store_tp_theme_css .='.blog .box-image img{';
        $appliance_ecommerce_store_tp_theme_css .='border-radius: '.esc_attr($appliance_ecommerce_store_post_image_round).'px;';
    $appliance_ecommerce_store_tp_theme_css .='}';
}

$appliance_ecommerce_store_post_image_width = get_theme_mod('appliance_ecommerce_store_post_image_width', '');
if($appliance_ecommerce_store_post_image_width != false){
    $appliance_ecommerce_store_tp_theme_css .='.blog .box-image img{';
        $appliance_ecommerce_store_tp_theme_css .='Width: '.esc_attr($appliance_ecommerce_store_post_image_width).'px;';
    $appliance_ecommerce_store_tp_theme_css .='}';
}

$appliance_ecommerce_store_post_image_length = get_theme_mod('appliance_ecommerce_store_post_image_length', '');
if($appliance_ecommerce_store_post_image_length != false){
    $appliance_ecommerce_store_tp_theme_css .='.blog .box-image img{';
        $appliance_ecommerce_store_tp_theme_css .='height: '.esc_attr($appliance_ecommerce_store_post_image_length).'px;';
    $appliance_ecommerce_store_tp_theme_css .='}';
}

// footer widget title font size
$appliance_ecommerce_store_footer_widget_title_font_size = get_theme_mod('appliance_ecommerce_store_footer_widget_title_font_size', '');{
$appliance_ecommerce_store_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
    $appliance_ecommerce_store_tp_theme_css .='font-size: '.esc_attr($appliance_ecommerce_store_footer_widget_title_font_size).'px;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

// Copyright text font size
$appliance_ecommerce_store_footer_copyright_font_size = get_theme_mod('appliance_ecommerce_store_footer_copyright_font_size', '');{
$appliance_ecommerce_store_tp_theme_css .='#footer .site-info p{';
    $appliance_ecommerce_store_tp_theme_css .='font-size: '.esc_attr($appliance_ecommerce_store_footer_copyright_font_size).'px;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

// copyright padding
$appliance_ecommerce_store_footer_copyright_top_bottom_padding = get_theme_mod('appliance_ecommerce_store_footer_copyright_top_bottom_padding', '');
if ($appliance_ecommerce_store_footer_copyright_top_bottom_padding !== '') { 
    $appliance_ecommerce_store_tp_theme_css .= '.site-info {';
    $appliance_ecommerce_store_tp_theme_css .= 'padding-top: ' . esc_attr($appliance_ecommerce_store_footer_copyright_top_bottom_padding) . 'px;';
    $appliance_ecommerce_store_tp_theme_css .= 'padding-bottom: ' . esc_attr($appliance_ecommerce_store_footer_copyright_top_bottom_padding) . 'px;';
    $appliance_ecommerce_store_tp_theme_css .= '}';
}

// copyright position
$appliance_ecommerce_store_copyright_text_position = get_theme_mod( 'appliance_ecommerce_store_copyright_text_position','Center');
if($appliance_ecommerce_store_copyright_text_position == 'Center'){
$appliance_ecommerce_store_tp_theme_css .='#footer .site-info p{';
$appliance_ecommerce_store_tp_theme_css .='text-align:center;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_copyright_text_position == 'Left'){
$appliance_ecommerce_store_tp_theme_css .='#footer .site-info p{';
$appliance_ecommerce_store_tp_theme_css .='text-align:left;';
$appliance_ecommerce_store_tp_theme_css .='}';
}else if($appliance_ecommerce_store_copyright_text_position == 'Right'){
$appliance_ecommerce_store_tp_theme_css .='#footer .site-info p{';
$appliance_ecommerce_store_tp_theme_css .='text-align:right;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

// Header Image title font size
$appliance_ecommerce_store_header_image_title_font_size = get_theme_mod('appliance_ecommerce_store_header_image_title_font_size', '40');{
$appliance_ecommerce_store_tp_theme_css .='.box-text h2{';
    $appliance_ecommerce_store_tp_theme_css .='font-size: '.esc_attr($appliance_ecommerce_store_header_image_title_font_size).'px;';
$appliance_ecommerce_store_tp_theme_css .='}';
}

/*--------------------------- banner image Opacity -------------------*/
    $appliance_ecommerce_store_theme_lay = get_theme_mod( 'appliance_ecommerce_store_header_banner_opacity_color','0.5');
        if($appliance_ecommerce_store_theme_lay == '0'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.1'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.1';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.2'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.2';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.3'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.3';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.4'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.4';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.5'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.5';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.6'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.6';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.7'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.7';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.8'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.8';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '0.9'){
            $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:0.9';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }else if($appliance_ecommerce_store_theme_lay == '1'){
            $appliance_ecommerce_store_tp_theme_css .='#main-slider img{';
                $appliance_ecommerce_store_tp_theme_css .='opacity:1';
            $appliance_ecommerce_store_tp_theme_css .='}';
        }

    $appliance_ecommerce_store_header_banner_image_overlay = get_theme_mod('appliance_ecommerce_store_header_banner_image_overlay', true);
    if($appliance_ecommerce_store_header_banner_image_overlay == false){
        $appliance_ecommerce_store_tp_theme_css .='.single-page-img, .featured-image{';
            $appliance_ecommerce_store_tp_theme_css .='opacity:1;';
        $appliance_ecommerce_store_tp_theme_css .='}';
    }

    $appliance_ecommerce_store_header_banner_image_ooverlay_color = get_theme_mod('appliance_ecommerce_store_header_banner_image_ooverlay_color', true);
    if($appliance_ecommerce_store_header_banner_image_ooverlay_color != false){
        $appliance_ecommerce_store_tp_theme_css .='.box-image-page{';
            $appliance_ecommerce_store_tp_theme_css .='background-color: '.esc_attr($appliance_ecommerce_store_header_banner_image_ooverlay_color).';';
        $appliance_ecommerce_store_tp_theme_css .='}';
    }

    // header
    $appliance_ecommerce_store_slider_arrows = get_theme_mod('appliance_ecommerce_store_slider_arrows', true);
    if($appliance_ecommerce_store_slider_arrows == false){
    $appliance_ecommerce_store_tp_theme_css .='.page-template-front-page .headerbox{';
        $appliance_ecommerce_store_tp_theme_css .='position:static;';
    $appliance_ecommerce_store_tp_theme_css .='}';
    }

    // Slider Height
    $appliance_ecommerce_store_slider_img_height      = get_theme_mod('appliance_ecommerce_store_slider_img_height');
    $appliance_ecommerce_store_slider_img_height_resp = get_theme_mod('appliance_ecommerce_store_slider_img_height_responsive');

    // Desktop height
    $appliance_ecommerce_store_tp_theme_css .= '@media screen and (min-width: 768px) {';
    $appliance_ecommerce_store_tp_theme_css .= '#slider {';
    if ( $appliance_ecommerce_store_slider_img_height ) {
        $appliance_ecommerce_store_tp_theme_css .= 'height: ' . esc_attr( $appliance_ecommerce_store_slider_img_height ) . ';';
    }
    $appliance_ecommerce_store_tp_theme_css .= 'width: 100%; object-fit: cover;';
    $appliance_ecommerce_store_tp_theme_css .= '}';
    $appliance_ecommerce_store_tp_theme_css .= '}';

    // Mobile height
    $appliance_ecommerce_store_tp_theme_css .= '@media screen and (max-width: 767px) {';
    $appliance_ecommerce_store_tp_theme_css .= '#slider {';
    if ( $appliance_ecommerce_store_slider_img_height_resp ) {
        $appliance_ecommerce_store_tp_theme_css .= 'height: ' . esc_attr( $appliance_ecommerce_store_slider_img_height_resp ) . ' !important;';
    }
    $appliance_ecommerce_store_tp_theme_css .= 'width: 100%; object-fit: cover;';
    $appliance_ecommerce_store_tp_theme_css .= '}';
    $appliance_ecommerce_store_tp_theme_css .= '}';
