<?php

namespace Gradiweb\Config;

use Gradiweb\Config\CustomFunctions;
use Timber\Timber;
use Timber\Post;

class Shortcodes
{
  public function __construct()
  {
    add_shortcode('hero-carousel', array($this, 'heroCarousel'));
    add_shortcode('posts-recientes', array($this, 'homeNewestPosts'));
  }

  public function heroCarousel()
  {
    
  }
  public function homeNewestPosts()
  {
    $posts = new \WP_Query(array(
      'post_type' => 'post',
      'limit'=> 3,
      'orderBy' => 'date',
      'order' => 'DESC'
    ));

    $context = Timber::context();
    $context['newestPosts'] = Timber::get_posts($posts);
    Timber::render('sections/newest-posts.twig', $context);
  }
}
