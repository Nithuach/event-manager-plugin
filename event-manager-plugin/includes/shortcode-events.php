<?php
if (!defined('ABSPATH')) exit;

function emp_events_shortcode() {

    $query = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => -1,
        'meta_key' => 'event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC'
    ));

    ob_start();

    if ($query->have_posts()) {
        echo '<div class="event-list">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="event-item">';
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p>' . get_the_content() . '</p>';
            echo '<p><strong>Date:</strong> ' . get_post_meta(get_the_ID(), 'event_date', true) . '</p>';
            echo '<p><strong>Location:</strong> ' . get_post_meta(get_the_ID(), 'event_location', true) . '</p>';
            echo '<p><strong>Organizer:</strong> ' . get_post_meta(get_the_ID(), 'event_organizer', true) . '</p>';
            echo '</div><hr>';
        }
        echo '</div>';
    } else {
        echo 'No upcoming events found.';
    }

    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('events_list', 'emp_events_shortcode');
