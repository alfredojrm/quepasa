<?php

namespace Gradiweb\Config;

class Utilities
{
  public function __construct()
  {
  }

  /**
   * * Aux function to return ACF Repeater or Group field when {{post.meta('field')}} fail
   */
  public static function auxGetField($field, $postId)
  {
    return get_field($field, $postId);
  }

  public static function getFirstCategory($postId){
    $categories = get_the_category($postId);
    return $categories[0];
  }
}
