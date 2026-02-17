<?php
/**
 * Plugin Name: Event Manager Plugin
 * Description: Custom WordPress plugin to manage events.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) exit;

// Include required files
include_once plugin_dir_path(__FILE__) . 'includes/admin-menu.php';
include_once plugin_dir_path(__FILE__) . 'includes/settings-page.php';
include_once plugin_dir_path(__FILE__) . 'includes/shortcode-events.php';

// Register Event Custom Post Type
function emp_register_event_post_type() {
    register_post_type('event', array(
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-calendar',
        'supports' => array('title', 'editor'),
    ));
}
add_action('init', 'emp_register_event_post_type');

// Add Event Meta Box
function emp_add_event_meta_box() {
    add_meta_box(
        'emp_event_details',
        'Event Details',
        'emp_event_meta_box_callback',
        'event'
    );
}
add_action('add_meta_boxes', 'emp_add_event_meta_box');

function emp_event_meta_box_callback($post) {
    $date = get_post_meta($post->ID, 'event_date', true);
    $location = get_post_meta($post->ID, 'event_location', true);
    $organizer = get_post_meta($post->ID, 'event_organizer', true);
    ?>
    <p>
        <label>Date</label><br>
        <input type="date" name="event_date" value="<?php echo esc_attr($date); ?>">
    </p>
    <p>
        <label>Location</label><br>
        <input type="text" name="event_location" value="<?php echo esc_attr($location); ?>">
    </p>
    <p>
        <label>Organizer</label><br>
        <input type="text" name="event_organizer" value="<?php echo esc_attr($organizer); ?>">
    </p>
    <?php
}

function emp_save_event_meta($post_id) {
    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, 'event_date', sanitize_text_field($_POST['event_date']));
    }
    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, 'event_location', sanitize_text_field($_POST['event_location']));
    }
    if (isset($_POST['event_organizer'])) {
        update_post_meta($post_id, 'event_organizer', sanitize_text_field($_POST['event_organizer']));
    }
}
add_action('save_post', 'emp_save_event_meta');
