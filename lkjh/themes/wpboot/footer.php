<?php
/**
 * Default Footer
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */
?>
	    <!-- End Template Content -->
	    <footer id="footer" class="well well-sm">
			<div class="pull-right">
			 	Made by <a href="http://www.creativewebdesign.ro/" target="_blank" title="web design">Creative Web Design</a>
			</div>
			<div>&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?></div>
			<?php if ( function_exists('dynamic_sidebar')) dynamic_sidebar("footer-content"); ?> <!-- /container -->
	    </footer>
		
		<?php wp_footer(); ?>

	</div> <!-- // .content -->
  </body>
</html>