<?php 

/*
Template Name: Ammado Failure Page
*/

define("1101","Beneficiary is invalid.");
define("1102","Beneficiary does not accept donations.");
define("1201","Unsupported currency.");
define("1301","Donation amount is invalid.");
define("1302","Donation amount too small.");
define("1303","Donation amount too large.");
define("1401","You must provide a valid email address to make a donation.");
define("1402","Email address must be formatted correctly (for example jsmith@example.com).");
define("1403","Email provided was too long (max 100 characters).");
define("1501","Sorry, the first name you entered does not seem to be valid. Please enter a name between 1 and 100 characters long. Some characters may not be valid.");
define("1502","First name too long (max 100 characters).");
define("1601","Sorry, the last name you entered does not seem to be valid. Please enter a name between 1 and 100 characters long. Some characters may not be valid.");
define("1602","Last name too long (max 100 characters).");

get_header();

$errorCode = $_GET["errorCode"];
$errorCodes = preg_split("/;/", $errorCode);

?>
<div class="grid_18">
	<div class="inset" style="margin-bottom:20px;">
		<h2 style="margin-bottom:0;"><?php the_title(); ?></h2>
		<p>
		    <?php the_excerpt(); ?>
		</p>
	</div>
	<div id="error">
		<?php
			foreach( $errorCodes as $code )
			{
				print(constant($code));
				print("<br/>");
			}
		?>
	</div>
</div>

<?php get_sidebar(); get_footer(); ?>