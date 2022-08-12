<?php
/**
 * SaZamPro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SaZamPro
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sazampro_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on SaZamPro, use a find and replace
		* to change 'sazampro' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sazampro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sazampro' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sazampro_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sazampro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sazampro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sazampro_content_width', 640 );
}
add_action( 'after_setup_theme', 'sazampro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sazampro_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Шапка левая', 'sankt-tehnik' ),
			'id'            => 'sidebar-h-left',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="sidebar-h-left header-sidebar">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Шапка правая', 'sankt-tehnik' ),
			'id'            => 'sidebar-h-right',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="sidebar-h-right header-sidebar">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Меню Каталог', 'sankt-tehnik' ),
			'id'            => 'sidebar-catalog-menu',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="sidebar-catalog-menu">',
			'after_widget'  => '</div>',
		)
	);


	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал колонка 1', 'sankt-tehnik' ),
			'id'            => 'sidebar-column-1',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="footer-widget footer-logo">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал колонка 2', 'sankt-tehnik' ),
			'id'            => 'sidebar-column-2',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал колонка 3', 'sankt-tehnik' ),
			'id'            => 'sidebar-column-3',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал колонка 4', 'sankt-tehnik' ),
			'id'            => 'sidebar-column-4',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="footer-widget footer-widget-telegram">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал колонка 5', 'sankt-tehnik' ),
			'id'            => 'sidebar-column-5',
			'description'   => esc_html__( 'Add widgets here.', 'sankt-tehnik' ),
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
		)
	);


	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sazampro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sazampro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sazampro_widgets_init' );


add_action( 'after_setup_theme', 'gutenberg_setup_theme', 1 );
function gutenberg_setup_theme(){
	add_theme_support( 'editor-styles' ); // включает поддержку
	add_editor_style();                   // добавляет файл стилей editor-style.css
}

/**
 * Enqueue scripts and styles.
 */
function sazampro_scripts() {
	wp_enqueue_script( 'sazampro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sazampro_scripts' );


function sazampro_style_css() {
	wp_enqueue_style( 'sazampro-style', get_stylesheet_uri(), array(), _S_VERSION );
	//wp_style_add_data( 'sazampro-style', 'rtl', 'replace' );
	wp_enqueue_style( 'swiper-bundle-css', get_template_directory_uri() . '/connection/swiper-bundle.min.css' );
	wp_enqueue_script( 'swiper-bundle-js', get_template_directory_uri() . '/connection/swiper-bundle.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'gsap', get_template_directory_uri() . '/connection/gsap.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'sazampro-script', get_template_directory_uri() . '/connection/script.js', array(), _S_VERSION, false );

}
add_action( 'wp_enqueue_scripts', 'sazampro_style_css', 99 );


function woocommerce_template_loop_category_title( $category ) {
	?>
	<h2 class="woocommerce-loop-category__title">
		<?php
		echo esc_html( $category->name );

		// if ( $category->count > 0 ) {
		// 	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		// 	echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category );
		// }
		?>
	</h2>
	<?php
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


//Отображать пустые подкатегории
add_filter( 'woocommerce_product_subcategories_hide_empty', '__return_false' );


// Add to cart 
add_filter( 'woocommerce_product_single_add_to_cart_text', 'tb_woo_custom_cart_button_text' );
//add_filter( 'woocommerce_product_add_to_cart_text', 'tb_woo_custom_cart_button_text' );   
function tb_woo_custom_cart_button_text() {
        return __( 'Добавить в корзину', 'woocommerce' );
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 7 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 ); // убрать распродажа из карточки
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); // убрать распродажа из каталога


// Похожие товары
add_filter( 'woocommerce_output_related_products_args', 'sz_related_products_args' );
 function sz_related_products_args( $args ) {
	$args['posts_per_page'] = 4; 
	$args['columns'] = 4;
 return $args;
}


// Хит
function is_featured_product($product) {
	return $product->is_featured();
}


//вкладка Характеристики
add_filter( 'woocommerce_product_tabs', 'new_product_tab', 10 ); 
function new_product_tab( $tabs ) {
	$tabs[ 'characteristics' ] = array(
		'title' 	=> 'Характеристики',
		'priority' 	=> 10,
		'callback' 	=> 'characteristics_tab_content'
	);
	return $tabs;
}
function characteristics_tab_content() {
	get_template_part('woocommerce/single-product/tabs/characteristics');
}


add_filter( 'woocommerce_pagination_args', 'sz_woocommerce_pagination_args_filter' );

function sz_woocommerce_pagination_args_filter( $array ) {
	$array['prev_text'] = '';
	$array['next_text'] = '';

	return $array;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );


add_filter( 'woocommerce_catalog_orderby', 'sz_woocommerce_catalog_orderby_filter' );
function sz_woocommerce_catalog_orderby_filter($array) {
	$array['menu_order'] = 'По умолчанию';
	//unset($array['date']);

	return $array;
}






// Обертки страницы товара
function sazampro_woocommerce_wrapper_before() {
	?>
		<main id="primary" class="site-main">
			<div class="container">
	<?php
}
add_action( 'woocommerce_before_main_content', 'sazampro_woocommerce_wrapper_before' );


function sazampro_woocommerce_wrapper_after() {
	?>
			</div>
		</main><!-- #main -->
	<?php
}
add_action( 'woocommerce_after_main_content', 'sazampro_woocommerce_wrapper_after' );



add_action( 'woocommerce_before_single_product_summary', 'sz_woo_product_wrapper_start', 5 );
function sz_woo_product_wrapper_start() {
	if(is_product()) {
		echo '<div class="product-wrapper">';
	}
}

add_action( 'woocommerce_after_single_product_summary', 'sz_woo_product_wrapper_end', 13 );
function sz_woo_product_wrapper_end() {
	if(is_product()) {
		echo '</div>';
	}
}


add_action( 'woocommerce_single_product_summary', 'sz_woo_product_info_start', 3 );
function sz_woo_product_info_start() {
	if(is_product()) {
		echo '<div class="product-info">';
	}
}

add_action( 'woocommerce_after_single_product_summary', 'sz_woo_product_info_end', 13);
function sz_woo_product_info_end() {
	if(is_product()) {
		echo '</div>';
	}
}


// Разделитель хлебных крошек
add_filter( 'woocommerce_breadcrumb_defaults', 'sazampro_woo_breadcrumbs_delimiter' );
function sazampro_woo_breadcrumbs_delimiter( $defaults ) {
 
	$defaults[ 'delimiter' ] = '<span class="breadcrumb-disunion"></span>'; 
	// меняем на неразрывные пробелы со стрелкой
 
	return $defaults;
 
}



//в категориях
add_filter('woocommerce_get_image_size_thumbnail','add_thumbnail_size',1,10);
function add_thumbnail_size($size){

    $size['width'] = 240;
    $size['height'] = 220;
    $size['crop']   = 1; //0 - не обрезаем, 1 - обрезка
    return $size;
}

// в карточке товара
add_filter('woocommerce_get_image_size_single','add_single_size',1,10);
function add_single_size($size){

    $size['width'] = 560;
    $size['height'] = 420;
    $size['crop']   = 1;
    return $size;
}

// миниатюры
add_filter('woocommerce_get_image_size_gallery_thumbnail','add_gallery_thumbnail_size',1,10);
function add_gallery_thumbnail_size($size){

    $size['width'] = 104;
    $size['height'] = 104;
    $size['crop']   = 1;
    return $size;
}


// function get_delivery_zones(){
// 	$zones = get_fields('zony_dostavki');
// 	foreach ($zones as $zone) {

// 	}
// 	return $template; 
// }
 
// add_shortcode( 'delivery-zones', 'get_delivery_zones' );


//отключение способов оплаты 
//add_filter( 'woocommerce_cart_needs_payment', '__return_false' );




add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' ); 

function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_city']);

	unset($fields['billing']['billing_first_name']['label']);
	$fields['billing']['billing_first_name']['placeholder'] = 'Имя';

	unset($fields['billing']['billing_phone']['label']);
	$fields['billing']['billing_phone']['placeholder'] = 'Телефон';
	$fields['billing']['billing_phone']['priority'] = 15;

	unset($fields['billing']['billing_email']['label']);
	unset($fields['billing']['billing_email'][ 'required']);
	$fields['billing']['billing_email']['placeholder'] = 'E-mail (необязательно)';
	$fields['billing']['billing_email']['priority'] = 20;


	unset($fields['order']['order_comments']['label']);
	$fields['order']['order_comments']['placeholder'] = 'Примечания к вашему заказу, например, особые пожелания отделу доставки';

	return $fields;
}

