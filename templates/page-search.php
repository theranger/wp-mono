<main class="fullwidth">
	<h1>Searching for <i><?php echo get_search_query(); ?></i></h1>
	<header>
		<span class="primary"><?php echo $wp_query->found_posts . __(" results"); ?></span>
	</header>

	<?php if (have_posts()) : ?>
		<dl>
			<?php while (have_posts()) : the_post(); ?>
				<dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
				<dd><?php echo get_the_excerpt(); ?></dd>
			<?php endwhile; ?>
		</dl>
	<?php endif; ?>

	<?php get_template_part("templates/nav", "post"); ?>
</main>
