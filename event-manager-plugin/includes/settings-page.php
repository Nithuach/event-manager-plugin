<?php
if (!defined('ABSPATH')) exit;

function emp_settings_page() {
    ?>
    <div class="wrap">
        <h1>Event Manager Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('emp_settings_group');
            do_settings_sections('event-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function emp_register_settings() {
    register_setting('emp_settings_group', 'emp_default_location');

    add_settings_section(
        'emp_settings_section',
        'Default Event Settings',
        null,
        'event-settings'
    );

    add_settings_field(
        'emp_default_location',
        'Default Location',
        'emp_default_location_callback',
        'event-settings',
        'emp_settings_section'
    );
}
add_action('admin_init', 'emp_register_settings');

function emp_default_location_callback() {
    $value = get_option('emp_default_location');
    echo '<input type="text" name="emp_default_location" value="' . esc_attr($value) . '">';
}
