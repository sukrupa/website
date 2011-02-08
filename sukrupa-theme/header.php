<?php //if( is_user_logged_in() === false ) { auth_redirect(); } ?><!DOCTYPE html> 
 
<html dir="ltr" lang="en-US" xmlns="http://www.w3.org/1999/xhtml"> 
 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="Copyright" content="Copyright (c) Sukrupa Foundation. <?php echo date("Y"); ?>" />
<meta name="robots" content="INDEX, FOLLOW" />
<meta name="keywords" content="" />
<meta name="description" content="" />

<?php wp_head(); wp_print_scripts(); ?>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen" />
<![endif]-->

</head>

<body>
<div id="ammadoHolder" style="position:absolute; top: 25%; left: 33%; z-index: -1;">
<div id="ammadoGivingWidget"></div>
<script type="text/javascript">
    var s = document.createElement('script');
    s.type='text/javascript';
    s.async=true;
    s.src='https://www.ammado.com/nonprofit/118838/givingwidget/embed.js?renderTo=ammadoGivingWidget';
    var f = document.getElementsByTagName('script')[0];
    f.parentNode.insertBefore(s, f);
 </script>
</div>

<div id="wrapper">

<div id="site" class="container_24">
    <div id="header" class="grid_24">
		<div id="logo" class="grid_9">
			<h1><a href="<?php echo get_option('home'); ?>/">SUKRUPA</a></h1>
		</div>
        <div class="prefix_20 cornerlinks">
           <a href="<?php bloginfo('home'); ?>/">HOME</a> | <a href="<?php bloginfo('home'); ?>/contact/">Contact Us</a> | <a href="<?php bloginfo('home'); ?>/wp-admin/">Login</a>
        </div>

		<div id="search" class="prefix_7">
		    <form id="searchForm" action="<?php echo get_option('home'); ?>" method="get" class="grid_5">
		    	<input id="searchInput" class="grid_4" type="text" name="s" value="Search Sukrupa" onfocus="if (this.value == 'Search Sukrupa') {this.value = '';}" />
		    	<input type="submit" id="searchSubmit" value="&nbsp;" alt="Submit">
		    </form>
			<a href="http://www.facebook.com/pages/SUKRUPA/105019592871618" id="fb">Facebook</a>
            <a href="http://www.twitter.com/#" id="twi">Twitter</a>
            <a href="http://www.youtube.com/#" id="yt">YouTube</a>
		</div>
		
		<div id="navigation" class="grid_24" style="margin: 0;">
    		<a id="homeLink" href="<?php bloginfo('home'); ?>/" style="margin-left: 5px;">home</a>
    		<a href="<?php bloginfo('home'); ?>/activities/" class="">what we do</a>
    		<a href="<?php bloginfo('home'); ?>/about/" class="">who we are</a>
    		<a href="<?php bloginfo('home'); ?>/help-out/" class="">supporting sukrupa</a>
    		<a href="<?php bloginfo('home'); ?>/news/" class="">current news &amp; blog</a>
    	    <a href="<?php bloginfo('home'); ?>/#" id="donateLink" onClick="clickAmmado()" style="line-height:1em; color:#ececec; font-weight:bold; font-size: 1em; letter-spacing: .04em">donate now</a>
    	</div>
	</div><!-- /header -->


    <div id="content" class="grid_24">
