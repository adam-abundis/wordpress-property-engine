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

// Feature classes get instantiated here, one line each, as later issues add them.
