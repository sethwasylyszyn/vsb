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
/* ==================================================================== */
/* ADDING CUSTOM BUTTONS */
/* ==================================================================== */
/* ==================================================================== */

/* ==================== */
/* This hides the default button options from the UI to reduce clutter */
/* ==================== */
add_action('admin_head', function() {
    echo '<style>
        /* Hide the default button styles */
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
        .block-editor-block-styles__item[aria-label="Set 5: Upward Arrow"] {
            display: none !important;
        }
    </style>';
});


/* ==================== */
/* This adds custom button options to the UI */
/* ==================== */
function custom_button_styles() {
    // Button 1
    register_block_style('core/button', [
        'name'  => 'button-1',
        'label' => 'Primary Button',
    ]);

    register_block_style('core/button', [
        'name'  => 'button-1-rad-10',
        'label' => 'Primary Button - Radius 10',
    ]);

    register_block_style('core/button', [
        'name'  => 'button-1-rad-30',
        'label' => 'Primary Button - Radius 30',
    ]);

    // Button 2
    register_block_style('core/button', [
        'name'  => 'button-2',
        'label' => 'Secondary Button',
    ]);

    register_block_style('core/button', [
        'name'  => 'button-2-rad-10',
        'label' => 'Secondary Button - Radius 10',
    ]);

    register_block_style('core/button', [
        'name'  => 'button-2-rad-30',
        'label' => 'Secondary Button - Radius 30',
    ]);
    
    register_block_style('core/button', [
        'name'  => 'button-3-primary',
        'label' => 'Text Only - Primary',
    ]);
    
    register_block_style('core/button', [
        'name'  => 'button-3-secondary',
        'label' => 'Text Only - Secondary',
    ]);
    
    register_block_style('core/button', [
        'name'  => 'button-3-white',
        'label' => 'Text Only - White',
    ]);
}
add_action('init', 'custom_button_styles');

/* ==================================================================== */
/* CUSTOM GROUP/COLUMN STYLES */
/* ==================================================================== */

/* ==================== */
/* This hides the default options from the UI to reduce clutter */
/* ==================== */
add_action('admin_head', function() {
    echo '<style>
        /* Hide default background styles */
        .block-editor-block-styles__item[aria-label="Box Shadow"],
        .block-editor-block-styles__item[aria-label="Box Shadow Medium"],
        .block-editor-block-styles__item[aria-label="Box Shadow Larger"],
        .block-editor-block-styles__item[aria-label="Box Shadow on Hover"] {
            display: none !important;
        }
    </style>';
});


/* ==================== */
/* This adds custom group/column background options to the UI */
/* ==================== */
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
        ['name' => 'bg-grid-dots', 'label' => 'Dots'],
        ['name' => 'bg-dots-horizontal-top', 'label' => 'Dots Top'],
        ['name' => 'bg-dots-circle-top-right', 'label' => 'Circle Top Right'],
        ['name' => 'bg-dots-circle-top-left', 'label' => 'Circle Top Left'],
        ['name' => 'bg-dots-square-top-right', 'label' => 'Square Top Right'],
        ['name' => 'bg-dots-square-top-left', 'label' => 'Square Top Left'],
        ['name' => 'bg-dots-arrows', 'label' => 'Arrows']
    ];

    foreach ($background_styles as $style) {
        register_block_style('core/group', $style);
        register_block_style('core/column', $style);
    }
}

add_action('init', 'custom_background_styles');






/* ==================================================================== */
/* ==================================================================== */
/* SEPARATOR ADJUSTMENTS */
/* ==================================================================== */
/* ==================================================================== */


/* ==================== */
/* This hides the default separator options from the UI to reduce clutter */
/* ==================== */
add_action('admin_head', function() {
    echo '<style>
        /* Hide "Wide Line" and "Dots" from separator styles */
        .block-editor-block-styles__item[aria-label="Wide Line"],
        .block-editor-block-styles__item[aria-label="Dots"] {
            display: none !important;
        }
    </style>';
});



/* ==================== */
/* This adds custom separator options to the UI */
/* ==================== */
function custom_separator_styles() {
    register_block_style(
        'core/separator',
        [
            'name'  => 'separator-25',
            'label' => '25% Width'
        ]
    );

    register_block_style(
        'core/separator',
        [
            'name'  => 'separator-50',
            'label' => '50% Width'
        ]
    );

    register_block_style(
        'core/separator',
        [
            'name'  => 'separator-75',
            'label' => '75% Width'
        ]
    );

    register_block_style(
        'core/separator',
        [
            'name'  => 'separator-100',
            'label' => '100% Width'
        ]
    );
}
add_action('init', 'custom_separator_styles');



/* ==================================================================== */
/* ==================================================================== */
/* REGISTERING CUSTOM PATTERN CATEGORY */
/* ==================================================================== */
/* ==================================================================== */

function register_custom_category() {
    $text_domain = get_stylesheet();

    register_block_pattern_category(
        'custom',
        array( 'label' => __( '(1) VSB', $text_domain ) )
    );
    
}
add_action( 'init', 'register_custom_category' );



/* ==================================================================== */
/* REGISTERING CUSTOM PATTERNS */
/* ==================================================================== */

