<?php

defined( 'ABSPATH' ) || exit;

//global $product;

//echo 'Вкладка с характеристиками';

// echo '<pre>';
// print_r(get_fields());
// echo '</pre>';

$fields = get_fields();
foreach ($fields as $nameField=>$field) {
    if (str_contains($nameField, 'f_')) {
        $obj = get_field_object($nameField);

        echo '<div class="characteristics">';

        foreach ($obj['sub_fields'] as $subfield) {

            $name = $subfield['name'];
            $value = $field[$name];

            if (is_array($value)) {
                $substr = implode('/', $value);
            } else {
                $substr = $value;
            }

            if ($substr) {
                echo '<div class="characteristics_block"><p class="characteristics_block-heading">' . $subfield['label'] . '</p><span></span><p class="characteristics_block-name">' . $substr . '</p></div>';
            }

            
        }

        echo '</div>';
    }
}


