<?php
/**
 * Plugin Name: Property Engine
 * Description: Custom post type, taxonomies, and data fields for real estate listings.
 * Version: 0.1.0
 * Author: Adam Abundis
 * Text Domain: property-engine
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use PropertyEngine\PostTypes\Property;

$property = new Property();
$property->register();

use PropertyEngine\Taxonomies\Taxonomies;

$taxonomies = new Taxonomies();
$taxonomies->register();

use PropertyEngine\Fields\ListingFields;

$listing_fields = new ListingFields();
$listing_fields->register();

register_activation_hook( __FILE__, [ \PropertyEngine\Admin\Roles::class, 'activate' ] );
register_deactivation_hook( __FILE__, [ \PropertyEngine\Admin\Roles::class, 'deactivate' ] );
