<?php
/**
 * Bootstrap functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Updated: September 9, 2012
 */

if (!defined('BOOTSTRAPWP_VERSION'))
define('BOOTSTRAPWP_VERSION', '3');

 /**
 * Declaring the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 770; /* pixels */

/*
| -------------------------------------------------------------------
| Setup Theme
| -------------------------------------------------------------------
|
| */
add_action( 'after_setup_theme', 'bootstrapwp_theme_setup' );
if ( ! function_exists( 'bootstrapwp_theme_setup' ) ):
function bootstrapwp_theme_setup() {
  add_theme_support( 'automatic-feed-links' );
  /**
   * Adds custom menu with wp_page_menu fallback
   */
  register_nav_menus( array(
    'main-menu' => __( 'Main Menu', 'bootstrapwp' ),
    'left-menu' => __( 'Left Menu', 'bootstrapwp' ),
  ) );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );
  /**
   * Declaring the theme language domain
   */
   load_theme_textdomain('bootstrapwp', get_template_directory() . '/lang');
}
endif;

/**
 * Adds support for a custom header image.
 */
//require get_template_directory() . '/inc/theme-options.php';
if(is_admin()){   
    require_once(get_template_directory() . '/inc/bootstrap-theme-options.php');  
} 

/** 
 * Collects our theme options 
 * 
 * @return array 
 */  
function cwd_get_global_options(){  
      
    $cwd_option = array();  
  
    $cwd_option  = get_option('cwd_options');  
      
return $cwd_option;  
}  
  
 /** 
 * Call the function and collect in variable 
 * 
 * Should be used in template files like this: 
 * <?php echo $cwd_option['cwd_txt_input']; ?> 
 * 
 * Note: Should you notice that the variable ($cwd_option) is empty when used in certain templates such as header.php, sidebar.php and footer.php 
 * you will need to call the function (copy the line below and paste it) at the top of those documents (within php tags)! 
 */   
$cwd_option = cwd_get_global_options();  

################################################################################
// Loading All CSS Stylesheets
################################################################################
function bootstrapwp_css_loader() {
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false ,'1.0', 'all' );
  wp_enqueue_style('sassstyle', get_template_directory_uri() . '/css/style.css', false ,'1.0', 'all' ); // Sass Styles
}
add_action('wp_enqueue_scripts', 'bootstrapwp_css_loader');


################################################################################
// Loading all JS Script Files.  Remove any files you are not using!
################################################################################
  function bootstrapwp_js_loader() {
       wp_deregister_script('comment-reply');
       wp_deregister_script('jquery');

       wp_enqueue_script('allscripts', get_template_directory_uri() . '/js/allscripts.min.grunt.js', array(),'1.0', true );
  }
add_action('wp_enqueue_scripts', 'bootstrapwp_js_loader');


/*
| -------------------------------------------------------------------
| Top Navigation Bar Customization
| -------------------------------------------------------------------

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bootstrapwp_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'bootstrapwp_page_menu_args' );

/**
 * Get file 'includes/class-bootstrap_walker_nav_menu.php' with Custom Walker class methods
 * */

include 'includes/class-bootstrapwp_walker_nav_menu.php';

/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */
function bootstrapwp_widgets_init() {
  register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'sidebar-page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );

  register_sidebar( array(
    'name' => 'Posts Sidebar',
    'id' => 'sidebar-posts',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );

  register_sidebar(array(
    'name' => 'Home Left',
    'id'   => 'home-left',
    'description'   => 'Left textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Home Middle',
    'id'   => 'home-middle',
    'description'   => 'Middle textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Home Right',
    'id'   => 'home-right',
    'description'   => 'Right textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

    register_sidebar(array(
    'name' => 'Footer Content',
    'id'   => 'footer-content',
    'description'   => 'Footer text or acknowledgements',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
  ));
}
add_action( 'init', 'bootstrapwp_widgets_init' );


/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 160, 120 ); // 160 pixels wide by 120 pixels high
}

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'bootstrap-small', 260, 180 ); // 260 pixels wide by 180 pixels high
  add_image_size( 'bootstrap-medium', 360, 268 ); // 360 pixels wide by 268 pixels high
}
/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| Adding filter to post excerpts to contain ...Continue Reading link
| */
function bootstrapwp_excerpt($more) {
       global $post;
  return '&nbsp; &nbsp;<a href="'. get_permalink($post->ID) . '">...citeste</a>';
}
add_filter('excerpt_more', 'bootstrapwp_excerpt');



