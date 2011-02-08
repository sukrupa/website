<?php get_header(); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#photocarousel').cycle({
		fx:'fade',
		timeout:2000
	});
});
</script>

<div class="grid_18 guts">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php the_content(); 
	
	endwhile; endif; //this is a test comment
	?>
	
</div>

<?php get_sidebar(); get_footer(); ?>