<?php
/**
 *
 * @category BeastTV
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


add_action( 'cmb2_init', 'beast_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function beast_register_demo_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_beast_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$beast_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'page','post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		) );

	$beast_demo->add_field( array(
		'name' => __( 'Test Text', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'text',
		'type' => 'text_small',
		// 'repeatable' => true,
		) );


// here we start the real ones. Remove only the 2 above.


	$beast_portfolio = new_cmb2_box( array(
		'id'            => $prefix . 'client-metabox',
		'title'         => __( 'Client Info', 'cmb2' ),
		'object_types'  => array('portfolio'), // Post type
		'context'       => 'side',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		) );
	$beast_portfolio->add_field( array(
		'name'     => __( 'Client name', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'client',
		'type'     => 'text',
		'on_front' => false,
		) );



	$beast_user_city = new_cmb2_box( array(
		'id'            => $prefix . 'user_city',
		'title'         => __( 'Cities', 'cmb2' ),
		'object_types'  => array('user'), // Post type
		'context'       => 'side',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		) );

	$beast_user_city->add_field( array(
		'name'     => __( 'Portfolio details for Editor', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'user_info',
		'type'     => 'title',
		'on_front' => false,
		) );


// get CPTonomy "city" term list to populate option array
// don't use a CMB 'taxonomy', it won't work in this case.
	$taxonomy_args = array(
		'hide_empty' => false,
		);
	$city_terms = get_terms( 'city', $taxonomy_args );
	$city_term_array = array();
	foreach($city_terms as $city_object){
		$city_term_array[$city_object->term_id] = $city_object->name;
	}

	$beast_user_city->add_field( array(
		'name'     => __( 'Cities', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'user_cities',
		'type'     => 'multicheck',
		'options' =>  $city_term_array,
		) );



	$beast_user_city->add_field( array(
		'name' => __( 'Editor Portfolio Title Image', 'cmb2' ),
		'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'user_image',
		'type' => 'file',
	) );


}