if ( ! function_exists( 'bootstrapwp_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function bootstrapwp_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrapwp' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrapwp' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	<?php
}
endif; // bootstrapwp_content_nav


if ( ! function_exists( 'bootstrapwp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bootstrap_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bootstrap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'bootstrap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'bootstrap' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'bootstrap' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for bootstrapwp_comment()

if ( ! function_exists( 'bootstrapwp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own bootstrap_posted_on to override in a child theme
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bootstrap' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bootstrap' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'bootstrapwp_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so bootstrap_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so bootstrap_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in bootstrapwp_categorized_blog
 *
 * @since bootstrap 1.2
 */
function bootstrapwp_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'bootstrapwp_category_transient_flusher' );
add_action( 'save_post', 'bootstrapwp_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function bootstrapwp_enhanced_image_navigation( $url ) {
	global $post;

	if ( wp_attachment_is_image( $post->ID ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'bootstrapwp_enhanced_image_navigation' );


/*
| -------------------------------------------------------------------
| Checking for Post Thumbnail
| -------------------------------------------------------------------
|
| */
function bootstrapwp_post_thumbnail_check() {
    global $post;
    if (get_the_post_thumbnail()) {
          return true; }
          else { return false; }
}

/*
| -------------------------------------------------------------------
| Setting Featured Image (Post Thumbnail)
| -------------------------------------------------------------------
| Will automatically add the first image attached to a post as the Featured Image if post does not have a featured image previously set.
| */
function bootstrapwp_autoset_featured_img() {

  $post_thumbnail = bootstrapwp_post_thumbnail_check();
  if ($post_thumbnail == true ){
    return the_post_thumbnail();
  }
    if ($post_thumbnail == false ){
      $image_args = array(
                'post_type' => 'attachment',
                'numberposts' => 1,
                'post_mime_type' => 'image',
                'post_parent' => $post->ID,
                'order' => 'desc'
          );
      $attached_image = get_children( $image_args );
             if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
            return the_post_thumbnail();
          } else { return " ";}
        }
      }  //end function


/*
| -------------------------------------------------------------------
| Adding Breadcrumbs
| -------------------------------------------------------------------
|
| */
 function bootstrapwp_breadcrumbs() {

  $delimiter = '<span class="divider">/</span>';
  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<ul class="breadcrumb">';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'bootstrapwp') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</ul>';

  }
} // end bootstrapwp_breadcrumbs()


// Security hacks
add_filter('login_errors',create_function('$a', "return null;"));
function wpbeginner_remove_version() {
  return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

// REMOVE UPDATES 

remove_action ('load-update-core.php', 'wp_update_themes');
add_filter ('pre_site_transient_update_themes', create_function ('$a', "return null;"));
remove_action ('load-update-core.php', 'wp_update_plugins');
add_filter ('pre_site_transient_update_plugins', create_function ('$a', "return null;"));
add_filter ('pre_site_transient_update_core', create_function ('$a', "return null;" ));

// CHANGE TEXT IN ADMIN FOOTER
if (! function_exists('dashboard_footer ') ){
  function dashboard_footer () {
    echo 'Iti multumim ca folosesti platforma CWD Corporate! Pentru intrebari, contacteaza <a href="http://www.creativewebdesign.ro/" target="_blank">Creative Web Design</a>';
  }
}
add_filter('admin_footer_text', 'dashboard_footer');

// CUSTOM ADMIN DASHBOARD HEADER LOGO
function custom_admin_logo()
{
    echo '
<style type="text/css">
  #wp-admin-bar-wp-logo > .ab-item .ab-icon { 
    background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/cwd.png) !important; 
    background-position: 0 0;
    }
  #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
    background-position: 0 0;
  } 
  #wp-version-message, #wpadminbar.nojs li:hover > .ab-sub-wrapper, #wpadminbar li.hover > .ab-sub-wrapper {
    display:none;
  }
</style>';  
}
add_action('admin_head', 'custom_admin_logo');

function my_login_logo_url() {
    return 'http://www.creativewebdesign.ro/';
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Creative Web Design';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function add_cwd_admin_bar_link() {
  global $wp_admin_bar;
  if ( !is_super_admin() || !is_admin_bar_showing() )
    return;
  $wp_admin_bar->add_menu( array(
  'id' => 'cwd_link',
  'title' => __( 'Creative Web Design'),
  'href' => __('http://www.creativewebdesign.ro'),
  ) );

  $wp_admin_bar->remove_menu('my-blogs');
  $wp_admin_bar->remove_menu('about');
  $wp_admin_bar->remove_menu('my-account-with-avatar');
  $wp_admin_bar->remove_menu('appearance');
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action('admin_bar_menu', 'add_cwd_admin_bar_link',25);

//Login Screen CSS Custon css to replace the WP logo on the login screen
function c3m_custom_login_css() { 
  echo '<style type="text/css">
          #backtoblog {display:none}
          body.login #login h1 a {
          background: url("' . get_bloginfo('template_url') . '/img/logocwd.png"' . ') no-repeat scroll center top transparent;
          height: 77px;
          width: 200px;
          margin-left: 62px;
          margin-top: -40px;
          margin-bottom: 10px;
        }
        </style>'; 
}
add_action( 'login_head', 'c3m_custom_login_css' );

// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
function example_remove_dashboard_widgets()
{
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

// HIDE WELCOME SCREEN
function hide_welcome_screen() {
    $user_id = get_current_user_id();
    if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) )
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
}
add_action( 'load-index.php', 'hide_welcome_screen' );

