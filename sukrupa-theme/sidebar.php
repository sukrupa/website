<div id="sidebar" class="grid_5" style="float:right; margin: 0px;">

<?php
$query = new WP_Query('showposts=1&meta_key=donormeter');
?> <div id ="donorsidebar" class ="sidebar grid_6"> <?php
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
   ?><div class="sidebarheader"><?php
   the_title();?></div><?php
   the_excerpt();
endwhile;
endif;
?>
</div>

<div id="howhelpsidebar" class="sidebar grid_6">
    <div class="sidebarheader">How Can I Help?</div>
    <a href="#">Donate now to Sukrupa</a><br/>
    <a href="#">Volunteer with Us</a><br/>
    <a href="#">View our Shop</a><br/>
</div>



    <?php
$query = new WP_Query('showposts=3&meta_key=events');
?> <div id ="upcomingeventssidebar" class ="sidebar grid_6"> <?php
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
   ?><div class="sidebarheader">Upcoming Events</div><?php
   the_excerpt();
endwhile;
endif;
?>
</div>

<?php
$query = new WP_Query('showposts=1&meta_key=studentdisplay');
?> <div id ="studentsidebar" class ="sidebar grid_6"> <?php
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?><div class="sidebarheader"><?php
    the_title();?></div><?php
    the_excerpt();
endwhile;
endif;
?>
</div>



</div>