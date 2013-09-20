<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.7
 *
 * Last Revised: January 22, 2012
 */

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".get_bloginfo('url'));
	exit();
 ?>