<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Timber\Timber;
use Gradiweb\Config\StarterSite;

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

new StarterSite();
