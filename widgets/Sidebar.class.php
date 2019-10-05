<?php

class Sidebar {

	private static $beforeWidget = '<div id="%1$s" class="widget %2$s">';
	private static $afterWidget = '</div>';
	private static $beforeTitle = '<p class="widget-title">';
	private static $afterTitle = '</p>';

	function __invoke() {
		$this->register("Post", "post", "Appears on every blog post.");
		$this->register("Page", "page", "Appears on every page except front-page and 404.");
		$this->register("Front Page", "index", "Appears on front page only.");
	}

	private function register($name, $id, $description) {
		register_sidebar(array(
			"name" => __($name),
			"id" => $id,
			"description" => __($description),
			"before_widget" => self::$beforeWidget,
			"after_widget" => self::$afterWidget,
			"before_title" => self::$beforeTitle,
			"after_title" => self::$afterTitle
		));
	}
}
