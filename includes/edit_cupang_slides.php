<?php

function edit_cupang_slides()
{
    global $wpdb;
    $table = $wpdb->prefix . 'cupang_slides';

    $product_number = $_POST['product_number'];
    $backgrround_img_url = $_POST['backgrround_img_url'];
    $slide_link_title = $_POST['slide_link_title'];
    $slide_link_href = $_POST['slide_link_href'];

    $data = $wpdb->get_results("SELECT * FROM {$table} WHERE `product_number` = {$product_number} LIMIT 50");



    $wpdb->show_errors();

    $wpdb->update($table, array(
        "backgrround_img_url" => $backgrround_img_url,
        "slide_link_href" => $slide_link_href,
        'product_number' => $product_number,
        'slide_link_title' =>  $slide_link_title,
    ), array(
        'product_number' => $product_number,
    ));

    $wpdb->print_error();

    $urlparts = wp_parse_url(home_url());
    $scheme = $urlparts['scheme'];
    $domain = $urlparts['host'];
    $pathname = 'edit';

    header("Location: {$scheme}://{$domain}/{$pathname}");
    die();
}
