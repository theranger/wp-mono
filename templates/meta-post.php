<header>
	<span class="primary">
		<?php the_time(get_option("date_format")); ?> &bull;
		<?php the_category(', '); ?> &bull;
		<?php the_author_posts_link(); ?>
	</span>

	<span class="secondary">
		<?php if (get_the_tags() && is_single()) the_tags(" "); ?>
	</span>
</header>
