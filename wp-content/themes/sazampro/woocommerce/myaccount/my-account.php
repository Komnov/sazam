<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		//do_action( 'woocommerce_account_content' );
	?>
</div>


<?php do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<?php
	// echo '<pre>';
	// var_dump($user->first_name);
	// echo '<pre>';
	?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="account_first_name">ФИО <span>(отчество необязательно)</span>&nbsp;<span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>

	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="account_email"><?php esc_html_e( 'Электронная почта', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<label for="account_tel"><?php esc_html_e( 'Номер телефона', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_tel" id="account_tel" autocomplete="tel" value="<?php echo esc_attr( $user->tel ); ?>" />
	</p>

	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<label for="account_address">Адрес <span>(необязательно)</span>&nbsp;<span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_address" id="account_address" autocomplete="address" value="<?php echo esc_attr( $user->address ); ?>" />
	</p>


	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="password_current"><?php esc_html_e( 'Старый пароль', 'woocommerce' ); ?></label>
		<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="password_1"><?php esc_html_e( 'Новый пароль', 'woocommerce' ); ?></label>
		<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="password_2"><?php esc_html_e( 'Подтвердите новый пароль', 'woocommerce' ); ?></label>
		<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>





<?php
$my_orders_columns = apply_filters(
	'woocommerce_my_account_my_orders_columns',
	array(
		'order-number'  => esc_html__( 'Order', 'woocommerce' ),
		'order-date'    => esc_html__( 'Date', 'woocommerce' ),
		'order-status'  => esc_html__( 'Status', 'woocommerce' ),
		'order-total'   => esc_html__( 'Total', 'woocommerce' ),
		'order-actions' => '&nbsp;',
	)
);

$customer_orders = get_posts(
	apply_filters(
		'woocommerce_my_account_my_orders_query',
		array(
			'numberposts' => $order_count,
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types( 'view-orders' ),
			'post_status' => array_keys( wc_get_order_statuses() ),
		)
	)
);

if ( $customer_orders ) : ?>

	<h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', esc_html__( 'История заказов', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>

	<div class="shop_table shop_table_responsive my_account_orders">


		<div class="tbody">
			<?php
			foreach ( $customer_orders as $customer_order ) :
				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count = $order->get_item_count();
				$order_number = $order->get_order_number();

				// echo '<pre>';
				// var_dump($order);
				// echo '<pre>';
				?>
				<div class="order">
					<?php //echo '<h1>' . $order . '</h1>'; ?>
					<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
						
						<div class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<!-- <a href="<?php //echo esc_url( $order->get_view_order_url() ); ?>"> -->
									<?php echo '<h3>Заказ ' . _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<!-- </a> -->

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>


							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php echo 'Количество товаров: ' . $item_count; ?>

							<?php endif; ?> 

						</div>
					<?php endforeach; ?>

					<?php 
					echo '<div>Стоимость доставки: ' . $order->get_shipping_total() . '₽</div>';						
					echo '<div>Сумма заказа: ' . $order->get_total() . '₽</div>'; 
					?>


					<div class="show-ordered">






						<?php
						//$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

						//$order = wc_get_order( $order_number );

						//echo $order_id;
						//echo '<h1>' . $order . '</h1>';

						// if ( ! $order ) {
						// 	return;
						// }

						$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
						$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
						$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
						$downloads             = $order->get_downloadable_items();
						$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

						if ( $show_downloads ) {
							wc_get_template(
								'order/order-downloads.php',
								array(
									'downloads'  => $downloads,
									'show_title' => true,
								)
							);
						}


						?>
						<section class="woocommerce-order-details">
							<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

							<h4 class="woocommerce-order-details__title"><?php esc_html_e( 'Показать заказанные товары', 'woocommerce' ); ?></h4>

							<div class="woocommerce-table woocommerce-table--order-details shop_table order_details">


								<div class="tbody">
									<?php
									do_action( 'woocommerce_order_details_before_order_table_items', $order );

									foreach ( $order_items as $item_id => $item ) {
										$product = $item->get_product();

										wc_get_template(
											'order/order-details-item.php',
											array(
												'order'              => $order,
												'item_id'            => $item_id,
												'item'               => $item,
												'show_purchase_note' => $show_purchase_note,
												'purchase_note'      => $product ? $product->get_purchase_note() : '',
												'product'            => $product,
											)
										);
									}

									do_action( 'woocommerce_order_details_after_order_table_items', $order );
									?>
								</div>

							</div>

							<?php //do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
						</section>








					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
