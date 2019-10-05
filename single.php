<?php get_header(); ?>

<?php if (!have_posts()) : ?>
	<?php get_template_part("templates/page", "notfound"); ?>
<?php endif; ?>

<?php if (is_single()) while (have_posts()) : the_post(); ?>
	<?php get_template_part("templates/" . get_post_type(), "index"); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
