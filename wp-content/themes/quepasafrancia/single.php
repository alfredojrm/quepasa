<?php
/**
 *
 * @package  Gradi-Theme
 * @subpackage  Timber
 * @since   Timber 0.1
 */
use Timber\Timber;
use Timber\Post;

$context          = Timber::context();
$context['post'] = new Post();
Timber::render( 'pages/single.twig' , $context );