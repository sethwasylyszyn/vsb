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

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'fotawp-blocks-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

/* ==================================================================== */
/* ==================================================================== */
// Enqueue child theme styles
/* ==================================================================== */
/* ==================================================================== */


add_action( 'wp_enqueue_scripts', function() {
    // Enqueue the default style.css
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'chld_thm_cfg_parent' ) );
    
    // Enqueue the custom-overrides.css with a higher priority to ensure it loads last, only if it exists
    $custom_overrides_path = get_stylesheet_directory() . '/custom-overrides.css';
    if ( file_exists( $custom_overrides_path ) ) {
        wp_enqueue_style( 'custom-overrides', get_stylesheet_directory_uri() . '/custom-overrides.css', array( 'child-style' ), null, 'all' );
    }
}, 10 );

// Enqueue custom-overrides.css for the Block Editor, only if it exists
add_action( 'enqueue_block_editor_assets', function() {
    $custom_overrides_path = get_stylesheet_directory() . '/custom-overrides.css';
    if ( file_exists( $custom_overrides_path ) ) {
        wp_enqueue_style( 'custom-editor-overrides', get_stylesheet_directory_uri() . '/custom-overrides.css', array(), null, 'all' );
    }
});

// Add theme support
add_theme_support( 'experimental-theme-json' );



/* ==================================================================== */
// This will automatically include all php files in the '/functions' folder
/* ==================================================================== */

// require_once get_stylesheet_directory() . '/functions/wp-forms-templates.php'; **for a single file (repeat for each file desired)

foreach ( glob( get_stylesheet_directory() . '/functions/*.php' ) as $file ) {
    require_once $file;
}


