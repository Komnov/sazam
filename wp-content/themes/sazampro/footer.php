<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SaZamPro
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
            <div class="footer-body">
				<?php
				if ( is_active_sidebar( 'sidebar-column-1' ) ) {
					dynamic_sidebar( 'sidebar-column-1' );
				}
				?>
				<div class="footer-nav">
				<?php
				if ( is_active_sidebar( 'sidebar-column-2' ) ) {
					dynamic_sidebar( 'sidebar-column-2' );
				}

				if ( is_active_sidebar( 'sidebar-column-3' ) ) {
					dynamic_sidebar( 'sidebar-column-3' );
				}

				?>
				</div>
				<div class="footer-contacts">
				<?php

				if ( is_active_sidebar( 'sidebar-column-4' ) ) {
					dynamic_sidebar( 'sidebar-column-4' );
				}

				if ( is_active_sidebar( 'sidebar-column-5' ) ) {
					dynamic_sidebar( 'sidebar-column-5' );
				}
				?>
				</div>

			</div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