// REMOVE ADMIN MENUS
function remove_menus () {
  global $menu;
  $restricted = array(__('Media'),__('Links'),__('Comentarii'),__('Module'),__('Aspect'),__('Settings'), __('Unelte'), __('Utilizatori'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  }
  remove_action('admin_menu', '_add_themes_utility_last', 101); // Remove the theme editor submenu within admin
}
// add_action('admin_menu', 'remove_menus');

// REMOVE UPDATES SUBMENU
function remove_updates_submenu() {
    remove_submenu_page( 'index.php', 'update-core.php' );
}
add_action( 'admin_init', 'remove_updates_submenu' );

// CHANGE ADMIN THEME
function my_admin_head() { 
    echo '<link rel="stylesheet" type="text/css" href="' .get_stylesheet_directory_uri() . "/wp-admin.css" . '">';
}
//add_action('admin_head', 'my_admin_head');


/************************************
   Adauga META Box Date de Contact
************************************/ 
function dateContact()  
{  
  if ( get_the_ID() == 45 ) {
    add_meta_box( 'dateContact', 'Date Contact', 'contactDate', 'page', 'normal', 'high' );
  }
}
add_action( 'add_meta_boxes', 'dateContact' );

function contactDate ($post) {
  $values = get_post_custom( $post->ID );  
  $telefon = isset( $values['cwd_meta_box_tel'] ) ? esc_attr($values['cwd_meta_box_tel'][0]) : ''; 
  $email = isset( $values['cwd_meta_box_email'] ) ? esc_attr($values['cwd_meta_box_email'][0]) : '';  
  $adresa = isset( $values['cwd_meta_box_address'] ) ? esc_attr($values['cwd_meta_box_address'][0]) : '';
  $harta = isset( $values['cwd_meta_box_harta'] ) ? esc_attr($values['cwd_meta_box_harta'][0]) : '';
  wp_nonce_field( 'cwd_meta_box_nonce', 'meta_box_nonce' );  // We'll use this nonce field later on when saving.  
  ?> 
  
  <label for="cwd_meta_box_tel"> Telefon</label>  
  <input type="text" name="cwd_meta_box_tel" id="cwd_meta_box_tel" value="<?php echo $telefon; ?>" />  
  
  <label for="cwd_meta_box_email"> E-mail</label>  
  <input type="text" name="cwd_meta_box_email" id="cwd_meta_box_email" value="<?php echo $email; ?>" />
  
  <label for="cwd_meta_box_address"> Adresa</label>  
  <input type="text" name="cwd_meta_box_address" id="cwd_meta_box_address" value="<?php echo $adresa; ?>" /> 

  <div>
    <p>
      <label for="cwd_meta_box_harta"> Harta</label>
    </p>
    <textarea type="text" name="cwd_meta_box_harta" id="cwd_meta_box_harta" rows="10" cols="100"><?php echo $harta; ?></textarea>
  </div>
    
  <?php 
}
  
function cwd_meta_box_save( $post_id  ) {  
  // Bail if we're doing an auto save  
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;  
  // if our nonce isn't there, or we can't verify it, bail 
  if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'cwd_meta_box_nonce' ) ) return;  
  // if our current user can't edit this page, bail  
  if( !current_user_can( 'edit_page' ) ) return;  
    
  // now we can actually save the data  
  $allowed = array(   
    'a' => array( // on allow a tags  
      'href' => array() // and those anchors can only have href attribute  
    )  
  );  
    
  // Make sure your data is set before trying to save it         
  if( isset( $_POST['cwd_meta_box_tel'] ) )  
    update_post_meta( $post_id, 'cwd_meta_box_tel', wp_kses( $_POST['cwd_meta_box_tel'] ) );
  if( isset( $_POST['cwd_meta_box_email'] ) )  
    update_post_meta( $post_id, 'cwd_meta_box_email', wp_kses( $_POST['cwd_meta_box_email'] ) );
  if( isset( $_POST['cwd_meta_box_address'] ) )  
    update_post_meta( $post_id, 'cwd_meta_box_address', wp_kses( $_POST['cwd_meta_box_address'] ) );
  if( isset( $_POST['cwd_meta_box_harta'] ) )  
    update_post_meta( $post_id, 'cwd_meta_box_harta', $_POST['cwd_meta_box_harta'] );
} 
add_action( 'save_post', 'cwd_meta_box_save' );


