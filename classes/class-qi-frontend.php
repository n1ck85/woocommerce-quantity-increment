<?php
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

class woo_qi_output {

  /**
   * The Constructor!
   */
  public function __construct() {
    $this->qi_add_actions_filters();
  }

  /**
   * Add actions and filters.
   */
  function qi_add_actions_filters() {
    add_filter( 'woocommerce_quantity_input_args', array( &$this, 'woo_qi_adjust_quantity' ), 10, 2 );
  }

	/**
	 * Render the output
	 */
	 function woo_qi_adjust_quantity( $args, $product ) {
	  global $post;
	  // Check if qi number exists
	  $woo_qi_output = get_post_meta( $post->ID, '_woo_qi_input', true );
	  	// Check if variable or qi number exists
		if( $woo_qi_output ){
			if ( is_singular( 'product' ) ) {
			  //Starting value (we only want to affect product pages, not cart
			  $args['input_value'] 	=  $woo_qi_output;
			}
			$args['min_value'] 	= $woo_qi_output;
			$args['step'] 		= $woo_qi_output; // Quantity steps
			return $args;
		}
		else
		{
			return $args;
		}
    }

}
// Instantiate the class
$woo_qi_output = new woo_qi_output();
