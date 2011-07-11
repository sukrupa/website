<?php

/*
Template Name: Big PipeLine Donations Page
*/
get_header();
?>

<div id="bigpipeline" style="margin-left: 300px;">
   <?php $query = new WP_Query('showposts=1&meta_key=donormeter&post_type=page');
			  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <h1>You are donating to the <?php the_title(); ?></h1>
    
    <p style="margin-left: -100px;">Please mention the same in "Add a message" option before proceeding with your payment.</p>
    <iframe src='https://www.ammado.com/nonprofit/118838/givingwidget?alternativeControllerNameForView=Donate' width="326" height="500" frameborder='0'> </iframe>
    <?php
    endwhile; endif; ?>
 </div>


