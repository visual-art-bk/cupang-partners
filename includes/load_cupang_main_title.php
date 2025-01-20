<?php
function load_cupang_main_title()
{

    global $wpdb;

    $table = $wpdb->prefix . 'cupang_text';

    $result = $wpdb->get_results("SELECT * FROM {$table}");

    return $result;
}
