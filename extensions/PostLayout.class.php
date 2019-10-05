<?php

class PostLayout {

	static $layouts = array(
		"default" => "Default",
		"fullwidth" => "Full Width"
	);

	public function __construct() {
		add_action("save_post", array($this, "save"));
	}

	public function __invoke() {
		add_meta_box("custom_post_settings", __("Custom Post Settings"), array($this, "form"), array("post", "page"), "side", "core");
	}

	function save() {
		global $post;
		if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return;
		if ($post->post_type != "post" && $post->post_type != "page") return;

		update_post_meta($post->ID, "custom-layout", $_POST["custom-layout"]);
	}

	function form() {
		global $post;
		$prop = get_post_custom($post->ID)["custom-layout"][0];
		?>

		<label for="custom-layout"><?php _e("Single post page layout"); ?></label>
		<select name="custom-layout" id="custom-layout">
			<?php foreach (self::$layouts as $key => $value): ?>
				<option value="<?php echo $key ?>"
					<?php echo $key == $prop ? "selected" : "" ?>
				><?php echo $value ?></option>
			<?php endforeach; ?>
		</select>

		<?php
	}
}
