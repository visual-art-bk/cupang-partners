<?php

function edit_cupang_main_title()
{
    global $wpdb;
    $table = $wpdb->prefix . 'cupang_text';

    // @TODO
    // This code should be inserted to my error doc.
    $postData = json_decode(file_get_contents('php://input'), true);

    $main_title_id = $postData['main_title_id'];
    $main_title_content = $postData['main_title_content'];
    $main_title_font_size = $postData['main_title_font_size'];

    $wpdb->show_errors();

    $wpdb->update($table, array(
        'main_title_content' => $main_title_content,
        'main_title_font_size' => $main_title_font_size,
    ), array(
        'main_title_id' => $main_title_id,
    ));

    // Why this handler return undefined when the below '$wpdb->print_error();' active
    // 
    // The bottom code is right
    // Refer to https://wordpress.stackexchange.com/questions/179058/why-wpdb-show-errors-and-print-error-is-showing-an-output-even-if-the-quer


    if($wpdb->last_error !== '') :
        $wpdb->print_error();
    endif;
    

    $searchedData = $wpdb->get_results("SELECT * FROM {$table}");

    echo json_encode($searchedData);
}
