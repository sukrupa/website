<?php 

/*
Template Name: Ammado Page
*/

get_header();

$currencies_json = file_get_contents("currencies.json", FILE_USE_INCLUDE_PATH);
$currencies_object = json_decode($currencies_json,true);

?>

<div class="grid_18">

	<div class="inset" style="margin-bottom:20px;">
		<h2 style="margin-bottom:0;"><?php the_title(); ?></h2>
		<p>
		    <?php the_excerpt(); ?>
		</p>
	</div>
	<div id="donation-form">
		<form id="donerForm" class="donerForm" method="post" action="https://api-test.ammado.net/v1/donate" accept-charset="utf-8">
		<input type="hidden" name="beneficiaryId" value="488" />
		<input type="hidden" name="apiKey" value="9CACC3AA-C207-4510-A553-461CBCA34ADB" />
		<input type="hidden" name="onSuccess" value="http://www.sukrupa.org/"/>
		<input type="hidden" name="onError" value="http://sukrupa.localhost/failure" />
		<div class="entryValue">
			<div class="label">First Name:</div>
			<div>
				<input type="text" name="donorFirstName" id="donorFirstName" />
			</div>
		</div>
		<div class="entryValue">
			<div class="label">Last Name:</div>
			<div>
				<input type="text" name="donorLastName" id="donorLastName" />
			</div>
		</div>
		<div class="entryValue">
			<div class="label">Email:</div>
			<div class="textSpace">
				<input type="email" name="donorEmail" id="donorEmail" />
			</div>
		</div>
		<div class="entryValue">
			<div class="label">Amount:</div>
			<div class="textSpace">
				<input type="text" name="donationAmount" id="donationAmount" />
			</div>
		</div>
		<div class="entryValue">
			<div class="label">Currency:</div>
			<div>
				<select id="currencyCode" name="currencyCode">
					<?php
						foreach( $currencies_object as $currency)
						{
							foreach( $currency as $each_currency)
							{
								printf("<option value='%s'>%s</option>",$each_currency["currencyCode"],$each_currency["currencyName"]);
							}
						}
					?>
				</select>
			</div>
		</div>
		<div class="entryValue">
			<input id="submit" type="submit" value="Donate"/>
		</div>
		</form>
		<div id="manualContent">
			<?php the_content(); ?>
		</div>
	</div>
	
</div>

<script>
	$('#donerForm').submit( function() {
		var emailCheck = /^[\._a-zA-Z0-9!#\$%&'\*\+\-/=\?\^`\{\|\}~]+@[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)+$/;
		if( $('#donorEmail').value.search(emailCheck) == 0 )
		{
			alert('Please input valid email address');
			return true;
		}
		else
			return false;
	});

</script>

<?php get_sidebar(); get_footer(); ?>