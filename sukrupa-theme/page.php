<?php get_header(); ?>

<div class="grid_18">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$headerPhoto = get_post_meta($post->ID,'headerPhoto',true);
	if ( $headerPhoto ) { ?>
	<div class="inset" style="margin-top: 30px;">
		<img class="headerPhoto" src="<?php echo $headerPhoto; ?>" />
		<?php } else { ?>
	<div class="inset"><?php } ?>
		<h2 style="margin-bottom:0;"><?php the_title(); ?></h2>
		<p><?php the_excerpt(); ?></p>
	</div>	
		
		<div id="the_content">
		<?php the_content(); ?>
		</div>
	<?php endwhile; endif; ?>
</div>

<?php get_sidebar(); get_footer(); ?>