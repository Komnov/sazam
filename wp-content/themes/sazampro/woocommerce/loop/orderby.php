<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="catalog-cap">
	<div class="catalog_block">
		<span class="catalog_block-name">Сортировка:</span>

		<form class="woocommerce-ordering" method="get">
			<div class="select">
				<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
					<?php if( $orderby == $id ): ?>
						<button type="button" name="selectBtn" class="select-text">
							<?php	echo esc_html( $name ); ?>
						</button>
					<?php endif; ?>
				<?php endforeach; ?>
				<div class="select-wrapper">
					<div class="select-open" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
						<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
							<?php if($orderby != $id): ?>
								<label class="select-option">
									<input type="radio" name="orderby" class="orderby" value="<?php echo esc_attr( $id ); ?>" <?php checked( $orderby, $id ); ?>>
									<p><?php echo esc_html( $name ); ?></p>
								</label>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<input type="hidden" name="paged" value="1" />
			<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
		</form>

	</div>
	<div class="catalog_block">
		<span class="catalog_block-name">Вид:</span>
		<div class="catalog_block-btn-wrapper">
			<button class="catalog_block-btn catalog_block-btn-column active" name="column"
				type="button"></button>
			<button class="catalog_block-btn catalog_block-btn-row" name="row"
				type="button"></button>
		</div>
	</div>
</div>
