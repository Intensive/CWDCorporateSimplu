<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */
?>

<?php
     /** Loading WordPress Custom Menu  **/
     wp_nav_menu( array(
        'theme_location'  => 'left-menu',
        'menu'            => '',
        'container_class' => 'col-lg-3 col-md-3 col-sm-3',
        'menu_class'      => 'nav nav-pills nav-stacked',
        'fallback_cb'     => '',
        'menu_id' => 'left-menu',
        'walker' => new Bootstrapwp_Walker_Nav_Menu()
    ) );
?>

<?php if ( function_exists('dynamic_sidebar')) dynamic_sidebar("sidebar-page"); ?>

