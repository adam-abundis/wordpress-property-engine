<?php

namespace PropertyEngine\Fields;

class ListingFields {

    public function register() {
        add_action( 'init', [ $this, 'register_meta' ] );
    }

    public function get_args(): array {
        $auth_callback = function( $allowed, $meta_key, $post_id ) {
            return current_user_can( 'edit_post', $post_id );
        };

        return [
            'pe_price' => [
                'type'              => 'integer',
                'single'            => true,
                'show_in_rest'      => true,
                'sanitize_callback' => 'absint',
                'auth_callback'     => $auth_callback,
            ],
            'pe_bedrooms' => [
                'type'              => 'integer',
                'single'            => true,
                'show_in_rest'      => true,
                'sanitize_callback' => 'absint',
                'auth_callback'     => $auth_callback,
            ],
            'pe_bathrooms' => [
                'type'              => 'number',
                'single'            => true,
                'show_in_rest'      => true,
                'sanitize_callback' => [ $this, 'sanatize_bathrooms' ],
                'auth_callback'     => $auth_callback,
            ],
            'pe_square_feet' => [
                'type'              => 'integer',
                'single'            => true,
                'show_in_rest'      => true,
                'sanitize_callback' => 'absint',
                'auth_callback'     => $auth_callback,
            ],
        ];
    }

    public function register_meta() {
        foreach ( $this->get_args() as $meta_key => $args ) {
            register_meta( 'property', $meta_key, $args );
        }
    }

    public function sanatize_bathrooms( $value ) {
        $value = (float) $value;
        return $value < 0 ? 0 : $value;
    }
}
