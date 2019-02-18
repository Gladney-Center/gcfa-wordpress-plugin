<?php

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Custom_Meta {

	public static function init() {
		add_action( 'save_post_page', [ __CLASS__, 'save_page_meta' ], 10, 3 );
		add_action( 'page_attributes_misc_attributes', [ __CLASS__, 'add_page_meta' ] );
	}

	public static function add_page_meta($post) {
		$classes = get_post_meta($post->ID, 'gcfa_page_classes', true); ?>
		<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="gcfa_page_classes">Add Page Classes</label></p>
		<input name="gcfa_page_classes" id="gcfa_page_classes" type="text" class="widefat" value="<?php echo $classes; ?>" />
	<?php }

	public static function save_page_meta($post_id, $post, $update) {
		if (isset($_POST['gcfa_page_classes'])) update_post_meta($post_id, 'gcfa_page_classes', $_POST['gcfa_page_classes']);
	}
}