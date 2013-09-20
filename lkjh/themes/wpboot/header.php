<?php
/**
 *
 * Default Page Header
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: August 15, 2012
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
   <title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  //bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'bootstrapwp' ), max( $paged, $page ) );

  ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' );?>/ico/favicon.ico?ver=1.1">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo( 'template_url' );?>/ico/apple-touch-icon-57-precomposed.png">

  <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
    <div class="container">
      <header id="header">
        <div class="row" id="tophead">
          <div class="col-lg-3 col-xs-4">
            <a class="brand" href="<?php echo home_url( '/' ); ?>" 
               title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
               rel="home">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logocwd.png" alt="<?php bloginfo( 'name' ); ?>">
            </a>
          </div>

          <?php 

            $telefon = get_post_custom_values('cwd_meta_box_tel',45);
            $email = get_post_custom_values('cwd_meta_box_email', 45);
            $cwd_option = cwd_get_global_options();
          ?>
          <div class="col-lg-9 col-xs-8 text-right" id="headerContact">


            <a href="<?php echo $cwd_option['cwd_boot_fb_txt_input'];?>" target="_blank">FB</a>
            <a href="<?php echo $cwd_option['cwd_boot_tw_txt_input'];?>" target="_blank">TW</a>
            <a href="<?php echo $cwd_option['cwd_boot_gplus_txt_input'];?>" target="_blank">G+</a>

            <div>Telefon: <?php echo $telefon[0]; ?> </div>
            <div><a href="mailto:<?php echo $email[0]; ?>"><?php echo $email[0]; ?></a></div>
          </div>
        </div>
          
        <div class="row">
          <div class="col-lg-12">
        
            <nav class="navbar navbar-default" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
        
              <!-- Collect the nav links, forms, and other content for toggling -->
              <?php
                 /** Loading WordPress Custom Menu  **/
                 wp_nav_menu( array(
                    'menu'            => 'navbar navbar-default',
                    'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                    'menu_class'      => 'nav navbar-nav',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'walker'          => new Bootstrapwp_Walker_Nav_Menu()
                ) );
              ?>
            </nav>
        
        
          </div>
        </div>
      </header> <!-- End Header -->

      <?php echo do_shortcode ('[meteor_slideshow]'); ?>

    <!-- Begin Template Content -->