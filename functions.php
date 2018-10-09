<?php

remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');  // скрыть версию wordpress
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_resource_hints', 2);

function wot_add_styles () {
    wp_register_style('wot_roboto', 'https://fonts.googleapis.com/css?family=Roboto');
    wp_enqueue_style('wot_roboto');
    wp_register_style('wot_oswald', 'https://fonts.googleapis.com/css?family=Oswald:700');
    wp_enqueue_style('wot_oswald');
}

add_action ( 'wp_enqueue_scripts', 'wot_add_styles');

function scripts_to_footer () {
    global $wp_scripts;
    $wp_scripts->registered['jquery']->extra['group'] = 1;
    $wp_scripts->registered['jquery-core']->extra['group'] = 1;
    $wp_scripts->registered['jquery-migrate']->extra['group'] = 1;
    $wp_scripts->registered['wp-bootstrap-starter-fontawesome']->extra['group'] = 1;
    $wp_scripts->registered['wp-bootstrap-starter-fontawesome-v4']->extra['group'] = 1;
    $wp_scripts->registered['wp-bootstrap-starter-popper']->extra['group'] = 1;
    $wp_scripts->registered['wp-bootstrap-starter-bootstrapjs']->extra['group'] = 1;
    $wp_scripts->registered['wp-bootstrap-starter-themejs']->extra['group'] = 1;
    $wp_scripts->registered['wp-bootstrap-starter-skip-link-focus-fix']->extra['group'] = 1;
    
}
add_action ( 'wp_head', 'scripts_to_footer', 1, 0 );