<?php get_header(); ?>

<?php if (!have_posts()) : ?>
	<?php get_template_part("templates/page", "notfound"); ?>
<?php endif; ?>

<?php if (is_page()) while (have_posts()) : the_post(); ?>
	<?php get_template_part("templates/" . get_post_type(), get_post_custom()["custom-layout"][0]); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
