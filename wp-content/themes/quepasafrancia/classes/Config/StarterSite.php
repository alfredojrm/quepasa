<?php

namespace Gradiweb\Config;

use Gradiweb\Config\Assets;
use Gradiweb\Config\CustomFunctions;
use Gradiweb\Config\Customize;
use Gradiweb\Config\CustomPostTypes;
use Gradiweb\Config\Plugins;
use Gradiweb\Config\SettingsPage;
use Gradiweb\Config\Shortcodes;
use Gradiweb\Config\SVGSupport;
use Gradiweb\Config\Widgets;
use Timber\Menu;
use Timber\Site;


/**
 * Timber init class
 * Inspired from https://github.com/timber/starter-theme
 *
 * @package  Gradi-Theme
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Site
{
    /** Add timber support. */
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'themeSupports'));
        add_filter('timber/context', array($this, 'addToContext'));
        add_filter('timber/twig', array($this, 'addToTwig'));
        add_action('init', array($this, 'registerLanguages'));
        add_action('init', array($this, 'registerNavMenus'));

        new Assets();
        new SettingsPage();
        new SVGSupport();
        new Plugins();
        new Customize();
        new CustomTaxonomies();
        new CustomPostTypes();
        new CustomAjax();
        new Shortcodes();
        new Widgets();
        parent::__construct();
    }

    public function registerLanguages()
    {
        load_theme_textdomain('gradi-theme', get_stylesheet_directory_uri() . '/languages');
    }

    public function registerNavMenus()
    {
        register_nav_menus(
            array(
                'top-menu' => __('Primary', 'gradi-theme'),
                'footer-menu' => __('Footer', 'gradi-theme'),
            )
        );
    }

    public function themeSupports()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );

        add_theme_support('menus');

        add_theme_support(
            'custom-logo',
            array(
                'width' => 250,
                'height' => 40,
                'flex-width' => false,
                'flex-height' => false,
                'header-text' => array('site-title'),
            )
        );

        add_filter('use_block_editor_for_post', '__return_false', 10);
        add_filter('use_widgets_block_editor', '__return_false');

        add_filter('wpseo_metabox_prio', function () {
            return 'low';
        });
    }

    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}.
     */
    public function addToContext($context)
    {
        $context['foo'] = 'bar';
        $context['stuff'] = 'I am a value set in your functions.php file';
        $context['notes'] = 'These values are available everytime you call Timber::context();';
        $context['main_menu'] = new Menu('top-menu');
        $context['footer_menu'] = new Menu('footer-menu');
        $context['logo'] = $this->getLogo();
        $context['site'] = $this;
        return $context;
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function addToTwig($twig)
    {        
        $twig->addExtension(new \Twig\Extension\StringLoaderExtension());
        $utilities = new Utilities;
        $twig->addFunction( new \Timber\Twig_Function( 'auxGetField', array($utilities, 'auxGetField') ) );
        $twig->addFunction( new \Timber\Twig_Function( 'getFirstCategory', array($utilities, 'getFirstCategory') ) );
        return $twig;
    }

    public function getLogo()
    {
        if (function_exists('the_custom_logo')) {
            if (has_custom_logo()) {
                $logo = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($logo, 'full');
                $image_url = $image[0];
                return $image_url;
            } else {
                $site_title = get_bloginfo('name');
                return $site_title;
            }
        }
    }
}
