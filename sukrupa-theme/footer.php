<div id="footer" class="grid_24" style="margin:0px; padding-left: 0px; width: 100%">

    <div class="statistic grid_5">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic1');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_7">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic2');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_6">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic3');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_6">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic4');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div>&nbsp;</div><br/>
    <div>&nbsp;</div><br/>


</div>
</div><!--content-->
</div><!-- site -->
</div><!-- wrapper -->

<div>&nbsp;</div><br/>

</body>
</html>