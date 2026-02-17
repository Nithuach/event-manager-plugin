<?php
if (!defined('ABSPATH')) exit;

function emp_add_admin_menu() {
    add_menu_page(
        'Event Settings',
        'Event Settings',
        'manage_options',
        'event-settings',
        'emp_settings_page'
    );
}
add_action('admin_menu', 'emp_add_admin_menu');
