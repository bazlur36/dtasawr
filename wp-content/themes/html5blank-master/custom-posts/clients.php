<?php
add_action('init', 'service_custom_post_types');
function service_custom_post_types() {
	$labels = array(
			'name' => _x('Services', 'post type general name'),
			'singular_name' => _x('Service', 'post type singular name'),
			'add_new' => _x('Add New', 'service'),
			'add_new_item' => __('Add New Service'),
			'edit_item' => __('Edit Service'),
			'new_item' => __('New Service'),
			'view_item' => __('View Service'),
			'search_items' => __('Search Service'),
			'not_found' =>  __('No services found'),
			'not_found_in_trash' => __('No services found in Trash'),
			'parent_item_colon' => ''
	);
	$args = array(
			'labels' => $labels,
			'menu_position' => 30,
			'public' => true,
			'query_var' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'rewrite' => array( 'slug' => 'provider', 'with_front' => false ),
			//'taxonomies' => array( 'post_tag', 'category'),

	);
	register_post_type('service',$args);
};

add_action( 'add_meta_boxes', 'service_meta_box_add' );
function service_meta_box_add()
{
	add_meta_box( 'meta-box-service', 'Service Fields', 'service_meta_box_service', 'service', 'normal', 'high' );
}

function service_meta_box_service()
{
	// $post is already set, and contains an object: the WordPress post
	global $post;
	
	
	
	$values = get_post_custom( $post->ID );
		
	$service_slogan = isset( $values['service_slogan'] ) ? $values['service_slogan'][0] : '';
	$service_intro = isset( $values['service_intro'] ) ? $values['service_intro'][0] : '';
	$service_logo = isset( $values['service_logo'] ) ? $values['service_logo'][0] : '';
	
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'service_meta_box_nonce', 'meta_box_nonce' );
	?>
<p>
	<label for="service_slogan">Service slogan</label>
	<input type="text" name="service_slogan" id="service_slogan" value="<?php echo $service_slogan; ?>" />
</p>

<p>
	<label for="service_intro">Service intro</label> <input type="text"
		name="service_intro" id="$service_intro"
		value="<?php echo $service_intro; ?>" />
</p>


<?php

}
add_action( 'save_post', 'service_meta_box_save' );
function service_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'service_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array(
			'a' => array( // on allow a tags
					'href' => array() // and those anchors can only have href attribute
			)
	);

	// Make sure your data is set before trying to save it
	if( isset( $_POST['service_slogan'] ) )
		update_post_meta( $post_id, 'service_slogan', wp_kses( $_POST['service_slogan'], $allowed ) );
	
	if( isset( $_POST['service_intro'] ) )
		update_post_meta( $post_id, 'service_intro', wp_kses( $_POST['service_intro'], $allowed ) );
	
	

}
