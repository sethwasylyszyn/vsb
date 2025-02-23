<?php
/* ==================================================================== */
/* ==================================================================== */
/* REGISTERING CUSTOM PATTERNS & CATEGORY */
/* ==================================================================== */
/* ==================================================================== */

function register_custom_category_and_patterns() {
    // Register custom category
    $text_domain = get_stylesheet();
    register_block_pattern_category(
        'custom',
        array( 'label' => __( '(1) VSB', $text_domain ) )
    );
    
    // Register custom patterns
    $patterns_dir = get_stylesheet_directory() . '/patterns/';
    
    if (is_dir($patterns_dir)) {
        $files = scandir($patterns_dir);
        
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'html') {
                $pattern_name = pathinfo($file, PATHINFO_FILENAME);
                $pattern_title = str_replace('Vsb', 'VSB', ucwords(str_replace('-', ' ', $pattern_name)));
                
                register_block_pattern(
                    'mytheme/' . $pattern_name, // Change 'mytheme' to your theme name
                    array(
                        'title'       => $pattern_title,
                        'description' => 'Custom pattern for ' . $pattern_title,
                        'categories'  => array('custom'),
                        'content'     => file_get_contents($patterns_dir . $file),
                    )
                );
            }
        }
    }
}
add_action( 'init', 'register_custom_category_and_patterns' );