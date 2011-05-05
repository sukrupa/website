<?php 

/*
Template Name: Ammado Success Page
*/

get_header();
?>
<div class="grid_18">
	<div class="inset" style="margin-bottom:20px;">
		<h2 style="margin-bottom:0;"><?php the_title(); ?></h2>
		<p>
		    <?php the_excerpt(); ?>
		</p>
	</div>
	<div id="success">
		Thank you for your donation.
	</div>
</div>

<?php get_sidebar(); get_footer(); ?>