<?php

use PHPUnit\Framework\TestCase;
use PropertyEngine\Fields\ListingFields;

class AuthCallbackTest extends TestCase {

    public function test_all_meta_fields_have_a_real_auth_callback() {
        $args = ( new ListingFields() )->get_args();

        foreach ( $args as $field_key => $field_args ) {
            $this->assertInstanceOf(
                \Closure::class,
                $field_args['auth_callback'],
                "$field_key's auth_callback is not a real function, check it wasn't replaced with __return_true"
            );
        }
    }
}
