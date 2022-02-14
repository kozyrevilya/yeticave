<?php
function include_template(string $path_to_template = '', array $data = []): string
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

function set_timer(): string
{
    $current_timestamp = time();
    $tomorrow_timestamp = strtotime('tomorrow');
    $seconds_until_tomorrow = $tomorrow_timestamp - $current_timestamp;

    $hours_until_tomorrow = floor($seconds_until_tomorrow / 3600);
    if ($hours_until_tomorrow < 10) {
        $hours_until_tomorrow = '0' .  $hours_until_tomorrow;
    }

    $minutes_until_tomorrow = floor(($seconds_until_tomorrow % 3600) / 60);
    if ($minutes_until_tomorrow < 10) {
        $minutes_until_tomorrow = '0' .  $minutes_until_tomorrow;
    }

    return $hours_until_tomorrow . ':' . $minutes_until_tomorrow;
};

function search_user_by_email(string $email, array $data): array
{
    foreach ($data as $account) {
        if ($account['email'] == $email) return $account;
    }

    return [];
}

function check_user(): array {
    $is_auth = false;
    $user_name = '';

    if (isset($_SESSION['user'])) {
        $is_auth = true;
        $user_name = $_SESSION['user']['name'];
    }

    return ['is_auth' => $is_auth, 'user_name' => $user_name];
}
