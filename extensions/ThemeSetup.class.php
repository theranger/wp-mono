<?php


class ThemeSetup {

	function __invoke() {
		$this->automaticFeedLinks();
		$this->postThumbnails();
		$this->language(get_locale());
	}

	private function automaticFeedLinks() {
		// Add default posts and comments RSS feed links to head
		add_theme_support("automatic-feed-links");
	}

	private function postThumbnails() {
		add_theme_support("post-thumbnails", array("post"));
		set_post_thumbnail_size(125, 125, true);
	}

	private function language($locale) {
		load_theme_textdomain("mono.risk.ee", TEMPLATEPATH . '/languages');
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if (is_readable($locale_file)) require_once($locale_file);
	}
}
