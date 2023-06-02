<?php

function theme_customize_register($wp_customize)
{
    /*
     * Front Page Hero Image
     */
    $wp_customize->add_section('theme_frontpage_hero_section', [
        'title' => __('Frontpage – Hero image', 'theme'),
        'description' => __(
            'Customize the front page hero image section',
            'theme'
        ),
        'priority' => 50,
    ]);

    // Front Page Title Setting and Control
    $wp_customize->add_setting('theme_frontpage_title', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('theme_frontpage_title_control', [
        'label' => __('The title on hero image', 'theme'),
        'section' => 'theme_frontpage_hero_section',
        'settings' => 'theme_frontpage_title',
        'type' => 'text',
    ]);

    /*
     * Background Image Setting and Control
     */
    $wp_customize->add_setting('theme_background_image', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'theme_background_image_control',
            [
                'label' => __('Hero image', 'theme'),
                'section' => 'theme_frontpage_hero_section',
                'settings' => 'theme_background_image',
            ]
        )
    );

    /**
     * About Section under the hero image
     */
    $wp_customize->add_section('theme_frontpage_about_section', [
        'title' => __('Frontpage – About section', 'theme'),
        'description' => __(
            'Customize the About section (under hero image)',
            'theme'
        ),
        'priority' => 51,
    ]);

    $wp_customize->add_setting('theme_frontpage_about_title', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control(
        'theme_frontpage_about_title_control',
        [
            'label' => __('Title in About section', 'theme'),
            'section' => 'theme_frontpage_about_section',
            'settings' => 'theme_frontpage_about_title',
            'type' => 'text',
        ]
    );

    $wp_customize->add_setting('theme_frontpage_about_body', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('theme_frontpage_about_body_control', [
        'label' => __('Body text in About section', 'theme'),
        'section' => 'theme_frontpage_about_section',
        'settings' => 'theme_frontpage_about_body',
        'type' => 'textarea',
    ]);

    /**
     * Select featured reference
     */
    // Add a new section for Featured Reference
    $wp_customize->add_section('references_section', [
        'title' => 'Frontpage – References section',
        'priority' => 52,
        'description' =>
            'Customize the References section: Choose title and introduction text. Choose the reference that is showcased in frontpage',
    ]);

    $wp_customize->add_setting('references_section_title', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('references_section_title_control', [
        'label' => __('Title of References section', 'theme'),
        'section' => 'references_section',
        'settings' => 'references_section_title',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('references_section_body', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('references_section_body_control', [
        'label' => __('Introduction of References section', 'theme'),
        'section' => 'references_section',
        'settings' => 'references_section_body',
        'type' => 'textarea',
    ]);

    // Add a setting for Featured Reference ID
    $wp_customize->add_setting('featured_reference_id', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    // Add a control for selecting the Featured Reference
    $wp_customize->add_control('featured_reference_control', [
        'label' => 'Choose the showcased reference',
        'type' => 'select',
        'section' => 'references_section',
        'settings' => 'featured_reference_id',
        'choices' => get_reference_choices(), // Function to retrieve reference choices
    ]);

    /**
     * Contact us Section
     */
    $wp_customize->add_section('theme_contact_us', [
        'title' => __('Frontpage – Contact us', 'theme'),
        'description' => __(
            'Change shortlink of the Contact Us form',
            'theme'
        ),
        'priority' => 55,
    ]);
    $wp_customize->add_setting('theme_contact_us_link', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('theme_contact_us_link_control', [
        'label' => __(
            'Paste the shortlink of the form here',
            'theme'
        ),
        'section' => 'theme_contact_us',
        'settings' => 'theme_contact_us_link',
        'type' => 'textarea',
    ]);

    /**
     * Footer
     */
    $wp_customize->add_section('theme_footer', [
        'title' => __('Footer', 'theme'),
        'description' => __('Customize footer', 'theme'),
        'priority' => 57,
    ]);

    // Copyright-teksti
    $wp_customize->add_setting('theme_footer_copyright', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('theme_footer_copyright_control', [
        'label' => __('Copyright text', 'theme'),
        'section' => 'theme_footer',
        'settings' => 'theme_footer_copyright',
        'type' => 'text',
    ]);

    // 2. kolumnin sisältö
    $wp_customize->add_setting('theme_footer_column_2_title', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control(
        'theme_footer_column_2_title_control',
        [
            'label' => __('Title of the 2nd column', 'theme'),
            'section' => 'theme_footer',
            'settings' => 'theme_footer_column_2_title',
            'type' => 'text',
        ]
    );

    $wp_customize->add_setting('theme_footer_column_2_body', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('theme_footer_column_2_body_control', [
        'label' => __('Body text of the 2nd column', 'theme'),
        'section' => 'theme_footer',
        'settings' => 'theme_footer_column_2_body',
        'type' => 'textarea',
    ]);

    // 3. kolumnin sisältö
    $wp_customize->add_setting('theme_footer_column_3_title', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control(
        'theme_footer_column_3_title_control',
        [
            'label' => __('Title of the 3rd column', 'theme'),
            'section' => 'theme_footer',
            'settings' => 'theme_footer_column_3_title',
            'type' => 'text',
        ]
    );

    $wp_customize->add_setting('theme_footer_column_3_body', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('theme_footer_column_3_body_control', [
        'label' => __('Body text of the 3rd column', 'theme'),
        'section' => 'theme_footer',
        'settings' => 'theme_footer_column_3_body',
        'type' => 'textarea',
    ]);
}
add_action('customize_register', 'theme_customize_register');

// Function to retrieve reference choices
function get_reference_choices()
{
    $references = get_posts(['post_type' => 'references']);
    $choices = ['' => 'None']; // Default "None" option

    foreach ($references as $reference) {
        $choices[$reference->ID] = get_the_title($reference->ID);
    }

    return $choices;
}

?>
