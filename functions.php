<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}





function displayProductName($item) {
    $productName = get_the_title($item['id']);
    return $productName;
}

add_shortcode('product_name', 'displayProductName');




//Brand description shortcode
function custom_pwb_brand_title() {
  
  global $product;
   $product_id = $product->get_id();
   $brands = wp_get_post_terms( $product_id, 'pwb-brand' );
   foreach( $brands as $brand ) echo '<a href="'.get_term_link($brand->term_id).'">'.$brand->name.'</a>';
}
add_shortcode( 'custom_pwb_brandtitle', 'custom_pwb_brand_title' );






function custom_product_description($atts){
    global $product;

    try {
        if( is_a($product, 'WC_Product') ) {
            return wc_format_content( $product->get_description("shortcode") );
        }

        return "Product description shortcode run outside of product context";
    } catch (Exception $e) {
        return "Product description shortcode encountered an exception";
    }
}
add_shortcode( 'custom_product_description', 'custom_product_description' );





function my_shortcode_product_price() {
    $html = '';

    global $product;

    $price = wc_get_price_to_display( $product, array( 'price' => $product->get_price() ) );

    $args = array(
            'ex_tax_label'       => false,
            'currency'           => 'USD',
            'decimal_separator'  => '.',
            'thousand_separator' => ' ',
            'decimals'           => 2,
            'price_format'       => '%2$s&nbsp;%1$s',
        );

    $html = "<span>" . wc_price( $price, $args ) . "</span>";

    return $html;
 }
 add_shortcode( 'product_price', 'my_shortcode_product_price' );












function custom_pwb_brand_info() {
    if( is_product_taxonomy() ){
    $brands = wp_get_post_terms( get_the_ID(), 'pwb-brand' );
    
    foreach( $brands as $brand ) {
      $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
      $brand_banner_id = get_term_meta($brand->term_id, 'pwb_brand_banner', true);
      $attachment_src = wp_get_attachment_image_src( $attachment_id,'full' );
      $banner_src = wp_get_attachment_image_src( $brand_banner_id,'full' );
      echo '<div class="brand-description">';
      echo '<img src="'.$attachment_src[0].'" alt="">';
      echo '<p>'.$brand->description.'</p>';
      echo '</div>';
      echo '<div class="pic-bg" style="background-image: url('.$banner_src[0].');"></div>';
      
     
    }
  }
}
add_shortcode( 'custom_pwb_brand', 'custom_pwb_brand_info' );












add_action( 'woocommerce_before_shop_loop_item_title', 'aq_display_brand_before_title' );
 function aq_display_brand_before_title(){
   global $product;
   $product_id = $product->get_id();
   $brands = wp_get_post_terms( $product_id, 'pwb-brand' );
   foreach( $brands as $brand ) echo '<p>'.$brand->name.'</p>';
 }


/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );




