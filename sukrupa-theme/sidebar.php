<?php
  // Includes plugin file in order to check if plugin was activated
  $sDir = dirname(__FILE__);
  require_once($sDir . '/../installed-wordpress/wp-admin/includes/plugin.php');
?>

<div id="sidebar">
  <div id="slider">
    <div class="sidebarEntry">
		<div class="sidebarHeader"><a href="<?php bloginfo('home'); ?>/sponsor/">Sponsor A Child</a></div>
        <div class="sidebarGuts">
            <p><a href="<?php bloginfo('home'); ?>/sponsor/">Click here</a> to Sponsor a child</p>
        </div>
    </div>
	</div>

<div class="sidebarEntry">
     <div class="sidebarHeader">Create an Opportunity</div>
     <div class="sidebarGuts">
         <a style='margin-bottom:5px; display:block' href="<?php bloginfo('home'); ?>/donate/">Donation Information</a>

         <?php if(is_plugin_active('sukrupa-forms/sukrupa-forms.php')) { ?>
         <a style='margin-bottom:5px; display:block' href="<?php bloginfo('home'); ?>/sponsor">Sponsor a child</a>
         <?php } ?>

         <a style='margin-bottom:5px; display:block' href="<?php bloginfo('home'); ?>/volunteer-information">Volunteer information</a>

         <?php if(is_plugin_active('sukrupa-forms/sukrupa-forms.php')) { ?>
         <a style='margin-bottom:5px; display:block' href="<?php bloginfo('home'); ?>/volunteer">Apply as a volunteer</a>
         <?php } ?>

         <!-- <a href="http://www.sukrupa.org/creations.html" target="_blank">View our Shop</a><br/> -->
     </div>
 </div>

    <?php $query = new WP_Query('showposts=4&category_name=events'); if ( $query->have_posts() ) :?>
    <div class="sidebarEntry">
        <div class="sidebarHeader">Events</div>
        <div class="sidebarGuts">
            <?php while ( $query->have_posts() ) : $query->the_post();
                                                   the_title('<h3>', '</h3>');
        endwhile;
            ?>
        </div>
    </div>
    <?php endif; ?>


 <div class="sidebarEntry">
 <div class="sidebarHeader">Visit Sukrupa</div>
 <div class="sidebarContent">
     Map shows directions from RT Nagar Police Station to Sukrupa. For custom directions from a different location, click 'Get Directions' below.
 </div>
 <div id="mapCanvas">
     <a href="http://maps.google.com/maps/ms?source=s_q&hl=en&geocode=&ie=UTF8&hq=&hnear=&msa=0&msid=215314882308192951750.0004a02a58dd0f0b83b28&ll=13.028788,77.594719&spn=0.016662,0.02326&z=16&iwloc=0004a02a6f59e763ba1a9">
         <img src="<?php bloginfo('template_directory'); ?>/img/sukrupa_map.jpg" />
     </a>
 </div>
 <div class="sidebarGuts">
     <a href="http://maps.google.com/maps/ms?source=s_q&hl=en&geocode=&ie=UTF8&hq=&hnear=&msa=0&msid=215314882308192951750.0004a02a58dd0f0b83b28&ll=13.028788,77.594719&spn=0.016662,0.02326&z=16&iwloc=0004a02a6f59e763ba1a9" target="_blank">Get Directions</a>
 </div>
 <div class="sidebarContent">
     FROM THE R.T. NAGAR POLICE STATION
     <ul>
         <li>- HMT Grounds are diagonally opposite to Police Station.</li>
         <li>- Come past HMT Grounds and past Karnataka Flag Post.</li>
         <li>- Turn RIGHT at dead end.</li>
         <li>- Come to next dead end (Salamat School) and turn LEFT.</li>
         <li>- Come past Mamatha High School and Shakthi Bakery (on right).</li>
         <li>- Cross drainage bridge and continue straight; road will curve to the RIGHT.</li>
         <li>- SUKRUPA Education Center is at the junction of the first left.</li>
         <li>- Continue to dead end and turn LEFT. SUKRUPA Administration on RIGHT (three story green and pink building).</li>
         <ul>
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
</div>
