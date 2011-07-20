<?php
/*
Template Name: Subscribe Page
*/
    get_header();
?>

<div class="grid_18">

    <div class="inset">
        <h2 style="margin-bottom:0;">Subscribe</h2>
        <p></p>
    </div>

    <div id="the_content">
        <span id="errorMessage" class="error"></span>

        <!-- START of Dagon Design Formmailer output -->

        <div class="ddfmwrap">
            <form id="subscriberform" class="ddfm" action="" onsubmit = "return ajaxPost()">

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