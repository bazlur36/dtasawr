<?php
add_action('init', 'jtd_custom_post_types');
function jtd_custom_post_types() {
	$labels = array(
			'name' => _x('Portfolios', 'post type general name'),
			'singular_name' => _x('Portfolio', 'post type singular name'),
			'add_new' => _x('Add New', 'portfolio'),
			'add_new_item' => __('Add New Portfolio'),
			'edit_item' => __('Edit Portfolio'),
			'new_item' => __('New Portfolio'),
			'view_item' => __('View Portfolio'),
			'search_items' => __('Search Portfolio'),
			'not_found' =>  __('No portfolios found'),
			'not_found_in_trash' => __('No portfolios found in Trash'),
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
	register_post_type('portfolio',$args);
};

add_action( 'add_meta_boxes', 'portfolio_meta_box_add' );
function portfolio_meta_box_add()
{
	add_meta_box( 'meta-box-portfolio', 'Portfolio Fields', 'portfolio_meta_box_portfolio', 'portfolio', 'normal', 'high' );
}

function portfolio_meta_box_portfolio()
{
	// $post is already set, and contains an object: the WordPress post
	global $post;
	
	
	
	$values = get_post_custom( $post->ID );
		
	$client_name = isset( $values['portfilio_client_name'] ) ? $values['portfilio_client_name'][0] : '';
	$project = isset( $values['portfilio_project'] ) ? $values['portfilio_project'][0] : '';
	$what_we_did = isset( $values['portfilio_what_we_did'] ) ? $values['portfilio_what_we_did'][0] : '';
	
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
<p>
	<label for="portfilio_client_name">Client Name</label>
	<input type="text" name="portfilio_client_name" id="portfilio_client_name" value="<?php echo $client_name; ?>" />
</p>

<p>
	<label for="portfilio_project">Project</label> <input type="text"
		name="portfilio_project" id="portfilio_project"
		value="<?php echo $project; ?>" />
</p>

<p>
	<label for="portfilio_what_we_did">What we did</label> <input type="text"
		name="portfilio_what_we_did" id="portfilio_what_we_did"
		value="<?php echo $what_we_did; ?>" />
</p>

<?php

}
add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array(
			'a' => array( // on allow a tags
					'href' => array() // and those anchors can only have href attribute
			)
	);

	// Make sure your data is set before trying to save it
	if( isset( $_POST['portfilio_client_name'] ) )
		update_post_meta( $post_id, 'portfilio_client_name', wp_kses( $_POST['portfilio_client_name'], $allowed ) );
	
	if( isset( $_POST['portfilio_project'] ) )
		update_post_meta( $post_id, 'portfilio_project', wp_kses( $_POST['portfilio_project'], $allowed ) );
	
	if( isset( $_POST['portfilio_what_we_did'] ) )
		update_post_meta( $post_id, 'portfilio_what_we_did', wp_kses( $_POST['portfilio_what_we_did'], $allowed ) );

}
