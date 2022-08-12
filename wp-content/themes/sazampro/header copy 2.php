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
		<?php
		if ( is_active_sidebar( 'sidebar-h-left' ) ) {
			dynamic_sidebar( 'sidebar-h-left' );
		}

		if ( is_active_sidebar( 'sidebar-h-right' ) ) {
			dynamic_sidebar( 'sidebar-h-right' );
		}
		?>
		
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
		</div><!-- .site-branding -->

		<?php
		if ( is_active_sidebar( 'sidebar-catalog-menu' ) ) {
			dynamic_sidebar( 'sidebar-catalog-menu' );
		}

		get_search_form();
		
		?>

		<div class="cart_totals">
		<a href="<?php echo wc_get_cart_url() ?>">Корзина</a><br>
		<?php //echo WC()->cart->get_cart_contents_count();
		//echo WC()->cart->get_cart_subtotal();
		?>
		</div>

		<?php echo do_shortcode('[product_categories limit="8" parent="0" hide_empty="0"]'); ?>



	</header><!-- #masthead -->
