<div id="footer" class="grid_24">

    <div class="statistic grid_23 statisticmargin">
        <?php $query = new WP_Query('showposts=4&category_name=statistics');
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
            <a href="<?php bloginfo('home'); ?>/terms/">Terms & Conditions</a> | <a href="<?php bloginfo('home'); ?>/wp-admin/">Login</a>
        </p>
        <p>
          The Sukrupa Foundation is a non-profit charitable organization in Bangalore, India.
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