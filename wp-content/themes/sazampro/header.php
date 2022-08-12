<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SaZamPro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sazampro' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-background">
			<div class="container">
				<div class="header-nav">
					<?php
					if ( is_active_sidebar( 'sidebar-h-left' ) ) {
						dynamic_sidebar( 'sidebar-h-left' );
					}

					if ( is_active_sidebar( 'sidebar-h-right' ) ) {
						dynamic_sidebar( 'sidebar-h-right' );
					}
					?>
				</div>
			</div>
		</div>
		
		<div class="container">
            <div class="header-body">
				<div class="site-branding header-logo">
					<?php
					the_custom_logo();
					?>
				</div><!-- .site-branding -->

				<button class="header-btn-catalog">Каталог</button>

				<?php
				if ( is_active_sidebar( 'sidebar-catalog-menu' ) ) {
					dynamic_sidebar( 'sidebar-catalog-menu' );
				}

				?>

				<!-- <div class="header-catalog" style="display: none;">
					<div class="header-catalog-main">
						<a href="#!" class="header-catalog-main-link">Стройматериалы</a>
						<a href="#!" class="header-catalog-main-link active">Инструмент</a>
						<a href="#!" class="header-catalog-main-link">Электрика</a>
						<a href="#!" class="header-catalog-main-link">Инженерные системы</a>
						<a href="#!" class="header-catalog-main-link">ЛКМ, пены, клеи, герметики</a>
						<a href="#!" class="header-catalog-main-link">Сантехника</a>
						<a href="#!" class="header-catalog-main-link">Крепеж</a>
						<a href="#!" class="header-catalog-main-link">Прокат инструмента</a>
					</div>
					<div class="shadow">
						<div class="header-catalog-right">
							<a href="#!" class="header-catalog-link active">Ручной инструмент</a>
							<a href="#!" class="header-catalog-link">Расходные материалы к электроинтсрументу</a>
						</div>
						<div class="header-catalog-right">
							<a href="#!" class="header-catalog-link">Измерительный инструмент</a>
							<a href="#!" class="header-catalog-link active">Слесарно-столярный инструмент</a>
						</div>
						<div class="header-catalog-right">
							<a href="#!" class="header-catalog-link">Измерительный инструмент</a>
							<a href="#!" class="header-catalog-link active">Слесарно-столярный инструмент</a>
						</div>
					</div>
				</div> -->

				<div class="header-search">
				<?php get_search_form(); ?>
				</div>


				<a href="<?php echo wc_get_cart_url() ?>" class="header-cart">Корзина</a><br>

			</div>

			<div class="header-categories">

				<?php echo do_shortcode('[product_categories limit="8" parent="0" orderby="menu_order" hide_empty="0"]'); ?>

			</div>
			
		</div>

	</header><!-- #masthead -->
