<?php
/* ==================================================================== */
/* ==================================================================== */
/* HIDING DEFAULT BLOCK STYLE OPTIONS */
/* ==================================================================== */
/* ==================================================================== */
/* This area is used for hiding default style options when you select a block to reduce clutter */


add_action('admin_head', function() {
    echo '<style>
        /* ==================================================================== */
        /* ========== HIDING the default button styles ========== */
        .block-editor-block-styles__item[aria-label="Button hover: Primary Color"],
        .block-editor-block-styles__item[aria-label="Button hover: Secondary Color"],
        .block-editor-block-styles__item[aria-label="Button hover: Primary color fill"],
        .block-editor-block-styles__item[aria-label="Button hover: Secondary color fill"],
        .block-editor-block-styles__item[aria-label="Button hover: Tertiary color fill"],
        .block-editor-block-styles__item[aria-label="Button hover: White color fill"],
        .block-editor-block-styles__item[aria-label="Set 1"],
        .block-editor-block-styles__item[aria-label="Set 2: Arrow With Button Shadow"],
        .block-editor-block-styles__item[aria-label="Set 3: Upward Arrow with Button Shadow "],
        .block-editor-block-styles__item[aria-label="Set 4: Arrow"],
        .block-editor-block-styles__item[aria-label="Set 5: Upward Arrow"] 
        { display: none !important; }
        
        /* ==================================================================== */
        /* ========== HIDING the default group/column styles ========== */
        .block-editor-block-styles__item[aria-label="Box Shadow"],
        .block-editor-block-styles__item[aria-label="Box Shadow Medium"],
        .block-editor-block-styles__item[aria-label="Box Shadow Larger"],
        .block-editor-block-styles__item[aria-label="Box Shadow on Hover"] 
        { display: none !important; }
        
        /* ==================================================================== */
        /* ========== HIDING the default separator styles ========== */
        .block-editor-block-styles__item[aria-label="Wide Line"],
        .block-editor-block-styles__item[aria-label="Dots"] 
        { display: none !important; }

        /* ==================================================================== */
        /* ========== HIDING the default header styles ========== */
        .block-editor-block-styles__item[aria-label="Heading Primary Stroke Style"],
        .block-editor-block-styles__item[aria-label="Heading Secondary Stroke Style"],
        .block-editor-block-styles__item[aria-label="Heading Color Stroke Style"],
        .block-editor-block-styles__item[aria-label="Heading Foreground Stroke Style"],
        .block-editor-block-styles__item[aria-label="Heading Tertiary Stroke Style"] 
        { display: none !important; }
        


    </style>';
});




/* ==================================================================== */
/* ==================================================================== */
/* ADDING CUSTOM BLOCK STYLE OPTIONS */
/* ==================================================================== */
/* ==================================================================== */
/* This area is used for adding default style options when you select a block */

function custom_button_styles() {
    $button_styles = [
        ['name' => 'button-1', 'label' => 'Primary Button'],
        ['name' => 'button-1-rad-10', 'label' => 'Primary Button - Radius 10'],
        ['name' => 'button-1-rad-30', 'label' => 'Primary Button - Radius 30'],
        ['name' => 'button-2', 'label' => 'Secondary Button'],
        ['name' => 'button-2-rad-10', 'label' => 'Secondary Button - Radius 10'],
        ['name' => 'button-2-rad-30', 'label' => 'Secondary Button - Radius 30'],
        ['name' => 'button-3-primary', 'label' => 'Text Only - Primary'],
        ['name' => 'button-3-secondary', 'label' => 'Text Only - Secondary'],
        ['name' => 'button-3-white', 'label' => 'Text Only - White']
    ];
    foreach ($button_styles as $style) { register_block_style('core/button', $style); }
}

function custom_background_styles() {
    $background_styles = [
        ['name' => 'bg-white', 'label' => 'White'],
        ['name' => 'bg-light', 'label' => 'Light'],
        ['name' => 'bg-dark', 'label' => 'Dark'],
        ['name' => 'bg-primary', 'label' => 'Primary'],
        ['name' => 'bg-grid-3d-narrow', 'label' => '3D Narrow'],
        ['name' => 'bg-grid-3d-wide', 'label' => '3D Wide'],
        ['name' => 'bg-grid-full', 'label' => 'Grid'],
        ['name' => 'bg-grid-full-wide', 'label' => 'Grid Wide'],
        ['name' => 'bg-grid-full-diagonal', 'label' => 'Grid Diagonal'],
        ['name' => 'bg-grid-diagonal-top', 'label' => 'Diagonal Top'],
        ['name' => 'bg-grid-diagonal-bottom', 'label' => 'Diagonal Bottom'],
        ['name' => 'bg-dots-horizontal-top', 'label' => 'Dots Top'],
        ['name' => 'bg-dots-circle-top-right', 'label' => 'Circle Top Right'],
        ['name' => 'bg-dots-circle-top-left', 'label' => 'Circle Top Left']
    ];
    foreach ($background_styles as $style) { register_block_style('core/group', $style); register_block_style('core/column', $style); }
}

function custom_separator_styles() {
    $separator_styles = [
        ['name' => 'separator-25', 'label' => '25% Width'],
        ['name' => 'separator-50', 'label' => '50% Width'],
        ['name' => 'separator-75', 'label' => '75% Width'],
        ['name' => 'separator-100', 'label' => '100% Width']
    ];
    foreach ($separator_styles as $style) { register_block_style('core/separator', $style); }
}

function custom_heading_styles() {
    $heading_styles = [
        ['name' => 'primary-heading', 'label' => 'Primary'],
        ['name' => 'white-heading', 'label' => 'White'],
        ['name' => 'preheading', 'label' => 'Preheading'],
        ['name' => 'preheading-tight', 'label' => 'Preheading Tight']
    ];
    foreach ($heading_styles as $style) { register_block_style('core/heading', $style); }
}

function custom_paragraph_styles() {
    $paragraph_styles = [
        ['name' => 'primary-paragraph', 'label' => 'Primary'],
        ['name' => 'white-paragraph', 'label' => 'White'],
        ['name' => 'preheading-paragraph', 'label' => 'Preheading'],
        ['name' => 'preheading-tight-paragraph', 'label' => 'Preheading Tight']
    ];
    foreach ($paragraph_styles as $style) { register_block_style('core/paragraph', $style); }
}



// Combined Initialization
function register_custom_block_styles() {
    custom_button_styles();
    custom_background_styles();
    custom_separator_styles();
    custom_heading_styles();
    custom_paragraph_styles();
}

add_action('init', 'register_custom_block_styles');
