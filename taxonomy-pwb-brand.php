<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>





  <div class="container-fluid">
    <div class="row">

      <div class="col-12 text-center">
        <h6 class="newst-title">NEWEST UKRANIAN FASHION BRANDS</h6>
        <h1 class="hero-title">
        <?php woocommerce_page_title(); ?></h1>
        <?php echo do_shortcode('[custom_pwb_brand]') ?>
      </div>

    </div>
    <div class="row">
      <div class="col-12">
        <?php
          if ( woocommerce_product_loop() ) {
            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
              while ( have_posts() ) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 *
                 * @hooked WC_Structured_Data::generate_product_data() - 10
                 */
                do_action( 'woocommerce_shop_loop' );

                wc_get_template_part( 'content', 'product' );
              }
            }

            woocommerce_product_loop_end();

            /**
               * Hook: woocommerce_after_shop_loop.
               *
               * @hooked woocommerce_pagination - 10
               */
              do_action( 'woocommerce_after_shop_loop' );
            } else {
              /**
               * Hook: woocommerce_no_products_found.
               *
               * @hooked wc_no_products_found - 10
               */
              do_action( 'woocommerce_no_products_found' );
            }


            ?>




      </div>
    </div>
    
    
    
   
  </div>











  <?php






get_footer( 'shop' );