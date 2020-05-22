<?php




add_action('admin_menu', 'my_menu');

function my_menu() {

    $icon_url = DORJI_PLUGIN_URL . "/assets/images/scissors-icon.png";

    add_menu_page("Doirjo", "Dorji", "manage_options", "dorji", "view_dorji_cat", $icon_url, 30);
    add_submenu_page("dorji", "Dorji", "Dorji", "manage_options", "dorji", "view_dorji_cat");


}

function view_dorji_cat() {
    include_once DORJI_PLUGIN_DIR. '\views\admin\view-dorji-cat.php';
}