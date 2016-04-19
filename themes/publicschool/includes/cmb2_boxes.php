<?php

require_once('cmb2/show_on_child_metabox.php');

add_action( 'cmb2_admin_init', 'cmb2_video_metaboxes' );

function cmb2_video_metaboxes() {
    // Start with an underscore to hide fields from custom fields list
    $prefix = 'publicschool_';

    $galleriesPageId = get_id_by_slug('video-galleries');

    /**
     * Initiate the Copy metabox
     */
    $cmb_gallery = new_cmb2_box( array(
        'id'            => 'gallery_video_ids',
        'title'         => __( 'Gallery Videos', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_on' => array( 'key' => 'child_of', 'value' => array( $galleriesPageId ) ),
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));      

    // Regular text field
    $cmb_gallery->add_field( array(
        'name'       => __( 'Ids', 'cmb2' ),
        'desc'       => __( 'Please enter a comma separated list of IDs', 'cmb2' ),
        'id'         => $prefix . 'video_ids',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    )); 

    /**
     * Initiate the Copy metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'video_metabox',
        'title'         => __( 'Video Urls', 'cmb2' ),
        'object_types'  => array( 'video' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    )); 

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Desktop URL', 'cmb2' ),
        'desc'       => __( 'Please enter desktop video url', 'cmb2' ),
        'id'         => $prefix . 'desktop_url',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));     

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Mobile URL', 'cmb2' ),
        'desc'       => __( 'Please enter mobile video url', 'cmb2' ),
        'id'         => $prefix . 'mobile_url',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));    

    $cmb2 = new_cmb2_box( array(
        'id'            => 'video_poster_metabox',
        'title'         => __( 'Poster Image', 'cmb2' ),
        'object_types'  => array( 'video' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'open'     => true // Keep the metabox closed by default
    ));    

    $cmb2->add_field( array(
        'name'    => 'Poster Image',
        'desc'    => 'Upload an image that will show as the video poster.',
        'id'      => $prefix . 'video_poster',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add Poster Image' // Change upload button text. Default: "Add or Upload File"
        ),
    ));           
}