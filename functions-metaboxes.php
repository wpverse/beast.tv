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

	$beast_sales_contact = new_cmb2_box( array(
		'id'            => $prefix . 'sales-contact',
		'title'         => __( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'sales-contact' ), // Post type
		'context'       => 'side',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		) );

	$beast_sales_contact->add_field( array(
		'name' => __( 'Contact order', 'cmb2' ),
		'desc' => __( 'Assign a priority number to reorder Sales Contacts', 'cmb2' ),
		'id'   => $prefix . 'sales_contact_order',
		'type' => 'text_small',
		// 'repeatable' => true,
		) );





	$beast_slides = new_cmb2_box( array(
		'id'            => $prefix . 'slides-metabox',
		'title'         => __( 'Slide Options', 'cmb2' ),

		'object_types'  => array('home-slides'), // Post type
		'context'       => 'normal',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
		) );
	$beast_slides->add_field( array(
		'name' => 'Instructions',
		'desc' => 'You may add a link to the slide title or provide a Vimeo url to pop up a lightbox when the title is clicked on. If both are filed out, only the the lightbox link will be used',
		'type' => 'title',
		'id'   => 'wiki_test_title'
		) );
	$beast_slides->add_field( array(
		'name'     => __( 'Link slide title to:', 'cmb2' ),
		'desc'     => __( 'Privide a custom link for the title.', 'cmb2' ),
		'id'       => $prefix . 'home_link',
		'type'     => 'text',
		'on_front' => false,
		) );




	$beast_portfolio = new_cmb2_box( array(
		'id'            => $prefix . 'client-metabox',
		'title'         => __( 'Client Info', 'cmb2' ),
		'object_types'  => array('portfolio'), // Post type
		'context'       => 'side',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left

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



	$beast_city_image = new_cmb2_box( array(
		'id'            => $prefix . 'user_city_image',
		'title'         => __( 'Additional Image', 'cmb2' ),
		'object_types'  => array('city'), // Post type
		'context'       => 'side',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		) );

	$beast_city_image->add_field( array(
		'name'     => __( 'Hover featured image', 'cmb2' ),
		'desc'     => __( '', 'cmb2' ),
		'id'       => $prefix . 'hover_image',
		'type'     => 'file',
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

