<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SaZamPro
 */

$slider = get_field('slider');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

	<?php
	// echo '<pre>';
	// print_r(get_field('slider'));
	// echo '</pre>';

	?>

	<?php if($slider): ?>
		<section class="main_slider">
			<div class="mainSwiper-wrapper">
				<div class="mainSwiper">
					<div class="swiper-wrapper">

					<?php foreach($slider as $slide): ?>

						<div class="swiper-slide">
							<h2 class="main_slider-title"><?php echo $slide['nazvanie']; ?></h2>
							<div class="main_slider_price">
								<span class="main_slider_price-block"><span
										class="main_slider_price-current"><?php echo $slide['czena_so_skidkoj']; ?></span></span>
								<span class="main_slider_price-previous"><?php echo $slide['czena']; ?></span>
							</div>
							<div class="main_slider-img-wrapper">
								<img src="<?php echo $slide['izobrazhenie']; ?>" alt="<?php echo $slide['nazvanie']; ?>"
									class="main_slider-img">
							</div>

							<?php if($slide['hit']): ?>
							<div class="hit">
								<span class="hit-text">Хит!</span>
								<span class="hit-bg"></span>
							</div>
							<?php endif; ?>

							<a href="<?php echo $slide['ssylka']; ?>" class="main_slider-link"></a>
						</div>

					<?php endforeach; ?>	

					</div>
					<div class="swiper-pagination"></div>
				</div>
				<div class="mainSwiper-btn-prev"></div>
				<div class="mainSwiper-btn-next"></div>
			</div>
		</section>

	<?php endif; ?>


		<?php

		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sazampro' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
