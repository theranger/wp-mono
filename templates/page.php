<article>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<?php comments_template("", true); ?>
</article>

<aside>
	<?php if (is_active_sidebar("page")) dynamic_sidebar("page"); ?>
</aside>
