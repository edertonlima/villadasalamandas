<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post();

		get_template_part( 'content-produtos', get_post_format() ); ?>

	<?php endwhile; ?>

<?php get_footer(); ?>