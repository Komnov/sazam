<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="shop_table woocommerce-checkout-review-order-table">

<div class="cart-subtotal">
	<div class="subtotal-title">
		<?php 
		esc_html_e( 'Товары', 'woocommerce' ); 
		echo ' ('. WC()->cart->get_cart_contents_count() . ')';
		?>
	</div>
	
	<div class="price-subtotal"><?php wc_cart_totals_subtotal_html(); ?></div>
	<?php //echo $total_shipping = WC()->cart->shipping_total; ?>
</div>

<div class="order-total">
	<div class="total-title"><?php esc_html_e( 'Итог', 'woocommerce' ); ?></div>
	<div class="total-price"><?php wc_cart_totals_order_total_html(); ?></div>
</div>

<?php 
// echo '<pre>';
// print_r( WC()->cart); 
// echo '</pre>';
?>

</div>