<main>
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>

		<article>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php get_template_part("templates/meta", "post"); ?>
			<?php the_content(); ?>
			<?php comments_template("", true); ?>
		</article>

	<?php endwhile; ?>

	<?php get_template_part("templates/nav", "post"); ?>
</main>

<aside>
	<?php if (is_active_sidebar("index")) dynamic_sidebar("index"); ?>
</aside>
