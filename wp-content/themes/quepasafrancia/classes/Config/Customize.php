<?php
namespace Gradiweb\Config;

class Customize
{
    public function __construct()
    {
        /** Enganchamos las opciones del personalizador */
        add_action('customize_register', array($this, "themeCustomizerAdditions"));
    }

    public function themeCustomizerAdditions($wp_customize)
    {
        /** Agregamos la sección de datos de contacto */
        $wp_customize->add_section('gradiweb_base_theme_contact_data', [
            'priority' => 160,
            'title' => __('Contact data', 'gradiweb_base_theme'),
            'panel' => '',
            'capability' => 'edit_theme_options',
        ]);

        /** Agregamos la sección de info para reCaptcha */
        $wp_customize->add_section('gradiweb_base_theme_recaptcha_data', [
            'priority' => 161,
            'title' => __('Google reCaptcha data', 'gradiweb_base_theme'),
            'panel' => '',
            'capability' => 'edit_theme_options',
        ]);

        /*
         * Agregamos todas las opciones que el theme debe manejar
         */

        /** Añadimos la opción para especificar la dirección */
        $wp_customize->add_setting('gradiweb_base_theme_direccion', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        /** Añadimos la opción para especificar el teléfono */
        $wp_customize->add_setting('gradiweb_base_theme_telefono', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        /** Añadimos la opción para especificar el correo */
        $wp_customize->add_setting('gradiweb_base_theme_email', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_email',
        ));

        /** Añadimos la opción para especificar el API Key de reCaptcha */
        $wp_customize->add_setting('gradiweb_base_theme_recaptcha_apikey', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_key',
        ));

        /** Añadimos la opción para especificar el secret de reCaptcha */
        $wp_customize->add_setting('gradiweb_base_theme_recaptcha_secret', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        /*
         * Ahora añadimos los controles para esas secciones
         */

        /** Añadimos la opción para especificar la dirección */
        $wp_customize->add_control('gradiweb_base_theme_direccion', array(
            'type' => 'text',
            'priority' => 0,
            'section' => 'gradiweb_base_theme_contact_data',
            'label' => __('Address', 'gradiweb_base_theme'),
            'description' => __('Writte the company address', 'gradiweb_base_theme'),
            'input_attrs' => array(
                'placeholder' => __('Example: Cra 1 #1-01, Bogotá', 'gradiweb_base_theme'),
            ),
        ));

        /** Añadimos la opción para especificar el teléfono */
        $wp_customize->add_control('gradiweb_base_theme_telefono', array(
            'type' => 'tel',
            'priority' => 1,
            'section' => 'gradiweb_base_theme_contact_data',
            'label' => __('Phone number', 'gradiweb_base_theme'),
            'description' => __('Writte the company phone number', 'gradiweb_base_theme'),
            'input_attrs' => array(
                'placeholder' => __('Example: +57 1 999 5522', 'gradiweb_base_theme'), //TODO: Verificar cuales caracteres admite un campo tel, si no, dejar como text
            ),
        ));

        /** Añadimos la opción para especificar el correo */
        $wp_customize->add_control('gradiweb_base_theme_email', array(
            'type' => 'email',
            'priority' => 2,
            'section' => 'gradiweb_base_theme_contact_data',
            'label' => __('Email', 'gradiweb_base_theme'),
            'description' => __('Writte the company email', 'gradiweb_base_theme'),
            'input_attrs' => array(
                'placeholder' => __('Example: info@gradiweb.com', 'gradiweb_base_theme'),
            ),
        ));

        /** Añadimos la opción para especificar el API Key de reCaptcha */
        $wp_customize->add_control('gradiweb_base_theme_recaptcha_apikey', array(
            'type' => 'text',
            'priority' => 0,
            'section' => 'gradiweb_base_theme_recaptcha_data',
            'label' => __('reCaptcha API Key', 'gradiweb_base_theme'),
            'description' => sprintf(__('Writte the api key obtained from google, to gat an API key go to <a href="%s" target="_blank" rel="no-follow">here</a>', 'gradiweb_base_theme'), 'https://g.co/recaptcha/v3'),
            'input_attrs' => array(
                'placeholder' => __('reCaptcha V3 API Key', 'gradiweb_base_theme'),
            ),
        ));

        /** Añadimos la opción para especificar el correo */
        $wp_customize->add_control('gradiweb_base_theme_recaptcha_secret', array(
            'type' => 'text',
            'priority' => 1,
            'section' => 'gradiweb_base_theme_recaptcha_data',
            'label' => __('reCaptcha secret', 'gradiweb_base_theme'),
            'description' => __('Writte the reCaptcha secret obtained from Google reCaptcha', 'gradiweb_base_theme'),
            'input_attrs' => array(
                'placeholder' => __('reCaptcha V3 Secret', 'gradiweb_base_theme'),
            ),
        ));
    }
}
