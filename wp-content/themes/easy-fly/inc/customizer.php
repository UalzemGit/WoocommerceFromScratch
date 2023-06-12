<?php

/**
 * Easy Fly Theme Customizer
 * @package Easy Fly
 */

function easy_fly_customizer($wp_customize)
{

    // Home Page Settings:
    $wp_customize->add_section(
        'sec_home_page',
        array(
            'title'            => 'Home Page Products/Blog Settings',
            'description'    => 'Home Page Section'
        )
    );


    // Deal of the Week Checkbox ( SE VAI TER A SEÇÃO OU NÃO):
    $wp_customize->add_setting(
        'set_deal_show',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'easy_fly_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'set_deal_show',
        array(
            'label' => 'Show Deal of the Week ?',
            'section' => 'sec_home_page',
            'type' => 'checkbox'
        )
    );




    // Deal of the Week Product ID:
    $wp_customize->add_setting(
        'set_deal',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_deal',
        array(
            'label' => 'Deal of the Week Product ID',
            'description' => 'Product ID to display',
            'section' => 'sec_home_page',
            'type' => 'number'
        )
    );

    // BLOG TITLE:
    $wp_customize->add_setting(
        'set_blog_title',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_blog_title',
        array(
            'label' => 'Blog Section Title',
            'description' => 'Blog Section Title',
            'section' => 'sec_home_page',
            'type' => 'text'
        )
    );
}

add_action('customize_register', 'easy_fly_customizer');

// FUNÇÃO SANITIZADORA PARA O CHECKBOX DE DEAL OF THE WEEK:
function easy_fly_sanitize_checkbox($checked)
{
    return ((isset($checked) && true == $checked) ? true : false);
}
