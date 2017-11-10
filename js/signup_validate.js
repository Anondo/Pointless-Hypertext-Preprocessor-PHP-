function validate()
{
    var form = document.forms["signupForm"];
    var first_name = form['fname'].value;
    var last_name = form["lname"].value;
    var username = form['uname'].value;
    var email = form['email'].value;
    var password = form['pass'].value;
    var conPassword = form['cpass'].value;
    var propic = form['propic'].value;
    if(emptyFieldValidate(first_name , last_name , username , email , password , conPassword) && usernameValidate(username) && emailValidate(email) && passwordValidate(password , conPassword) && pictureValidate(propic))
    {
        return true;
    }
    return false;

}
function passwordValidate(p , cp)
{
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
    if(p != cp)
    {
        alert("Passwords Do Not Match");

        valid = false;
    }
    else if(p.length < 8)
    {
        alert("Password length must be of at least 8 characters.");
        valid = false;
    }
    else if(!hasDigit || !hasSpChar)
    {
        alert("There Must Be At Least one digit and one special character in the password");
        valid = false;
    }
    else
        valid = true;
    if(valid)
    {
        return valid;
    }
    document.forms['signupForm']['pass'].value = "";
    document.forms['signupForm']['cpass'].value = "";
    document.forms['signupForm']['pass'].focus();
    return valid;
}
function emailValidate(email)
{
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
        alert("Invalid Email Pattern");
        document.forms['signupForm']['email'].value = "";
        document.forms['signupForm']['email'].focus();
        return false;
    }
    return true;
}
function emptyFieldValidate(fname , lname , uname , email , pass , cpass)
{
    if(fname == "" || lname == "" || uname == "" || email == "" || pass == "" || cpass == "")
    {
        alert("None of the fields can be empty");
        return false;
    }
    return true;
}
function usernameValidate(uname)
{
    var exists = true;
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var response = this.responseText;
            if(response == "exists")
            {
                alert("Username Already Exists");
                exists =  false;
            }
        }
    };
    ajax.open("GET" , "username_exists.php?username="+uname , false);
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
            document.forms["signupForm"]['propic'].value = "";
            return false;
        }

    }

    return true;
}
