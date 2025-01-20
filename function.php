<?php

function make_json_from_db_for_fronent_development() {
    global $wpdb;

    $table = $wpdb->prefix . 'cupang_items';

    $result = $wpdb->get_results("SELECT * FROM {$table}");
    $json = json_encode($result);
    file_put_contents(__DIR__ . '/local_frontend_dev_dummy__items.json', $json);

    global $wpdb;

    $table = $wpdb->prefix . 'cupang_slides';

    $result = $wpdb->get_results("SELECT * FROM {$table}");
    $json = json_encode($result);
    file_put_contents(__DIR__ . '/local_frontend_dev_dummy__slides.json', $json);
}