<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<title><?php wp_title(" ", true, "right"); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo("charset"); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link type="text/css" rel="stylesheet" href="<?php echo get_css_url("screen.css"); ?>" media="screen"/>
	<link type="text/css" rel="stylesheet" href="<?php echo get_css_url("print.css"); ?>" media="print"/>

	<link type="text/css" rel="shortcut icon" href="<?php echo get_image_url("favicon.gif"); ?>"/>
	<link type="text/css" rel="apple-touch-icon" href="<?php echo get_image_url("touchicon.png"); ?>"/>
</head>

<body <?php body_class(); ?>>
<header>
	<a href="<?php echo home_url(); ?>">
		<img src="<?php echo get_image_url("logo.png") ?>" alt="My website"/>
	</a>
	<nav>
		<ul>
			<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
		</ul>
	</nav>
</header>

