<?php
/**
 * Template Name: About Page
 * @package  Gradi-Theme
 * @subpackage  Timber
 * @since   Timber 0.1
 */
use Timber\Timber;
use Timber\Post;

$context          = Timber::context();
$context['page'] = new Post();
Timber::render( 'pages/about.twig' , $context );