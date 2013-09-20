<?php
/**
 * Template Name: Home Hero Template with 3 widget areas
 *
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.5
 *
 * Last Revised: July 16, 2012
 */
get_header(); ?>

<div class="row">

  <?php get_sidebar(); ?>

  <div class="col-lg-9">
    <?php 

      $args = array (
        'post__in' => array('35', '39', '77', '83'),           // Display page by ID
        'post_type' => 'page', // Show posts associated with certain type
        'posts_per_page' => '4',       // Display 3/all posts per page/in one page
        'order' => 'ASC',          // Designates the ascending or descending order of the 'orderby' parameter. Defaults to 'DESC'
        //'orderby' => 'ID',
         
       );

      $gvQuery = new WP_Query($args);
      if($gvQuery->have_posts()) : ?>

          <?php 

          $i = 1;
          while($gvQuery->have_posts()) : 
            $gvQuery->the_post(); 
            if ($i++ % 2) : ?>
              <div class="row randhome">
            <?php endif; ?>    
            
                <div class="col-lg-6">
                  <h3><?php the_title(); ?></h3>

                  <div class="pageContent">
                    <?php the_excerpt(); ?>
                  </div>
                </div>
            <?php if ($i % 2) : ?>
              </div>
            <?php endif; ?>  
            <?php 
          endwhile; ?>

        <?php   
      endif;
      wp_reset_postdata();
    ?>
  </div>

</div>
<!-- <div class="jumbotron masthead">
    <div class="container">
      <?php
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); ?>
          <h1><?php the_title();?></h1>
          <?php the_content();
        endwhile; 
      endif; ?>
    </div>
</div> -->

<?php if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-left" ); ?>
<?php if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-middle" ); ?>
<?php if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( "home-right" ); ?>

<?php get_footer();?>
