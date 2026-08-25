<?php

namespace PropertyEngine\Taxonomies;

class Taxonomies {
    public function register() {
        add_action('init', [ $this, 'register_taxonomies' ] );
    }
    public function register_taxonomies() {

        register_taxonomy( 'location', 'property', [
            'hierarchical' => true,
            'show_in_rest' => true,
            'label'        => 'Locations',
        ] );

        register_taxonomy( 'property-type', 'property', [
            'hierarchical' => false,
            'show_in_rest' => true,
            'label'        => 'Property Types',
        ] );
    }
}


