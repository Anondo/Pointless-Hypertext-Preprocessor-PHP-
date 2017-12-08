function validate()
{
    var form = document.forms["criminal_update_form"];
    var first_name = form['fname'].value;
    var last_name = form["lname"].value;
    var email = form['email'].value;
    var pro_pic = form["pro_pic"].value;
    if(emptyFieldValidate(first_name , last_name , email)  && emailValidate(email) && pictureValidate(pro_pic))
    {
        //form.action = "http://localhost/Projects/aiub%20project/Views/action/register_user.php/?js_enabled="+true;
        return true;
    }
    return false;

}

function emailValidate(email)
{
    var error = document.getElementById('email_error');
    var countDot = 0;
    var countAt = 0;
    var dotIndex = email.indexOf('.');
    var atIndex = email.indexOf('@');
    for(var i in email)
    {
        if(email[i] == '.')
            countDot++;
        if(email[i] == '@')
            countAt++;
    }
    if(countDot > 1 || countAt > 1 || dotIndex == -1 || atIndex == -1 || (dotIndex < atIndex))
    {
        //alert("Invalid Email Pattern");
        //document.forms['user_update_form']['email'].value = "";
        document.forms['criminal_update_form']['email'].focus();
        if(email.length == 0)
            error.innerHTML = "";
        else
            error.innerHTML = "Invalid Email Pattern";
        return false;
    }
    error.innerHTML = "";
    return true;
}
function emptyFieldValidate(fname , lname , email)
{
    if(fname == "" || lname == "" || email == "")
    {
        alert("None of the fields can be empty");
        return false;
    }
    return true;
}
function pictureValidate(pp)
{
    if(pp != "")
    {
        var extensions = ["jpg" , "jpeg" , "png" , "gif"];
        var exnt = pp.split(".")[1];
        if(!(extensions.indexOf(exnt) > -1))
        {
            alert("Picture Format Not Recognized");
            document.forms["criminal_update_form"]['pro_pic'].value = "";
            return false;
        }

    }

    return true;
}
