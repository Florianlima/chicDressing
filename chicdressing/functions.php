<?php

add_action('wp_enqueue_scripts', 'chicdressing_enqueue_styles');
function chicdressing_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_filter('big_image_size_threshold', '__return_false');

function remove_google_fonts_stylesheet() {  
    wp_dequeue_style( 'ashe-playfair-font' );
    wp_dequeue_style( 'ashe-opensans-font' );
    wp_dequeue_style( 'ashe-kalam-font' );
    wp_dequeue_style( 'ashe-rokkitt-font' );
}
add_action( 'wp_enqueue_scripts', 'remove_google_fonts_stylesheet', 999 );

remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
add_action('woocommerce_shop_loop_item_title', 'wps_change_products_title', 10 );
function wps_change_products_title() {
    echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h3>';
}

?>