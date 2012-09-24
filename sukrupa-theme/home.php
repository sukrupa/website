<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#photocarousel').cycle({
		fx:'fade',
		timeout:5000
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
	
	<div id="photos-and-media" class="grid_9 container col" style="overflow:hidden;">
	    <h2>Photos and Media</h2>
	    <?php $query = new WP_Query('category_name=media&showposts=5');
	    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	        the_title('<li>', '</li>', true);
	    endwhile;
	    endif;?>
	    <div id="masonry">
	    	<object width="400" height="300"> <param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F87543005%40N03%2Fshow%2F&page_show_back_url=%2Fphotos%2F87543005%40N03%2F&user_id=87543005@N03&jump_to="></param> <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=109615"></param> <param name="allowFullScreen" value="true"></param><embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=109615" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F87543005%40N03%2Fshow%2F&page_show_back_url=%2Fphotos%2F87543005%40N03%2F&user_id=87543005@N03&jump_to=" width="400" height="300"></embed></object>
<!-- 	    	<img src="<?php bloginfo('home'); ?>/content/dancing.jpeg" width="160" height="165" />
	    	<img src="<?php bloginfo('home'); ?>/content/download.jpeg" width="160" height="176" />
	        <img src="<?php bloginfo('home'); ?>/content/krupa.jpeg" width="160" height="185" />	
	        <img src="<?php bloginfo('home'); ?>/content/krupaandkids.jpeg" width="160" height="120" />   -->  	
	    	<!-- <img src="<?php bloginfo('home'); ?>/content/village.jpeg" width="330" height="248" /> -->
<!-- 	    	<img src="<?php bloginfo('home'); ?>/content/lightingfire.jpeg" width="330" height="186" /> -->
	    </div>
	</div>
	
	<div id="current-news" class="grid_9 container col" style="margin-left: 15px;">
	    <h2>Current News</h2>
        <!-- Begin MailChimp Signup Form -->
		<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup {
				background: #fff;
				clear: left; 
				font: 14px Helvetica,Arial,sans-serif; 
			}
			/* Add your own MailChimp form style overrides in your site stylesheet
			or in this style block.
			  We recommend moving this block and the preceding CSS link to the
			HEAD of your HTML file. */
		</style>
		<div id="mc_embed_signup">
			<form action="http://sukrupa.us5.list-manage.com/subscribe/post?u=f3a131214c81db7544cb91239&amp;id=bb567124fc" method="post" id="mc-embedded-subscribe-form"
			name="mc-embedded-subscribe-form" class="validate" target="_blank">
			<label for="mce-EMAIL">Subscribe to our mailing list</label>
			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL"
			placeholder="email address" required>
			<div>
				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
			</div>
			</form>
		</div>

<!--End mc_embed_signup-->
		<?php 
		// Category is a more stable query basis; with 'meta_key' the client will need to unneccessiarily
		// tag items (especially since the meta_key has a null and unused value)

		$query = new WP_Query('category_name=news&showposts=5');
            
	    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	    
	    <div id="newspost">
	    	<h3><a style="color:inherit;" href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
	    	<?php // Change to thumbnail to support naming conventions.
                $thumbnail = get_post_meta($post->ID,'thumbnail',true);
                if($thumbnail): ?><p><img src=" <?php echo $thumbnail; ?>" class="thumbnail" alt="Featured Photo" width="100"/><?php endif;
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