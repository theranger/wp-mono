<?php

class MoreContentFilter {

	function __invoke($link) {
		$start = strpos($link, "#more-");
		if (!$start) return $link;

		$end = strpos($link, '"', $start);
		if (!$end) return $link;

		return substr_replace($link, '', $start, $end - $start);
	}
}
