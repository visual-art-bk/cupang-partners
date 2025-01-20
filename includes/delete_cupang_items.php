<?php

function delete_cupang_items()
{
    global $wpdb;
    $table = $wpdb->prefix . 'cupang_items';

    $productNumber = $_POST['productNumber'];

    $wpdb->show_errors();
    $wpdb->delete($table, array('productNumber' =>  $productNumber));
    $wpdb->print_error();

    $urlparts = wp_parse_url(home_url());
    $scheme = $urlparts['scheme'];
    $domain = $urlparts['host'];
    $pathname = 'edit';

    header("Location: {$scheme}://{$domain}/{$pathname}");
    die();
}
