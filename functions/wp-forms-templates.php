<?php
/* This file is to store custom wpform templates so they are automatically available in all websites */

/* ==================================================================== */
/* ==================================================================== */
/* SIMPLE CONTACT FORM */
/* ==================================================================== */
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
	