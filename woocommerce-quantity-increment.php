<?php
/*
Plugin Name: WooCommerce Quantity Increment
Plugin URI:
Description: A plugin to allow custom quantity incrememnts per product
Version: 1.0
Author: Nick Bibby
Author URI: https://paramountdigital.co.uk
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: woocommerce-qi
WC requires at least: 3.0.0
WC tested up to: 3.3.5

wooCommerce Quantity Increment. A Plugin that works with the WooCommerce plugin for WordPress.
Copyright (C) 2017 Paramount Digital

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.
*/
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	class woo_qi {

    /**
     * The Constructor!
     */
    public function __construct() {
      $this->qi_class_loader();
    }

    /**
     * Add the classes that make the magic
     */
    function qi_class_loader() {
      require_once trailingslashit( dirname( __FILE__ ) ) . 'classes/class-qi-admin.php';
      require_once trailingslashit( dirname( __FILE__ ) ) . 'classes/class-qi-frontend.php';
    }

  } // END class woo_qi

	// Instantiate the class
	$woo_qi = new woo_qi();

endif; // If WC is active
