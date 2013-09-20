<?php
/*  Loop template for the Meteor Slides 1.5.1 slideshow
	
	Copy "meteor-slideshow.php" from "/meteor-slides/" to your theme's directory to replace
	the plugin's default slideshow loop.
	
	Learn more about customizing the slideshow template for Meteor Slides: 
	http://www.jleuze.com/plugins/meteor-slides/customizing-the-slideshow-template/
*/
	// Settings for slideshow loop
	global $post;
	
	$meteor_posttemp = $post;
	$meteor_options  = get_option( 'meteorslides_options' );
	$meteor_nav      = $meteor_options['slideshow_navigation'];
	$meteor_count    = 1;
	$meteor_loop     = new WP_Query( array(
	
		'post_type'      => 'slide',
		'slideshow'      => $slideshow,
		'posts_per_page' => $meteor_options['slideshow_quantity']
		
	) ); ?>
	
	<?php // Check for slides
	
	if ( $meteor_loop->have_posts() ) : ?>
	
	<div id="meteor-slideshow<?php echo $slideshow; ?>" class="carousel slide">
		
		<div class="carousel-inner">
			<?php // Loop which loads the slideshow
				while ( $meteor_loop->have_posts() ) : $meteor_loop->the_post(); ?>
			
					<?php // Use first slide image as shim to scale slideshow
					// if ( $meteor_count == 1 ) {
					/*if ( $meteor_count == 1 && $meteor_loop->post_count > 1 ) {
						$meteor_shim = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured-slide');
						echo '<img style="visibility: hidden;" class="meteor-shim" src="' . $meteor_shim[0] . '" alt="" />';
					}*/ ?>
					<div class="item item-<?php echo $meteor_count; if ($meteor_count == 1) { echo ' active '; } ?>">
						
						<?php	
						if ( get_post_meta( $post->ID, "slide_url_value", $single = true ) != "" ): // Adds slide image without Slide URL link?> 	
							<a href="<?php echo get_post_meta( $post->ID, "slide_url_value", $single = true ); ?>" title="<?php the_title(); ?>">
						<?php endif;

								the_post_thumbnail( 'featured-slide', array( 'title' => get_the_title() ) ); ?>
								<div class="carousel-caption">
						        	<h3><?php the_title(); ?></h3>
						        </div>

						<?php if ( get_post_meta( $post->ID, "slide_url_value", $single = true ) != "" ): ?>			
							</a>
						<?php endif; ?>
					</div><!-- .mslide -->
					<?php $meteor_count++; ?>
				
			<?php endwhile; ?>
		</div><!-- .meteor-clip -->

		<?php // Check for multiple slides
	
		if ( $meteor_loop->post_count > 1 ) : ?>
			
			<?php // Adds Previous/Next and Paged navigation
			
			if ( $meteor_nav == "navboth" ) : ?>
		
				<!-- <ul class="meteor-nav">
					<li id="meteor-prev<?php echo $slideshow; ?>" class="prev"><a href="#prev"><?php _e( 'Previous', 'meteor-slides' ) ?></a></li>
					<li id="meteor-next<?php echo $slideshow; ?>" class="next"><a href="#next"><?php _e( 'Next', 'meteor-slides' ) ?></a></li>
				</ul> --><!-- .meteor-nav -->
				<!-- Controls -->
				<a class="left carousel-control" href="#meteor-slideshow<?php echo $slideshow; ?>" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="right carousel-control" href="#meteor-slideshow<?php echo $slideshow; ?>" data-slide="next">
					<span class="icon-next"></span>
				</a>

				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php // Loop which loads the slideshow
						$meteor_count = 0;
						while ( $meteor_loop->have_posts() ) : $meteor_loop->the_post(); ?>
				    		<li data-target="#meteor-slideshow<?php echo $slideshow; ?>" data-slide-to="<?php echo $meteor_count; ?>" 
				    			<?php if ($meteor_count++ == 0) echo ' class="active"' ?>></li>
				    	<?php endwhile; ?>
				</ol>
			
				<div id="meteor-buttons<?php echo $slideshow; ?>" class="meteor-buttons"></div>
			
			<?php // Adds Previous/Next navigation
			
			elseif ( $meteor_nav == "navprevnext" ) : ?>
		
				<!-- <ul class="meteor-nav">
			
					<li id="meteor-prev<?php echo $slideshow; ?>" class="prev"><a href="#prev"><?php _e( 'Previous', 'meteor-slides' ) ?></a></li>
				
					<li id="meteor-next<?php echo $slideshow; ?>" class="next"><a href="#next"><?php _e( 'Next', 'meteor-slides' ) ?></a></li>
				
				</ul> --><!-- .meteor-nav -->
				<!-- Controls -->
				<a class="left carousel-control" href="#meteor-slideshow<?php echo $slideshow; ?>" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="right carousel-control" href="#meteor-slideshow<?php echo $slideshow; ?>" data-slide="next">
					<span class="icon-next"></span>
				</a>
			
			<?php // Adds Paged navigation
			
			elseif ( $meteor_nav == "navpaged" ): ?>
				<div id="meteor-buttons<?php echo $slideshow; ?>" class="meteor-buttons"></div>	
			<?php endif; ?>
			
		<?php endif; ?>		

		<?php // Reset the slideshow loop	
		$post = $meteor_posttemp;	
		wp_reset_postdata(); ?>
			
	</div><!-- .meteor-slides -->
	
	<?php endif; ?>