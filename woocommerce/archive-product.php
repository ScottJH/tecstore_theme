<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header( 'shop' ); ?>

<div id="content" class="clearfix row">

				
	<?php get_sidebar(); // sidebar 1 ?>
			
	<div id="main" class="col-sm-9 clearfix" role="main">

		<header>

			<h1 class="page-title">Shop TEC for Trailer Parts</h1>
			
			<nav class="clearfix">
			
			<ul class="nav nav-pills navbar-right">
				<li>
					<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"> My Cart <?php echo sprintf (_n( '(%d item)', '(%d items)', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></a>
				</li>
				<li><a href="/checkout">Checkout</a></li>
				<li><a href="/wp-login.php">Log In</a></li>
			</ul>
	
			</nav>
		</header>
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		
			<h2 class="page-title"><?php woocommerce_page_title(); ?></h2>
			
		<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

	</div>
</div>

<?php get_footer( 'shop' ); ?>