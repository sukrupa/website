<div id="sidebar" class="grid_6" style="float:right;margin-left:0px; height: 100%;">

<?php
$query = new WP_Query('showposts=1&meta_key=donormeter');
?> <div id ="donorsidebar" class ="sidebaritem grid_6"> <?php
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
   ?><div class="sidebarheader"><?php
   the_title();?></div><?php
   the_excerpt();
endwhile;
endif;
?>
</div>

    <div>&nbsp;</div>
   
<div id="howhelpsidebar" class="sidebaritem grid_6">
    <div class="sidebarheader" style="margin-left:0px">How Can I Help?</div>
    <a href="#">Donate now to Sukrupa</a><br/>
    <a href="#">Volunteer with Us</a><br/>
    <a href="#">View our Shop</a><br/>
</div>

    <div>&nbsp;</div>

    <?php
$query = new WP_Query('showposts=3&meta_key=events');
?> <div id ="upcomingeventssidebar" class ="sidebaritem grid_6">
<div class="sidebarheader" style="margin-left:0px">Upcoming Events</div>
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
     the_excerpt();
endwhile;
endif;
?>
</div>

    <div>&nbsp;</div>


<?php
$query = new WP_Query('showposts=1&meta_key=studentdisplay');
?> <div id ="studentsidebar" class ="sidebaritem grid_6"> <?php
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?><div class="sidebarheader"><?php
    the_title();?></div><?php
    the_excerpt();
endwhile;
endif;
?>
</div>



</div>