<div id="footer" class="grid_24">

    <div class="statistic grid_5 statisticmargin">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic1');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_7 statisticmargin">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic2');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_6 statisticmargin">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic3');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div class="statistic grid_6 statisticmargin">
        <?php $query = new WP_Query('showposts=1&meta_key=statistic4');
        if ($query->have_posts() ) : while ( $query->have_posts() ): $query->the_post();
            the_content();
        endwhile;
        endif; ?>
    </div>

    <div id="footerinfo">
        <hr/>
        <p>
          <?php echo date('Y'); ?> &copy; Sukrupa Foundation
        </p>
        <p>
            <a href="<?php bloginfo('home'); ?>">Terms & Conditions</a> | <a href="<?php bloginfo('home'); ?>">Privacy Policy</a > | <a href="<?php bloginfo('home'); ?>">Login</a> | <a href="<?php bloginfo('home'); ?>">Register</a>
        </p>
        <p>
          The Sukrupa Foundation is a non-profit, charitable organization in Bangalore, India.
        </p>
    </div>

</div>
</div><!--content-->
</div><!-- site -->
</div><!-- wrapper -->

<?php if ( is_home() ) : ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.masonry.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/custom.js"></script>
<?php endif; ?>
</body>
</html>