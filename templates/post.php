<article>
	<h1><?php the_title(); ?></h1>
	<?php get_template_part("templates/meta", "post"); ?>
	<?php the_content(); ?>
	<?php comments_template("", true); ?>
</article>

<?php get_template_part("templates/nav", "post"); ?>

<aside>
	<?php if (is_active_sidebar("post")) dynamic_sidebar("post"); ?>
</aside>
