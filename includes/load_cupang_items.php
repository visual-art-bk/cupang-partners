<?php



function load_cupang_items()
{

    global $wpdb;

    $table = $wpdb->prefix . 'cupang_items';

    // $data_from_id = $wpdb->get_col("SELECT `id` FROM {$table} WHERE `last_name` = 'KIM'");

    $result = $wpdb->get_results("SELECT * FROM {$table}");

    return $result;
}
