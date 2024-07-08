<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

// REGISTER ACF BLOCKS

function register_custom_cta_block(){

    register_block_type( __DIR__ . '/blocks/custom-cta-block');

}
add_action('init', 'register_custom_cta_block');

// Import ACF Json data directly to ACF Group Fields when twentytwentyfour-child theme is activa.
function mytheme_setup_options () {
    // Get all json files from the /acf-field-groups directory.
    $files = glob( get_stylesheet_directory() . '/acf-json/*.json' );
  
    // If no files, bail.
    if ( ! $files ) {
        return;
    }
  
    // Loop through each file.
    foreach ( $files as $file ) {
        // Grab the JSON file.
        $group = file_get_contents( $file );
  
        // Decode the JSON.
        $group = json_decode( $group, true );
  
        // If not empty, import it.
        if ( is_array( $group ) && ! empty( $group ) && ! acf_get_field_group( $group[0]['key'] ) ) {
            acf_import_field_group( $group [0] );
        }
    }
  }
  add_action('after_switch_theme', 'mytheme_setup_options');