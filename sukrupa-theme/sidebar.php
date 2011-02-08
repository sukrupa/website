<div id="sidebar">


	<div class="sidebarEntry"> 
		<?php $query = new WP_Query('showposts=1&meta_key=donormeter&post_type=page');
			  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="sidebarHeader"><a href="<?php bloginfo('home'); ?>/donate/"><?php the_title(); ?></a></div>
		<div class="sidebarGuts">
		<?php $donormeter = get_post_meta($post->ID,'donormeter',true);
			  $donormeter = explode('/', $donormeter);
			  $percentage = $donormeter[0]/$donormeter[1];
			  $width = 200 * $percentage; ?>
			<div class="baseMeter">
				<!-- <a href="<?php the_permalink(); ?>" id="capitalCampaign"><?php the_title(); ?></a> -->
				<span>Rs. <?php echo $donormeter[1];?></span>
				<div style="width:<?php echo $width; ?>px;" class="progressMeter"></div>
			</div>

			<div style="float:left;margin-top:10px;"><?php the_excerpt(); ?></div>
		<?php endwhile; endif; ?>
		</div>
	</div>


	   
	<div class="sidebarEntry">
	    <div class="sidebarHeader">Create an Opportunity</div>
	    <div class="sidebarGuts">
	    	<a href="<?php bloginfo('home'); ?>/donate/">Donation Information</a><br/>
	    	<a href="<?php bloginfo('home'); ?>/help-out/">Volunteer with Us</a><br/>
	    	<a href="http://etsy.com">View our Shop</a><br/>
	    </div>
	</div>


    <div class="sidebarEntry">
        <?php $query = new WP_Query('showposts=4&category_name=events');?>
	    <div class="sidebarHeader">Events</div>
	    <div class="sidebarGuts">
	    	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                    the_title('<h3>', '</h3>');
                endwhile;
                endif;
                ?>
	    </div>
    </div>


    <div class="sidebarEntry">
        <?php $query = new WP_Query('showposts=3&meta_key=studentdisplay');?>
	    	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
            <div class="sidebarHeader"><?php the_title();?></div>
	    <div class="sidebarGuts">
                <?php the_excerpt();
                endwhile;
                endif;
                ?>
	    </div>
    </div>

    





</div>