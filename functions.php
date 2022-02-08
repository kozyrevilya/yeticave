<?php
function include_template(string $path_to_template, array $data): string
{
    if (!file_exists($path_to_template)) {
        return '';
    }

    extract($data);

    ob_start();
    require_once $path_to_template;

    return ob_get_clean();
}

function format_price(float $price = 0): string
{
    $formated_price = null;
    $rounded_price = ceil($price);

    if ($rounded_price < 1000) {
        $formated_price = $rounded_price;
    } else {
        $formated_price = number_format($rounded_price, 0, '', ' ');
    }

    return $formated_price;
};
