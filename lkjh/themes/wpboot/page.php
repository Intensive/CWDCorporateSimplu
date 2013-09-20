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

  <div class="col-lg-9 col-md-9 col-sm-9">
    <?php while ( have_posts() ) : the_post(); ?>

      <?php // if ( function_exists( 'bootstrapwp_breadcrumbs' ) ) bootstrapwp_breadcrumbs(); ?><!--/.container --><!--/.row -->
       
      <h3><?php the_title();?></h3>

      <?php the_content();?><!-- /.span8 -->  
    
    <?php endwhile; // end of the loop. ?>
  </div>  

</div>
<?php get_footer(); ?>
