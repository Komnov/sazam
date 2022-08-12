<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SaZamPro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="about-info">
            <div class="container">

				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sazampro' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
