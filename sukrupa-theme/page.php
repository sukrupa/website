<?php get_header(); ?>

<div class="grid_18">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
</div>

<?php get_sidebar(); get_footer(); ?>