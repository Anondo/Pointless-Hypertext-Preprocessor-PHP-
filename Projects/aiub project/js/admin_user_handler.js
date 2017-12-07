function validate(id)
{
    var form = document.forms["user_update_form"];
    var first_name = form['fname'].value;
    var last_name = form["lname"].value;
    var username = form['uname'].value;
    var email = form['email'].value;
    var password = form['pass'].value;
    var pro_pic = form["pro_pic"].value;
    if(emptyFieldValidate(first_name , last_name , username , email , password) && usernameValidate(username,id) && emailValidate(email,id) && passwordValidate(password) && pictureValidate(pro_pic))
    {
        //form.action = "http://localhost/Projects/aiub%20project/Views/action/register_user.php/?js_enabled="+true;
        return true;
    }
    return false;

}
function passwordValidate(p)
{
    var error = document.getElementById('password_error');
    var valid = true;
    var hasDigit = false;
    var hasSpChar = false;
    var spChars = ["@" , "#" , "!" , "$" , "%" , "&" , "|" , "_"];
    for(var i in p)
    {
        if(!isNaN(p[i]))
        {
            hasDigit = true;
            break;
        }
    }
    for(var i in p)
    {
        if(spChars.indexOf(p[i]) >-1)
        {
            hasSpChar = true;
            break;
        }
    }

    if(p.length < 8)
    {
        //alert("Password length must be of at least 8 characters.");
        error.innerHTML = "Password length must be of at least 8 characters";
        valid = false;
    }
    else if(!hasDigit || !hasSpChar)
    {
        //alert("There Must Be At Least one digit and one special character in the password");
        error.innerHTML = "There Must Be At Least one digit and one special character in the password";
        valid = false;
    }
    else
        valid = true;
    if(valid)
    {
        error.innerHTML = "";
        return valid;
    }
    //document.forms['signupForm']['pass'].value = "";
    //document.forms['signupForm']['cpass'].value = "";
    //document.forms['signupForm']['pass'].focus();
    return valid;
}
function emailValidate(email , id)
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
        document.forms['user_update_form']['email'].focus();
        if(email.length == 0)
            error.innerHTML = "";
        else
            error.innerHTML = "Invalid Email Pattern";
        return false;
    }
	else if(existingEmail(email , id))
	{
		return false;
	}
    error.innerHTML = "";
    return true;
}
function emptyFieldValidate(fname , lname , uname , email , pass , cpass)
{
    if(fname == "" || lname == "" || uname == "" || email == "" || pass == "")
    {
        alert("None of the fields can be empty");
        return false;
    }
    return true;
}
function usernameValidate(uname , id)
{
    var exists = true;
    var ajax = new XMLHttpRequest();
    var error = document.getElementById("username_error");
    ajax.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var response = this.responseText;
            if(response == "exists")
            {
                //alert("Username Already Exists");
                error.innerHTML = "Username Already Exists";
                exists =  false;
            }
        }
    };
    if(exists)
        error.innerHTML = "";
    ajax.open("GET" , "http://localhost:"+location.port+"/Projects/aiub%20project/admin/admin_username_exists.php?username="+uname+"&id="+id , false);
    ajax.send();
    return exists;
}
function existingEmail(email , id)
{
    var exists = false;
    var ajax = new XMLHttpRequest();
    var error = document.getElementById("email_error");
    ajax.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var response = this.responseText;
            if(response == "exists")
            {
                error.innerHTML = "Email Already Exists";
                exists =  true;
            }
        }
    };
    if(!exists)
        error.innerHTML = "";
    ajax.open("GET" , "http://localhost:"+location.port+"/Projects/aiub%20project/admin/admin_email_exists.php?email="+email+"&id="+id , false);
    ajax.send();
    return exists;
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
            document.forms["user_update_form"]['pro_pic'].value = "";
            return false;
        }

    }

    return true;
}
