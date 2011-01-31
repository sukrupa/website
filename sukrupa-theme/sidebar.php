<div id="sidebar">


	<div class="sidebarEntry"> 
		<?php $query = new WP_Query('showposts=1&meta_key=donormeter');
			  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="sidebarHeader"><?php the_title(); ?></div>
		<div class="sidebarGuts">
		<?php the_excerpt();
			endwhile;
			endif; ?>
		</div>
	</div>


	   
	<div class="sidebarEntry">
	    <div class="sidebarHeader">How Can I Help?</div>
	    <div class="sidebarGuts">
	    	<a href="#">Donate Now to Sukrupa</a><br/>
	    	<a href="#">Volunteer with Us</a><br/>
	    	<a href="#">View our Shop</a><br/>
	    </div>
	</div>


    <div class="sidebarEntry">
        <?php $query = new WP_Query('showposts=3&meta_key=events');?>
	    <div class="sidebarHeader">Upcoming Events</div>
	    <div class="sidebarGuts">
	    	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                    the_excerpt();
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