//**********************************************************//
//******************  CUSTOM POST TYPES ********************//
//**********************************************************//

function cwd_create_custom_post_type() {  
  $labels = array( 
    'name' => 'Testimoniale',
    'singular_name' => 'Testimonial',
    'add_new' => 'Adauga',
    'add_new_item' => 'Adauga Testimonial Nou',
    'edit_item' => 'Editeaza Testimonial',
    'new_item' => 'Testimonial Nou',
    'all_items' => 'Toate Testimonialele',
    'view_item' => 'Vezi Testimonial',
    'search_items' => 'Cauta Testimonial',
    'not_found' =>  'Niciun Testimonial Gasit',
    'not_found_in_trash' => 'Niciun Testimonial Gasit La Gunoi', 
    'parent_item_colon' => '',
    'items_archive' => '', // the items archive text. Default is Page Archive
    'menu_name' => 'Testimoniale'
  );

  $args = array(
    'labels' => $labels,
    'description' => 'Parerile clientilor despre firma dvs.',
    'public' => true,          // Whether a post type is intended to be used publicly either via the admin interface or by front-end users. Default: false
    'exclude_from_search' => true, // Whether to exclude posts with this post type from front end search results. 
                   // Default: value of the opposite of the public argument
    'publicly_queryable' => false,  // Whether queries can be performed on the front end as part of parse_request(). Default: value of public argument
    //'show_ui' => true,         // Whether to generate a default UI for managing this post type in the admin. Default: value of public argument
    'show_in_nav_menus' => false,   // Whether post_type is available for selection in navigation menus. Default: value of public argument
    //'show_in_menu' => true,      // Where to show the post type in the admin menu. show_ui must be true. Default: value of show_ui argument
    'show_in_admin_bar' => true,   // Whether to make this post type available in the WordPress admin bar. Default: value of the show_in_menu argument
    //'menu_icon' => 'imgs/',      // The url to the icon to be used for this menu.
    'query_var' => 'true',       // Sets the query_var key for this post type. Default: true - set to $post_type
    'rewrite' => array( 'slug' => 'testimonial' ), // Triggers the handling of rewrites for this post type. To prevent rewrites, set to false.
    'capability_type' => 'post',   // The string to use to build the read, edit, and delete capabilities.
    //'has_archive' => true,       // Enables post type archives. Will use $post_type as archive slug by default. Default: false
    //'hierarchical' => true,        // Whether the post type is hierarchical (e.g. page), Default: false
    'menu_position' => 5,       // The position in the menu order. show_in_menu must be true. Default: null - defaults to below Comments
                   // 5 - below Posts; 10 - below Media; 15 - below Links; 20 - below Pages; 25 - below comments; 
                   // 60 - below first separator; 65 - below Plugins; 70 - below Users; 75 - below Tools; 80 - below Settings
                   // 100 - below second separator
    'supports' => array(       // Boolean false can be passed to prevent default (title and editor) behavior.
      'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' , 'revisions' , 'page-attributes'
      ),
    //'map_meta_cap' => true,        // Whether to use the internal default meta capability handling. Default: false
    //'register_meta_box_cb' => 'string', // Provide a callback function that will be called when setting up the meta boxes for the edit form. Do remove_meta_box() and add_meta_box() calls in the callback.
    //'taxonomies' => 'array',     // An array of registered taxonomies like category or post_tag that will be used with this post type.
    //'can_export' => false,       // Can this post_type be exported. Default: true
  
    ); 

    register_post_type( 'testimonial', $args ); // $post_type : max. 20 characters, can not contain capital letters or spaces
}
add_action( 'init', 'cwd_create_custom_post_type' );