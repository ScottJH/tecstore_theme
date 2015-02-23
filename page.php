<?php get_header(); ?>
			
			<div id="content" class="clearfix row">

				
				<?php get_sidebar(); // sidebar 1 ?>
			
				<div id="main" class="col-sm-9 clearfix" role="main">

					<header>

						<h1 class="page-title">Shop TEC for Trailer Parts</h1>
						
						<nav>
						
						<ul class="nav nav-pills navbar-right">
							<li>
								<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"> My Cart <?php echo sprintf (_n( '(%d item)', '(%d items)', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></a>
							</li>
							<li><a href="/checkout">Checkout</a></li>
							<li><a href="/wp-login.php">Log In</a></li>
						</ul>
				
					</nav>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<div class="page-header"><h2 class="page-title" itemprop="headline"><?php the_title(); ?></h2></div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template('',true); ?>
					
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>