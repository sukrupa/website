function ajaxPost() {
    if (validateForm()) {
        var subscriberName = $("input#fm_name").val();
        var subscriberEmail = $("input#fm_email").val();
        var datastring = 'subscriberName=' + subscriberName.replace(" ", "_") + '&subscriberEmail=' + encodeURIComponent(subscriberEmail);
        $.ajax({
            type:"POST",
            url: "../ajaxproxy.php",
            data: datastring,
            success:function(result, status, XHR) {
                if (result == "Success") {
                    $('#errorMessage').hide();
                    $('#subscriberform').html("<div id='message'></div>");
                    $('#message').html("<h2>Thank you for your interest in Sukrupa. You are now subscribed.</h2>");
                }
                else {
                    $('#errorMessage')[0].innerHTML = "Admin Server is down. Please contact the Administrator."
                }
            }
        });
    }
    return false;
}