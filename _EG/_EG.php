<?php

function ideapro_example_function()
{
    $data = '하이 병관';
    return $data;
}
add_shortcode("kbk_test", 'ideapro_example_function');

function kbk_admin_menu_option()
{
    add_menu_page('Header & Footer Scripts', '쿠팡 파트너스', 'manage_options', 'kbk_admin_menu', 'kbk_scripts_page', '', 200);
}
add_action('admin_menu', 'kbk_admin_menu_option');

function kbk_scripts_page()
{
    if (array_key_exists('submit_scripts_update', $_POST)) {
        update_option('ideapro_header_scripts', $_POST['header_scripts']);
        update_option('ideapro_footer_scripts', $_POST['footer_scripts']);

?>
        <div>
            <strong>Settings have been saved.</strong>
        </div>
    <?php
    }


    $header_scripts = get_option('ideapro_header_scripts', 'none');
    $footer_scripts = get_option('ideapro_footer_scripts', 'none');
    ?>
    <div>
        <h2>Update Scripts on the header and footer.</h2>
        <form method="post" action="">
            <label for="header_scripts">Header Scripts</label>
            <textarea name="header_scripts" class="large-text"><?php print $header_scripts; ?></textarea>

            <label for="footer_scripts">Footer Scripts</label>
            <textarea name="footer_scripts" class="large-text"><?php print $footer_scripts; ?></textarea>

            <input type="submit" name="submit_scripts_update" class="button button-primary" value="UPDATE SCRIPTS">
        </form>
    </div>
<?php
}


function ideapro_display_header_scripts()
{
    $header_scripts = get_option('ideapro_header_scripts', 'none');
    print  $header_scripts;
}
add_action('wp_head', 'ideapro_display_header_scripts');

function ideapro_display_footer_scripts()
{
    $footer_scripts = get_option('ideapro_footer_scripts', 'none');
    print   $footer_scripts;
}
add_action('wp_footer', 'ideapro_display_footer_scripts');


function ideapro_form()
{
    global $wpdb;


    $content = '';

    $content .= '<form method="post" action="http://8-studio.local/first-page/">';

    $content .= '<input type="text" name="full_name" placeholder="Your Full Name" />';
    $content .= '<br />';

    $content .= '<input type="text" name="email_address" placeholder="Email Address" />';
    $content .= '<br />';


    $content .= '<textarea name="comment" placeholder="Give us comments"></textarea>';
    $content .= '<br />';

    $content .= '<input type="submit" name="ideapro_submit_form" value="SUNMIT YOUR INFORMATION" />';

    $content .= '</form>';

    $content .= '<p>Current Database tables</p>';

    // $content .= $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."comments");

    return $content;
}
add_shortcode('idea_contact_form', 'ideapro_form');



/**
 * 
 * Form capture
 * 
 * 
 */
function ideapro_form_capture()
{
    global $post;
    global $wpdb;


    if (array_key_exists('ideapro_submit_form', $_POST)) {
        $body = '';
        $body .= 'Name: ' . $_POST['full_name'] . '<br />';
        $body .= 'Email Address: ' . $_POST['email_address'] . '<br />';
        $body .= 'Comments: ' . $_POST['comment'] . '<br />';

        wp_mail('kekekj@naver.com', 'Test email from 병관이', $body);

        // kbk_handle_errors('kbk_find_last_name');

        kbk_handle_errors('kbk_delete_last_name_except_kim');
    }
}

function kbk_handle_errors($fn)
{
    global $wpdb;
    $wpdb->show_errors();
    $fn();
    $wpdb->print_error();
}
function kbk_insert_data()
{
    global $wpdb;

    $table = $wpdb->prefix . 'bwp';
    $data = array(
        'id' => '005',
        'first_nam' => 'sh',
        'last_name' => 'Yang',
    );
    $wpdb->insert($table, $data);
}
function kbk_search_data()
{
    global $wpdb;

    $table = $wpdb->prefix . 'bwp';


    $wpdb->show_errors();

    $result = $wpdb->get_col("SELECT id FROM  $table");

    $wpdb->print_error();

    echo implode(', ', $result);
}
function kbk_find_last_name()
{
    global $wpdb;

    $table = $wpdb->prefix . 'bwp';

    $data = $wpdb->get_col("SELECT `id` FROM {$table}");

    $data_from_last_name = $wpdb->get_col("SELECT `last_name` FROM {$table} WHERE `last_name` = 'KIM'");

    $data_from_id = $wpdb->get_col("SELECT `id` FROM {$table} WHERE `last_name` = 'KIM'");

    echo implode(", ", $data_from_last_name);
}
function kbk_delete_last_name_except_kim()
{
    global $wpdb;

    $table = $wpdb->prefix . 'bwp';

    $data = $wpdb->delete($table, array('last_name' => 'Park'));
}
add_action('wp_head', 'ideapro_form_capture');



// function load_cupang_items()
// {
//     global $wpdb;

//     $table = $wpdb->prefix . 'cupang_items';

//     // $data_from_id = $wpdb->get_col("SELECT `id` FROM {$table} WHERE `last_name` = 'KIM'");

//     $result = $wpdb->get_results("SELECT * FROM {$table}");

//     return $result;
// }