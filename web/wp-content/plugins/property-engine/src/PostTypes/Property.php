<?php

namespace PropertyEngine\PostTypes;

class Property {
  public function register() {
    add_action( 'init', [ $this, 'register_post_type' ] );
  }

  public function get_args(): array {
    return [
        'public'          => true,
        'show_in_rest'    => true,
        'supports'        => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'capability_type' => [ 'property', 'properties' ],
        'map_meta_cap'    => true,
        'capabilities'    => [
          'create_posts'  => 'edit_properties',
        ],
        'label'          => 'Properties',
    ];
  }

  public function register_post_type() {
      register_post_type( 'property', $this->get_args() );
  }
}
