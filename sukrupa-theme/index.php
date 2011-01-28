
<?php get_header(); ?>

<script type="text/javascript" src="http://www.stockyardmagazine.com/_assets/scripts/jq-homefeatured.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#photocarousel').cycle({
		fx:'fade',
		timeout:500
	});
});
</script>
<br/>
<div class="loop grid_18">
<?php $query = new WP_Query('showposts=3&meta_key=carousel'); ?>
<div id="photocarousel" class="grid_18">
    <?php
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
   $featuredPhoto = get_post_meta($post->ID,'carousel',true); ?>
    <div id="" class="photoHolder grid_17 alpha omega"><img src="<?php echo $featuredPhoto; ?>" alt = "Featured Photo" class ="carouselImage"/>
      <div id="" class="grid_8 carouseltext">
        <?php the_title(true);
        the_excerpt(); ?>
      </div>
    </div>
<?php endwhile; endif; ?>
</div>
<?php //get_sidebar(); ?>
<div id="media" class="grid_9" style="margin-right:0px;">
    <h2>Photos and Media</h2><br/>
    <?php $query = new WP_Query('category_name=media');
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
        the_title('<li>', '</li>', true);
    endwhile;
    endif;?>
</div>

<div id="news" class="grid_9" style="margin-left:0px;">
    <h2>Current News</h2><br/>
    <?php $query = new WP_Query('meta_key=news');
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
        the_title('<li>', '</li>', true);
        the_excerpt();
    endwhile;
    endif;
?>
</div>
   
</div>
    <?php
    get_sidebar();
    get_footer(); ?>
