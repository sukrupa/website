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

<body onload="">
<div id="wrapper">

<div id="site" class="grid_24">

<div id="header" class="grid_24 header">
    <div class="grid_24">
	<div id="logo"class="grid_9">
		<a name="yourethetop"></a>
		<a class="yellowtext masthead" href="<?php echo get_option('home'); ?>/">
                    <h1>SUKRUPA</h1></a></div>
        
                <div class="grid_15" style="float:right;">

                <div  class="grid_15" style="float: right;">
                    <a href="#">Home</a> | <a href="#">Contact Us</a> | <a href="#">Login</a> </div><br/>

		<div id="searchbox" class="grid_15" style="float: right;">
		    <form id="searchpane" action="<?php echo get_option('home'); ?>" method="get" class="grid_10">
		    	<input style="font-size:10px;" id="searchinput" type="text" name="s" value="SEARCH" onfocus="if (this.value == 'SEARCH') {this.value = '';}" />
		    </form>
                    <div class="grid_5">
                        <img src="http://placehold.it/15x15" alt="You Tube"></img>
                        <img src="http://placehold.it/15x15" alt="Twitter"></img>
                        <img src="http://placehold.it/15x15" alt="FB"></img>
                    </div>
                </div>
               </div>
    </div>
    <br/>

   <div class="links grid_24">
        <div class="grid_18">
            <img src="http://placehold.it/15x15" alt="home" class="grid_3"></img>
            <a href="#" class="grid_3">who we are</a>
            <a href="#" class="grid_3">volunteer with us</a>
            <a href="#" class="grid_3">blog</a>
            <a href="#" class="grid_3">sponsorship</a>
            <a href="#" class="grid_3">events</a>
        </div>
        <div class="createopportunity grid_6">
            <a href="#">create an opportunity</a>
        </div>
    </div>
	

    <div id="content" class="container_24">