function register_custom_patterns() {
    $patterns_dir = get_stylesheet_directory() . '/patterns/';
    
    if (is_dir($patterns_dir)) {
        $files = scandir($patterns_dir);
        
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'html') {
                $pattern_name = pathinfo($file, PATHINFO_FILENAME);
                $pattern_title = str_replace('Vsb', 'VSB', ucwords(str_replace('-', ' ', $pattern_name))); // Convert filename to title

                register_block_pattern(
                    'mytheme/' . $pattern_name, // Change 'mytheme' to your theme name
                    array(
                        'title'       => $pattern_title,
                        'description' => 'Custom pattern for ' . $pattern_title,
                        'categories'  => array('custom'), // Ensure 'custom' category exists
                        'content'     => file_get_contents($patterns_dir . $file),
                    )
                );
            }
        }
    }
}
add_action('init', 'register_custom_patterns');



/* ==================================================================== */
/* ==================================================================== */
/* CUSTOM WPFORM TEMPLATES */
/* ==================================================================== */
/* ==================================================================== */


/* ==================================================================== */
/* SIMPLE CONTACT FORM */
/* ==================================================================== */
if ( class_exists( 'WPForms_Template', false ) ) :
/**
 * VSB Simple Contact Form
 * Template for WPForms.
 */
class WPForms_Template_vsb_simple_contact_form extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'VSB Simple Contact Form';

		// Template slug
		$this->slug = 'vsb_simple_contact_form';

		// Template description
		$this->description = '';

		// Template field and settings
		$this->data = array (
	'fields' => array (
		1 => array (
			'id' => '1',
			'type' => 'name',
			'label' => 'Name',
			'format' => 'first-last',
			'required' => '1',
			'size' => 'large',
		),
		2 => array (
			'id' => '2',
			'type' => 'email',
			'label' => 'Email',
			'required' => '1',
			'size' => 'medium',
			'placeholder' => 'email@domain.com',
			'default_value' => false,
		),
		5 => array (
			'id' => '5',
			'type' => 'phone',
			'label' => 'Phone (Optional)',
			'format' => 'us',
			'size' => 'medium',
			'placeholder' => '777-888-9999',
		),
		3 => array (
			'id' => '3',
			'type' => 'textarea',
			'label' => 'Comment or Message',
			'size' => 'medium',
			'limit_count' => '1',
			'limit_mode' => 'characters',
		),
		6 => array (
			'id' => '6',
			'type' => 'radio',
			'label' => 'How would you like us to reach back out to you?',
			'choices' => array (
				1 => array (
					'default' => '1',
					'label' => 'Email',
					'icon' => 'envelope-open-text',
					'icon_style' => 'solid',
				),
				2 => array (
					'label' => 'Phone',
					'icon' => 'phone',
					'icon_style' => 'solid',
				),
				3 => array (
					'label' => 'Email & Phone',
					'icon' => 'arrows-left-right',
					'icon_style' => 'solid',
				),
			),
			'choices_images_style' => 'modern',
			'choices_icons' => '1',
			'choices_icons_color' => '#1d4ed8',
			'choices_icons_size' => 'small',
			'choices_icons_style' => 'modern',
			'input_columns' => 'inline',
		),
	),
	'field_id' => 9,
	'settings' => array (
		'form_title' => 'VSB Simple Contact Form',
		'submit_text' => 'Submit',
		'submit_text_processing' => 'Sending...',
		'ajax_submit' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'notification_name' => 'Default Notification',
				'email' => '{admin_email}',
				'subject' => 'New Entry: Simple Contact Form',
				'sender_name' => 'Template Vault.',
				'sender_address' => '{admin_email}',
				'replyto' => '{field_id="2"}',
				'message' => '{all_fields}',
				'enable' => '1',
				'file_upload_attachment_fields' => array (
				),
				'entry_csv_attachment_entry_information' => array (
				),
				'entry_csv_attachment_file_name' => 'entry-details',
			),
		),
		'confirmations' => array (
			1 => array (
				'name' => 'Default Confirmation',
				'type' => 'message',
				'message' => '<p>Thanks for contacting us! We will be in touch with you shortly.</p>',
				'message_scroll' => '1',
				'message_entry_preview_style' => 'basic',
			),
		),
		'antispam_v3' => '1',
		'store_spam_entries' => '1',
		'anti_spam' => array (
			'time_limit' => array (
				'enable' => '1',
				'duration' => '2',
			),
			'filtering_store_spam' => '1',
			'country_filter' => array (
				'action' => 'allow',
				'country_codes' => array (
				),
				'message' => 'Sorry, this form does not accept submissions from your country.',
			),
			'keyword_filter' => array (
				'message' => 'Sorry, your message can\'t be submitted because it contains prohibited words.',
			),
		),
		'form_tags' => array (
		),
	),
	'search_terms' => '',
	'providers' => array (
		'constant-contact-v3' => array (
		),
	),
	'meta' => array (
		'template' => 'vsb_simple_contact_form',
	),
);
	}
}
new WPForms_Template_vsb_simple_contact_form();
endif;




/* ==================================================================== */
/* ==================================================================== */
/* MISCELLANEOUS CODE */
/* ==================================================================== */
/* ==================================================================== */
