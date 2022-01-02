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
$category = get_queried_object();
$context['fields'] = get_fields('term_'.$category->term_id);

Timber::render( 'pages/category.twig' , $context );