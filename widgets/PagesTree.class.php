<?php

class PagesTree extends WP_Widget {

	static $widget_name = "Pages Tree";

	function __construct() {
		$opts = array(
			"description" => "Displays sub-pages of a current page."
		);

		parent::__construct(false, __(self::$widget_name), $opts);
	}

	function __invoke() {
		register_widget($this);
	}

	function widget($args, $inst) {
		echo $args["before_widget"];

		global $post;
		$parents = get_post_ancestors($post->ID);
		$k = count($parents);

		echo $args["before_title"];
		echo $this->get_title($parents[$k - 1], $inst);
		echo $args["after_title"];

		echo '<ul class="pages-tree">';
		echo $this->get_pages($k > 0 ? $parents[$k - 1] : $post->ID);
		echo '</ul>';

		echo $args["after_widget"];
	}

	private function get_title($post, $inst) {
		$title = apply_filters("widget_title", $inst["title"]);
		if (empty($title)) $title = get_the_title($post);

		if (!$inst["title_link"]) return $title;
		return '<a href="' . get_permalink($post) . '">' . $title . '</a>';
	}

	private function get_pages($post_id) {
		return wp_list_pages('sort_column=menu_order&title_li=&echo=0&child_of=' . $post_id);
	}

	function update($new_instance, $old_instance) {
		$inst = $old_instance;
		$inst["title"] = strip_tags($new_instance["title"]);
		$inst["title_link"] = strip_tags($new_instance["title_link"]);
		return $inst;
	}

	function form($inst) {
		?>

		<p>
			<label for="<?php echo $this->get_field_id("title"); ?>">Title:</label>
			<input
					type="text" class="widefat"
					name="<?php echo $this->get_field_name("title"); ?>"
					id="<?php echo $this->get_field_id("title"); ?>"
					value="<?php echo $inst["title"]; ?>"
			/>
		</p>

		<p>
			<input
					type="checkbox"
					name="<?php echo $this->get_field_name("title_link"); ?>"
					id="<?php echo $this->get_field_id("title_link"); ?>"
				<?php echo $inst["title_link"] ? "checked" : ""; ?>
			/>
			<label for="<?php echo $this->get_field_id("title_link"); ?>">Link title to parent page</label>
		</p>

		<?php
	}
}