add_filter('woocommerce_default_address_fields', 'wc_override_address_fields');
function wc_override_address_fields( $fields ) {
	unset($fields['address_1']['label']);
	$fields['address_1']['placeholder'] = 'Адрес (необязательно)';
	unset($fields['address_1'][ 'required']);
	$fields['address_1']['priority'] = 25;
	return $fields;
}




//проверяем параметр empty-cart для очистки корзины
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
  global $woocommerce;

	if ( isset( $_GET['empty-cart'] ) ) {
		$woocommerce->cart->empty_cart();
	}
}


//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );


// когда пользователь сам редактирует свой профиль
add_action( 'show_user_profile', 'true_show_profile_fields' );
// когда чей-то профиль редактируется админом например
add_action( 'edit_user_profile', 'true_show_profile_fields' );
 
function true_show_profile_fields( $user ) {

	$user_tel = get_the_author_meta( 'tel', $user->ID );
	echo '<div><label for="tel">Номер телефона</label>
	<input type="text" name="tel" id="tel" value="' . esc_attr( $user_tel ) . '" class="regular-text" /><div>';

	$user_address = get_the_author_meta( 'address', $user->ID );
	echo '<div><label for="address">Адрес</label>
	<input type="text" name="address" id="address" value="' . esc_attr( $user_address ) . '" class="regular-text" /><div>';
 
}

//сохранить
// когда пользователь сам редактирует свой профиль
add_action( 'personal_options_update', 'true_save_profile_fields' );
// когда чей-то профиль редактируется админом например
add_action( 'edit_user_profile_update', 'true_save_profile_fields' );
 
function true_save_profile_fields( $user_id ) {
 
	update_user_meta( $user_id, 'tel', sanitize_text_field( $_POST[ 'tel' ] ) );
	update_user_meta( $user_id, 'address', sanitize_text_field( $_POST[ 'address' ] ) );
 
}


add_action( 'woocommerce_account_content', 'woocommerce_account_edit-account' );
