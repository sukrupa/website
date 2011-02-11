<?php 

/*
Template Name: Donations Page
*/

get_header();

?>

<div class="grid_18">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="inset" style="margin-bottom:20px;">
		<h2 style="margin-bottom:0;"><?php the_title(); ?></h2>
		<p><?php the_excerpt(); ?></p>
	</div>	
		
    <div id="donateContent">
        <div id="ammadoHolderPersistent" class="grid_9">
	    	<div class="donateContentHeader">
				<h1>Donate Online</h1>
				<p>Donate securely through Ammado</p>
		</div>
		<div id="ammadoDonation">
				<div id="ammadoGivingWidgetPersistent">
				</div>
		</div>
		<script type="text/javascript">
			var s = document.createElement('script');
			s.type='text/javascript';
			s.async=true;
			s.src='https://www.ammado.com/nonprofit/118838/givingwidget/embed.js?renderTo=ammadoGivingWidgetPersistent';
			var f = document.getElementsByTagName('script')[0];
			f.parentNode.insertBefore(s, f);
		</script>
	</div>

	<div id="manualDonation" class="grid_9">
	    	<div class="donateContentHeader">
				<h1>Donate Manually</h1>
				<p>Cheque, Demand Draft, or Wire Transfer</p>
		</div>
		<div id="manualContent">
			<?php the_content(); ?>
		</div>
	</div>
	<?php endwhile; endif; ?>
    </div>
</div>

<?php get_sidebar(); get_footer(); ?>
