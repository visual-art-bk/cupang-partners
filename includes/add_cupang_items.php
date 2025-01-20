<?php

function add_items_test()
{
    global $wpdb;
    $table = $wpdb->prefix . 'cupang_items';

    $backgroundImageUrl = $_POST['backgroundImageUrl'];
    $href = $_POST['href'];
    $productNumber = $_POST['productNumber'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $data = array(
        'backgroundImageUrl' => $backgroundImageUrl,
        'href' => $href,
        'productNumber' => $productNumber,
        'title' => $title,
        'description' => $description,
    );
    $wpdb->show_errors();

    $wpdb->insert($table, $data);

    $wpdb->print_error();


    $urlparts = wp_parse_url(home_url());
    $scheme = $urlparts['scheme'];
    $domain = $urlparts['host'];
    $pathname = 'edit';

    header("Location: {$scheme}://{$domain}/{$pathname}");
    die();
}


function  add_cupang_items()
{
    add_items_test();
}
