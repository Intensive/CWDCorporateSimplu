<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Default Page
 * Description: Page template with a content container and right sidebar
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */

get_header(); ?>

<div class="row">
  <?php get_sidebar(); ?>

  <div class="col-lg-9">
    <?php while ( have_posts() ) : the_post(); ?>

      	<?php // if ( function_exists( 'bootstrapwp_breadcrumbs' ) ) bootstrapwp_breadcrumbs(); ?><!--/.container --><!--/.row -->

		<div class="row">
			<div class="col-lg-8">
      			<h3><?php the_title();?></h3>
	      		<?php the_content(); ?>
	        	<div id="hartaContact">
	        		<?php 
	        			$harta = get_post_custom_values('cwd_meta_box_harta');
	        			echo $harta[0];
	        		?>
	        	</div>
	      	</div>

	        <div class="col-lg-4">
	        	<?php 
	        	$telefon = get_post_custom_values('cwd_meta_box_tel');
	        	$email = get_post_custom_values('cwd_meta_box_email');
	        	$adresa = get_post_custom_values('cwd_meta_box_address'); ?>
	        	
	        	
	        	<div id="dateContact">
	        		<h4>Cum dai de noi?</h4>
	        	    <div>Tel: <?php echo $telefon[0]; ?> </div>
	        	    E-mail: <a href="mailto:<?php echo $email[0]; ?>"><?php echo $email[0]; ?></a>
	        	    <div>Adresa: <?php echo $adresa[0]; ?> </div>
	        	</div>

	        	<div>
	        		<?php echo do_shortcode ('[contact-form-7 id="134" title="Contact form 1"]');   ?>
	        	</div>
	        </div>
        </div>
    
    <?php endwhile; // end of the loop. ?>
  </div>  

</div>
<?php get_footer(); ?>
