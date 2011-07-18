<?php
/*
Template Name: Subscribe Page
*/
get_header();

$subscriberName =$_POST['fm_name'];
$subscriberEmail = $_POST['fm_email'];
$formDisplayFlag = true;
if(isset($subscriberName) && isset($subscriberEmail)){
    $formDisplayFlag = false;
}


?>



<div class="grid_18">

    <div class="inset">		<h2 style="margin-bottom:0;">Subscribe</h2>
        <p></p>
    </div>
    <?php if($formDisplayFlag): ?>
    <div id="the_content">
        <span id="errorMessage" class="error"></span>


        <!-- START of Dagon Design Formmailer output -->

        <div class="ddfmwrap"><form id="subscriberform" class="ddfm" method="post" action="http://sukrupa.localhost/subscribeform" enctype="multipart/form-data" onsubmit="return validateForm();">

            <p class="fieldwrap"><label for="fm_name"><span class="required">*</span> Name</label><input class="fmtext" type="text" name="fm_name" id="fm_name" value=""></p>

            <p class="fieldwrap"><label for="fm_email"><span class="required">*</span> Email</label><input class="fmtext" type="text" name="fm_email" id="fm_email" value=""></p>

            <p class="fieldwrap"><label for="fm_confirmemail"><span class="required">*</span> Confirm Email</label><input class="fmtext" type="text" name="fm_confirmemail" id="fm_confirmemail" value=""></p>



<p><input type="hidden" name="MAX_FILE_SIZE" value="1000000"></p>
<div class="submit"><input type="submit" name="form_submitted_3" value="Submit"></div>

</form></div>

<!-- END of Dagon Design Formmailer output -->



		</div>
    <?php else: ?>

    <form name="subscriber">
            <input type="hidden" name="subscriberName" />
            <input type="hidden" name="subscriberEmail" />
        </form>
        <script type="text/javascript">
           var subscriberName = "<?php echo $subscriberName; ?>";
            var subscriberEmail ="<?php echo $subscriberEmail; ?>";
            document.forms['subscriber'].subscriberName.value = subscriberName;
            document.forms['subscriber'].subscriberEmail.value = subscriberEmail;
           alert("subscriberName: " + subscriberName);
           alert("subscriberEmail: " + subscriberEmail);

           var datastring ='subscriberName'+subscriberName+'&subscriberEmail'+subscriberEmail;
           $.ajax({
               type:"POST",
               url: "http://localhost:8080/addsubscriberinfo",
               data: datastring,
               success:function(){
               $('#subscriber').html("<div id='message'></div>");
                       $('#message').html("<h2>hi</h2>")
           }

           });
            //document.forms['subscriber'].submit();
        </script>
        <p>Thank you for your interest in Sukrupa. You are now subscribed.</p>
    <?php endif ?>
	</div>
<?php
    get_sidebar();
get_footer(); ?>