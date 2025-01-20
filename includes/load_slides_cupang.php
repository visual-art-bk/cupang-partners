<?php

function load_slides_cupang()
{
    global $wpdb;

    $table = $wpdb->prefix . 'cupang_slides';

    // $wpdb->show_errors();
    $result = $wpdb->get_results("SELECT * FROM {$table}");
    // $wpdb->print_error();

    return $result;
}
