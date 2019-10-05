<?php


class TitleFilter {

	function __invoke($title) {
		if (empty($title)) return get_bloginfo("name");
		return $title . " - " . get_bloginfo("name");
	}
}
