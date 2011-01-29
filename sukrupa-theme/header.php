<?php if( is_user_logged_in() === false ) { auth_redirect(); } ?><!DOCTYPE html> 
 
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
<link rel="stylesheet" href="<?php echo get_option('home'); ?>/wp-content/themes/sukrupa/iestyle.css" type="text/css" media="screen" />
<![endif]-->

</head>

<body>
<div id="wrapper">

<div id="site" class="container_24">
    <div id="header" class="grid_24">
		<div id="logo" class="grid_9">
			<h1><a href="<?php echo get_option('home'); ?>/">SUKRUPA</a></h1>
		</div>
        <div class="prefix_20 cornerlinks">
           <a href="<?php bloginfo('home'); ?>/">HOME</a> | <a href="<?php bloginfo('home'); ?>/#">Contact Us</a> | <a href="<?php bloginfo('home'); ?>/#">Login</a>
        </div>

		<div id="search" class="prefix_16">
		    <form id="searchForm" action="<?php echo get_option('home'); ?>" method="get" class="grid_5">
		    	<input id="searchInput" class="grid_4" type="text" name="s" value="Search Sukrupa" onfocus="if (this.value == 'Search Sukrupa') {this.value = '';}" />
		    	<input type="submit" id="searchSubmit" value="Submit" alt="Submit">
		    </form>
			<a href="http://www.facebook.com/#" id="fb">Facebook</a>
            <a href="http://www.twitter.com/#" id="twi">Twitter</a>
            <a href="http://www.youtube.com/#" id="yt">YouTube</a>
		</div>
		
		<div id="navigation" class="grid_24" style="margin: 0;">
    	    <div class="grid_18">
    	        <img src="http://placehold.it/15x15" alt="home" class="grid_3 headerlinks"></img>&nbsp;&nbsp;&nbsp;&nbsp;
    	        <a href="#" class="grid_3 headerlinks">who we are&nbsp;&nbsp;&nbsp;&nbsp;</a>
    	        <a href="#" class="grid_3 headerlinks">volunteer with us&nbsp;&nbsp;&nbsp;&nbsp;</a>
    	        <a href="#" class="grid_3 headerlinks">blog&nbsp;&nbsp;&nbsp;&nbsp;</a>
    	        <a href="#" class="grid_3 headerlinks">sponsorship&nbsp;&nbsp;&nbsp;&nbsp;</a>
    	        <a href="#" class="grid_3 headerlinks">events</a>
    	    </div>
    	    <div class="grid_6">
    	        <a href="#" class="createopportunitylink" >create an opportunity</a>
    	    </div>
    	</div>
	</div><!-- /header -->


    <div id="content" class="grid_24">
