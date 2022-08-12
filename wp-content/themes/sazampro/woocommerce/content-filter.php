<?php


defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

$termId = get_queried_object()->term_id;
$categorySlug = get_queried_object()->slug;
$taxonomyName = "product_cat";
$termChildren = get_term_children( $termId, $taxonomyName );
$idFilter = get_term_meta($termId, 'filter_id', true);

?>


<div class="catalog-wrapper">

    <?php
    echo do_shortcode('[searchandfilter id="' . $idFilter . '"]');
    ?>
    
    <div class="products-cards products-cards-column products-cards-row">

    <?php
    echo do_shortcode('[products category="' . $categorySlug . '" search_filter_id="' . $idFilter . '" columns="3" paginate="true"]');
    ?>


    </div>
</div>

<?php
//echo do_shortcode('[searchandfilter id="' . $idFilter . '"]');


//echo do_shortcode('[products category="' . $categorySlug . '" search_filter_id="' . $idFilter . '" columns="3" paginate="true"]');