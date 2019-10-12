<?php
/**
 * Copyright 2019 by Baltnet Communications (https://www.baltnet.ee)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *        http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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
