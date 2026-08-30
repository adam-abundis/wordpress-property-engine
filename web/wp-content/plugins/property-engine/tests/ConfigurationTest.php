<?php

use PHPUnit\Framework\TestCase;
use PropertyEngine\PostTypes\Property;
use PropertyEngine\Taxonomies\Taxonomies;
use PropertyEngine\Fields\ListingFields;

class ConfigurationTest extends TestCase {

    public function test_property_uses_custom_capability_type() {
        $args = ( new Property() )->get_args();
        $this->assertSame( 'property', $args['capability_type'] );
    }

    public function test_property_supports_custom_fields() {
        $args = ( new Property() )->get_args();
        $this->assertContains( 'custom-fields', $args['supports'] );
    }

    public function test_property_is_shown_in_rest() {
        $args = ( new Property() )->get_args();
        $this->assertTrue( $args['show_in_rest'] );
    }

    public function test_location_taxonomy_is_hierarchical() {
        $args = ( new Taxonomies() )->get_args();
        $this->assertTrue( $args['location']['hierarchical'] );
    }

    public function test_property_type_taxonomy_is_flat() {
        $args = ( new Taxonomies() )->get_args();
        $this->assertFalse( $args['property-type']['hierarchical'] );
    }

    public function test_all_meta_fields_have_sanitize_callback() {
        $args = ( new ListingFields() )->get_args();

        foreach ( $args as $field_key => $field_args ) {
            $this->assertArrayHasKey( 'sanitize_callback', $field_args, "$field_key is missing a sanitize_callback" );
        }
    }
}
