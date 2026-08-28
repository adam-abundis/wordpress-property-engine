<?php

namespace PropertyEngine\Fields;

class ListingFields {

    public function register() {
        add_action( 'init', [ $this, 'register_meta' ] );
    }

    public function register_meta() {
      
        register_post_meta( 'property', 'pe_price', [
            'type'              => 'integer',
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => 'absint',
            'auth_callback'     => function( $allowed, $meta_key, $post_id ) {
                return current_user_can( 'edit_post', $post_id );
            },
        ] );

        register_post_meta( 'property', 'pe_bedrooms', [ 
            'type'              => 'integer',
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => 'absint',
            'auth_callback'     => function( $allowed, $meta_key, $post_id ) {
                return current_user_can( 'edit_post', $post_id );
            },
        ] );

        register_post_meta( 'property', 'pe_bathrooms', [ 
            'type'              => 'number',
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => [ $this, 'sanatize_bathrooms' ],
            'auth_callback'     => function( $allowed, $meta_key, $post_id ) {
                return current_user_can( 'edit_post', $post_id );
            },
        ]);

        register_post_meta( 'property', 'pe_square_feet', [ 
            'type'              => 'integer',
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => 'absint',
            'auth_callback'     => function( $allowed, $meta_key, $post_id ) {
                return current_user_can( 'edit_post', $post_id );
            },
        ] );
    }

    public function sanatize_bathrooms( $value ) {
        $value = (float) $value;
        return $value < 0 ? 0 : $value;
    }   
}
