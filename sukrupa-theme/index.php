<?php get_header(); ?>
<div class="grid_18" style="min-height: 500px;">
	<?php if ( have_posts() ) : ?>
	<div class="inset">
		<h2 style="margin-bottom:0;"><?php foreach( ( get_the_category() ) as $category ) { echo $category->cat_name . ' '; } ?></h2>
		<p><?php echo category_description(); ?></p>
	</div>	
	
	<?php while ( have_posts() ) : the_post(); ?>	
		<div id="the_content" style="border-bottom: 1px dotted silver;">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
		</div>
	<?php endwhile; 
	
	else: ?>
	
	<h2>No Results</h2>
	<p>Sorry but we can't find material to match that query. Please search again.</p>
	
	<?php endif; ?>
</div>

<?php get_sidebar(); get_footer(); ?>