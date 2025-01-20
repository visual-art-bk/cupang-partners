<?php

include __DIR__ . '/function.php';
include __DIR__ . '/includes/load_cupang_items.php';
include __DIR__ . '/includes/add_cupang_items.php';
include __DIR__ . '/includes/edit_cupang_items.php';
include __DIR__ . '/includes/delete_cupang_items.php';
include __DIR__ . '/includes/load_slides_cupang.php';
include __DIR__ . '/includes/edit_cupang_slides.php';
include __DIR__ . '/includes/load_cupang_main_title.php';
include __DIR__ . '/includes/edit_cupang_main_title.php';
/**
 * 
 * For dummy when frontend dev.
 * 
 */
// make_json_from_db_for_fronent_development();

/**
 * Plugin Name: 쿠팡 파트너스
 * Description: 쿠팡 파트너스 상품을 관리합니다.
 * Author: Wp 쿠팡파트너스 관리자
 * Version: 1.1.4
 */
function admin_cupang_partners()
{
    add_menu_page('Header & Footer Scripts', '쿠팡 파트너스', 'manage_options', 'kbk_admin_menu', 'kbk_scripts_page', '', 200);
}
add_action('admin_menu', 'admin_cupang_partners');

/**
 * Api GET /items
 * 
 * 
 * @return void
 */
function api_get_items_cupang()
{
    register_rest_route(
        'cupang-items/v1',
        'items',
        array(
            'methods' => 'GET',
            'callback' => 'load_cupang_items'
        )
    );
}

/**
 * Api Get /slides
 * 
 * 
 */
function api_get_slides_cupang()
{
    register_rest_route(
        'cupang-slides/v1',
        'slides',
        array(
            'methods' => 'GET',
            'callback' => 'load_slides_cupang'
        )
    );
}
add_action('rest_api_init', 'api_get_slides_cupang');

/**
 *  Api POST /add
 * 
 * 
 */
function api_post_add_cupang()
{
    register_rest_route(
        'cupang-items/v1',
        'add',
        array(
            'methods' => 'POST',
            'callback' => 'add_cupang_items'
        )
    );
}
add_action('rest_api_init', 'api_post_add_cupang');
/**
 * 
 * Api POST /delete
 * 
 * 
 */
function api_post_delete_cupang_item()
{
    register_rest_route(
        'cupang-items/v1',
        'delete',
        array(
            'methods' => 'POST',
            'callback' => 'delete_cupang_items'
        )
    );
}
add_action('rest_api_init', 'api_post_delete_cupang_item');
/**
 * 
 * Api POST /edit
 * 
 * 
 */
function api_post_edit_cupang_item()
{
    register_rest_route(
        'cupang-items/v1',
        'edit',
        array(
            'methods' => 'POST',
            'callback' => 'edit_cupang_items'
        )
    );
}
add_action('rest_api_init', 'api_post_edit_cupang_item');

/**
 * 
 * Api POST /slides/edit
 * 
 * 
 */
function api_post_edit_cupang_slide()
{
    register_rest_route(
        'cupang-slides/v1',
        'edit',
        array(
            'methods' => 'POST',
            'callback' => 'edit_cupang_slides'
        )
    );
}
add_action('rest_api_init', 'api_post_edit_cupang_slide');

/**
 * Api GET /cupang-text/v1/main-title
 * http://8-studio.store/wp-json/cupang-text/v1/main-title
 * 
 * 
 */
function api_get_cupang_main_title()
{
    register_rest_route(
        'cupang-main-title/v1',
        'title',
        array(
            'methods' => 'GET',
            'callback' => 'load_cupang_main_title'
        )
    );
}
add_action('rest_api_init', 'api_get_cupang_main_title');

/**
 * Api POST /cupang-text/v1/main-title/edit
 * 
 */
function api_post_cupang_main_title_edit()
{
    register_rest_route(
        'cupang-main-title/v1',
        'edit',
        array(
            'methods' => 'POST',
            'callback' => 'edit_cupang_main_title'
        )
    );
}
add_action('rest_api_init', 'api_post_cupang_main_title_edit');