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

<div class="grid_18">
	<div id="photocarousel">
    <?php $query = new WP_Query('showposts=3&meta_key=carousel&post_type=any');
		  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
  	      $featuredPhoto = get_post_meta($post->ID,'carousel',true); ?>
    	<div class="carouselEntry">
    		<img src="<?php echo $featuredPhoto; ?>" id="<?php echo $post->ID; ?>-photo" alt="Featured Photo" width="665" height="350" class="carouselImage"/>
      		<div id="post-<?php echo $post->ID; ?>" class="carouselText">
        		<a href="<?php the_permalink();?>"><?php the_title('<h3>', '</h3>', true);?></a>
			         <?php the_excerpt(); ?>
      		</div>
    	</div>
	<?php endwhile; endif; ?>
	</div>
	
	<div class="grid_9 container col">
	    <h2>Photos and Media</h2>
	    <?php $query = new WP_Query('category_name=media&showposts=5');
	    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	        the_title('<li>', '</li>', true);
	    endwhile;
	    endif;?>
	</div>
	
	<div class="grid_9 container col" style="margin-left: 15px;">
	    <h2>Current News</h2>
		<?php 
		// Category is a more stable query basis; with 'meta_key' the client will need to unneccessiarily
		// tag items (especially since the meta_key has a null and unused value)

		$query = new WP_Query('category_name=news&showposts=5');
            
	    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	    
	    <div id="newspost">
	    	<h3><a style="color:inherit;" href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
	    	<?php // Change to thumbnail to support naming conventions.
                $thumbnail = get_post_meta($post->ID,'thumbnail',true);
                if($thumbnail): ?><p><img src=" <?php echo $thumbnail; ?>" class="newsthumbnail" alt="Featured Photo" width="100"/><?php endif;
	        the_excerpt();
                ?></p></div><br/><?php
                endwhile;
	        endif;
	?>
	</div>
	   
</div>

    <?php
    get_sidebar();
    get_footer(); ?>