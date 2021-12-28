<?php

namespace Gradiweb\Config;

use Timber\Timber;

class CustomAjax
{
    public function __construct()
    {
        //add_action('wp_ajax_nopriv_ajax_custom_ajax', array($this, 'customAjaxFunction'));
        //add_action('wp_ajax_ajax_custom_ajax', array($this, 'customAjaxFunction'));
    }

    public function customAjaxFunction()
    {
    }
}
