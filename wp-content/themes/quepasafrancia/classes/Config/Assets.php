<?php

namespace Gradiweb\Config;

class Assets
{
  public function __construct()
  {
    add_action('wp_enqueue_scripts', array($this, 'registerStyles'));
    add_action('wp_enqueue_scripts', array($this, 'registerScripts'));
  }

  public function registerStyles()
  {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('styles-theme', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), '1.0.0', 'all');
  }

  public function registerScripts()
  {
    //wp_register_script('script', get_template_directory_uri() . '/dist/js/script.js', array(), '1.0.0', true);
    wp_enqueue_script('script');
  }
}
