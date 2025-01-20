<?php

function edit_cupang_items()
{
    global $wpdb;
    $table = $wpdb->prefix . 'cupang_items';

    $backgroundImageUrl = $_POST['backgroundImageUrl'];
    $href = $_POST['href'];
    $productNumber = $_POST['productNumber'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $data = $wpdb->get_results("SELECT * FROM {$table} WHERE `productNumber` = {$productNumber} LIMIT 50");

    $wpdb->show_errors();

    $wpdb->update($table, array(
        "backgroundImageUrl" => $backgroundImageUrl,
        "href" => $href,
        'productNumber' => $productNumber,
        'title' =>  $title,
        'description' => $description
    ), array(
        'productNumber' => $productNumber,
    ));

    $wpdb->print_error();

    $urlparts = wp_parse_url(home_url());
    $scheme = $urlparts['scheme'];
    $domain = $urlparts['host'];
    $pathname = 'edit';

    header("Location: {$scheme}://{$domain}/{$pathname}");
    die();
}
