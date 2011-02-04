<?php get_header(); ?>

<div class="grid_18">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="inset">
		<h2 style="margin-bottom:0;"><?php the_title(); ?></h2>
		<p><?php the_excerpt(); ?></p>
	</div>	
		
		<div id="the_content">
		<?php the_content(); ?>
		</div>
	<?php endwhile; endif; ?>
</div>

<?php get_sidebar(); get_footer(); ?>