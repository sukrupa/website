<div id="footer" class="grid_24">

    <div class="statistic grid_5" style="margin:0px;" >
        <?php $query = new WP_Query('showposts=1&meta_key=statistic1');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_7" style="margin:0px;" >
        <?php $query = new WP_Query('showposts=1&meta_key=statistic2');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_6" style="margin:0px;" >
        <?php $query = new WP_Query('showposts=1&meta_key=statistic3');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_6" style="margin:0px;" >
        <?php $query = new WP_Query('showposts=1&meta_key=statistic4');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>


</div>
</div><!--content-->
</div><!-- site -->
</div><!-- wrapper -->

</body>
</html>