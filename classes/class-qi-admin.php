<?php
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

class woo_qi_input {

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
    add_action( 'woocommerce_product_options_inventory_product_data', array( &$this, 'woo_qi_product_fields' ) );
    add_action( 'woocommerce_process_product_meta', array( &$this, 'woo_qi_save_field_input' ) );
  }

  /**
   * Add the custom fields or the qi to the prodcut general tab
   */
  function woo_qi_product_fields() {
    global $woocommerce, $post;

  	echo '<div class="wc_qi_input">';
  		// woo_qi field will be created here.
  		woocommerce_wp_text_input(
  			array(
          'type'        => 'number',
  				'id'          => '_woo_qi_input',
  				'label'       => __( 'Qty Increment', 'woo_qi' ),
  				'placeholder' => '',
  				'desc_tip'    => 'true',
  				'description' => __( 'Enter the quantity increment for this product here.', 'woo_qi' )
  			)
  		);
  	echo '</div>';
  }

  /**
   * Update the database with the new input
   */
   function woo_qi_save_field_input( $post_id ){
    // woo_qi number field
    $woo_qi_input = $_POST['_woo_qi_input'];
    update_post_meta( $post_id, '_woo_qi_input', esc_attr( $woo_qi_input ) );
  }

}
// Instantiate the class
$woo_qi_input = new woo_qi_input();
