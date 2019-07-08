<?php
add_action( 'wp_enqueue_scripts', 'mir_scripts' );
function mir_scripts(){
    wp_enqueue_style('mir-style', get_stylesheet_uri());
	wp_enqueue_script( 'mir-libs', get_template_directory_uri() . '/js/libs.min.js');
	wp_enqueue_script( 'mir-plugins', get_template_directory_uri() . '/js/plugins.min.js');
	wp_enqueue_script( 'mir-main', get_template_directory_uri() . '/js/main.min.js');
}