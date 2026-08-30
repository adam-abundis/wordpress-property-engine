<?php

namespace PropertyEngine\Taxonomies;

class Taxonomies {
    public function register() {
        add_action('init', [ $this, 'register_taxonomies' ] );
    }

    public function get_args(): array {
        return [
            'location' => [
                 'hierarchical' => true,
                 'show_in_rest' => true,
                 'label'        => 'Locations',
            ],
            'property-type' => [
                'hierarchical' => false,
                'show_in_rest' => true,
                'label'        => 'Property Types',
            ],
        ];
    }

    public function register_taxonomies() {
        $args = $this->get_args();
        register_taxonomy( 'location', 'property', $args['location'] );
        register_taxonomy( 'property-type', 'property', $args['property-type'] );
    }
}


