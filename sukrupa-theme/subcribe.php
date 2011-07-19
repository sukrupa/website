<?php
/*
Template Name: Subscribe Page
*/
    get_header();
?>

<script type="text/javascript">

    $(function() {
        $(".button").click(function() {
            if (validateForm() ) {
                var subscriberName = $("input#fm_name").val();
                var subscriberEmail = $("input#fm_email").val();
               var datastring ='subscriberName='+subscriberName+'&subscriberEmail='+subscriberEmail;
               $.ajax({
                   type:"POST",
                   url: "../ajaxproxy.php",
                   data: datastring,
                   success:function(result,status,XHR){
                       if(result == "Success"){
                            $('#errorMessage').hide();
                            $('#subscriberform').html("<div id='message'></div>");
                            $('#message').html("<h2>Thank you for your interest in Sukrupa. You are now subscribed.</h2>");
                       }
                       else{
                            $('#errorMessage')[0].innerHTML = "Admin Server is down. Please contact the Administrator."
                       }
                   }
/*                   statusCode: {
                       404: function(){
                           alert("Service Down");
                       }
                   },
                   error: function( xhr, ajaxOptions, thrownError) {
                       alert(xhr.statusText);
                       alert(thrownError);
                   }*/
/*                   complete : function(transport){
                       if(transport.status == 200){
                           alert('Success');
                       }
                       else{
                           alert(transport.status);
                       }
                   }*/
               });
            }
           return false;
        });
    });
</script>


<div class="grid_18">

    <div class="inset">
        <h2 style="margin-bottom:0;">Subscribe</h2>
        <p></p>
    </div>

    <div id="the_content">
        <span id="errorMessage" class="error"></span>

        <!-- START of Dagon Design Formmailer output -->

        <div class="ddfmwrap">
            <form id="subscriberform" class="ddfm" action="" >

                <p class="fieldwrap"><label for="fm_name"><span class="required">*</span> Name</label><input class="fmtext" type="text" name="fm_name" id="fm_name" value=""></p>

                <p class="fieldwrap"><label for="fm_email"><span class="required">*</span> Email</label><input class="fmtext" type="text" name="fm_email" id="fm_email" value=""></p>

                <p class="fieldwrap"><label for="fm_confirmemail"><span class="required">*</span> Confirm Email</label><input class="fmtext" type="text" name="fm_confirmemail" id="fm_confirmemail" value=""></p>

                <p><input type="hidden" name="MAX_FILE_SIZE" value="1000000"></p>

                <div class="submit"><input type="submit" class="button" name="form_submitted_3" value="Submit"></div>

            </form>
        </div>

        <!-- END of Dagon Design Formmailer output -->

	</div>


	</div>

<?php
    get_sidebar();
    get_footer();
?>