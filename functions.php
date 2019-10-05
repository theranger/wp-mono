<?php

try {
	spl_autoload_register(function ($class) {
		@include_once dirname(__FILE__) . "/extensions/" . $class . ".class.php";
	});

	spl_autoload_register(function ($class) {
		@include_once dirname(__FILE__) . "/widgets/" . $class . ".class.php";
	});
} catch (Exception $ex) {
	die($ex->getMessage());
}

add_action("widgets_init", new PagesTree);
add_action('widgets_init', new Sidebar);
add_action("admin_init", new PostLayout);

add_filter("wp_title", new TitleFilter);
add_filter("the_content_more_link", new MoreContentFilter);

add_action("after_setup_theme", new ThemeSetup);


function get_image_url($image) {
	return get_template_directory_uri() . "/images/" . $image;
}

function get_css_url($css) {
	return get_template_directory_uri() . "/css/" . $css;
}
