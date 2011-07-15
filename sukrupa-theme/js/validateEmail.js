function validateForm() {
    var email = document.forms["subscriberform"].fm_email.value;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    var name = document.forms["subscriberform"].fm_name.value;
    if (name == ""){
       // alert("Please Enter a name");
        $("#errorMessage")[0].innerHTML = "Please enter a name!";
        return false;
    }
    if(email == ""){
        //alert("Please Enter an Email Address");
        $("#errorMessage")[0].innerHTML = "Please enter an email address!";
        return false;
    }
    var confirmEmail = document.forms["subscriberform"].fm_confirmemail.value;
    if(email != confirmEmail){
        //alert("Both email addresses don't match");
        $("#errorMessage")[0].innerHTML = "Both email addresses don't match!";
        return false;
    }
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
        //alert("Not a valid e-mail address");
        $("#errorMessage")[0].innerHTML = "The email you specified is invalid!";
        return false;
    }
    return true;
}