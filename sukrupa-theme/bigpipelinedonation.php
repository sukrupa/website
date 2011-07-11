<?php

/*
Template Name: Big PipeLine Donations Page
*/
?>

<div>
   <?php $query = new WP_Query('showposts=1&meta_key=donormeter&post_type=page');
			  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <p>You are donating to the <?php the_title(); ?></p>
    
    <p>Please mention the same in "Add a message" option before proceeding with your payment.</p>
    <iframe src='https://www.ammado.com/nonprofit/118838/givingwidget?alternativeControllerNameForView=Donate' width="500" height="500" frameborder='0'> </iframe>
    <?php
    endwhile; endif; ?>
 </div>