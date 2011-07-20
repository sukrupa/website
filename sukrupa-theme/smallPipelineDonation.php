<?php
   $sDir = dirname(__FILE__);
  require_once($sDir . '/../installed-wordpress/wp-admin/includes/plugin.php');
  include("sukrupaCustomFunctions/SukrupaRequestHandler.php");
  include("sukrupaCustomFunctions/DonationToSmallPipelineStatus.php");
  $smallNeedDonationStatus= new DonationToSmallPipelineStatus(new SukrupaRequestHandler());
  $smallNeedList = $smallNeedDonationStatus->getSmallPipelineItems();
/*
Template Name: Small PipeLine Donations Page
*/
get_header();
?>

<div id="smallpipeline" style="margin-left: 300px;">
   <?php $itemName=str_replace("-"," ",$_GET['itemName']);?>
    <h1>You are donating to the <b><?php echo $itemName; ?></b></h1>

    <p style="margin-left: -130px;">Please "Add a message" including <?php echo $itemName; ?> to notify Sukrupa that you are donating
         to this specific item.</p>
    <p style="margin-left: -35px;">If no message is included, your donation will be added to general funds.</p>
    <iframe src='https://www.ammado.com/nonprofit/118838/givingwidget?alternativeControllerNameForView=Donate' width="326" height="500" frameborder='0'> </iframe>
 </div>
