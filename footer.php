<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>



   


<div class="wrapper" id="wrapper-footer">
  <div class="pb-4">
  <button class="to-top">
    <img src="<?php echo get_template_directory_uri(); ?>/arrow1.png" alt="">
    <span></span>
  </button>
</div>
	<div class="<?php echo esc_attr( $container ); ?>">
    
     <div class="row py-2 mail-subscribe text-center">
      
      <div class="col-3">
        <img src="<?php echo get_template_directory_uri(); ?>/delivery.gif" alt="">
        <p>Worldwide delivery</p>
         
        <p></p>
      </div>
      <div class="col-6">
        <h5>NEWSLETTER SIGN UP</h5>
        <form action="">
          <input type="text" placeholder="Email Address">
          <input type="submit" value="Sumbit">
        </form>
        
      </div>
      <div class="col-3">
        <img src="<?php echo get_template_directory_uri(); ?>/payment.gif" alt="">
        <p>Online payments</p>
      </div>
    </div>
		<div class="row py-4">
      
      <div class="col-12 col-sm-12 text-center">
        <a href="https://2020s.shop/about/">About</a>
        <a href="https://2020s.shop/shipping/">Shipping</a>
        <a href="https://2020s.shop/returns/">Returns</a>
        <a href="https://2020s.shop/terms/">Terms</a>
        <a href="https://2020s.shop/contact/">Contact</a>
      </div>
     
      

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js
"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

</body>

</html>

