<?php

namespace PropertyEngine\Admin;

class Roles {

    public static function activate() {
        $caps = [
            'edit_properties'        => true,
            'edit_property'          => true,
            'edit_others_properties' => true,
            'publish_properties'     => true,
            'delete_properties'      => true,
            'read'                   => true,
        ];

        add_role( 'listing_manager','Listing Manager', $caps );

        $admin = get_role( 'administrator' );
        foreach ( $caps as $cap => $bool ) {
            $admin->add_cap( $cap );
        }
    }

    public static function deactivate() {
        remove_role( 'listing_manager' );
    }
}
