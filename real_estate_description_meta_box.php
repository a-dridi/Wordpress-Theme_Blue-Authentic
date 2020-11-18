<?php
/**
 * Meta box to set description values (number of rooms, size, etc.) for a real estate object
 */
abstract class Real_Estate_Description_Meta_Box {


	/**
	 * Set up and add the meta box.
	 */
	public static function add() {
			add_meta_box(
				'realestate_description_box',          // Unique ID
				'Real Estate Object Description', // Box title
				array( self::class, 'html' ),   // Content callback, must be of type callable
				array( 'post', 'real_estate' )                  // Post type
			);
	}


	/**
	 * Save the meta box selections.
	 *
	 * @param int $post_id  The post ID.
	 */
	public static function save( int $post_id ) {
		if ( array_key_exists( 'realestate_sq_size', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_realestate_meta_sq_size',
				$_POST['realestate_sq_size']
			);
		}
	}


	/**
	 * Display the meta box HTML to the user.
	 *
	 * @param \WP_Post $post   Post object.
	 */
	public static function html( $post ) {
		$sq_size_value = get_post_meta( $post->ID, '_realestate_meta_sq_size', true );
		?>
<div class="meta-box-field">
	<label for="realestate_sq_size">Size in square meters (m2)</label>
	<input name="realestate_sq_size" id="realestate_sq_size" value="<?php $sq_size_value; ?>" class="postbox">
</div>
		<?php
	}
}

add_action( 'add_meta_boxes', array( 'Real_Estate_Description_Meta_Box', 'add' ) );
add_action( 'save_post', array( 'Real_Estate_Description_Meta_Box', 'save' ) );
