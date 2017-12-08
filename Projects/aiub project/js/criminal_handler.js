function rmvCriminal(id)
{
    var flag = confirm("Are You Sure You Want To Remove This Criminal?");
    if(flag)
    {
        var criminal = document.getElementById(id);
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                var ok = this.responseText;
                if(ok == "ok")
                    criminal.parentNode.removeChild(criminal);
                else
                    alert(ok);
            }
        }
        ajax.open("GET" , "http://localhost:"+location.port+"/Projects/aiub project/admin/criminal_delete.php/?criminal_id="+id , false);
        ajax.send();
    }

}
function validate()
{
    var form = document.forms["criminal_form"];
    var first_name = form['fname'].value;
    var last_name = form["lname"].value;
    var email = form['email'].value;
    var propic = form['propic'].value;
    if(emptyFieldValidate(first_name , last_name , email) && emailValidate(email)  && pictureValidate(propic))
    {
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
        //document.forms['criminal_form']['email'].value = "";
        document.forms['criminal_form']['email'].focus();
        if(email.length == 0)
            error.innerHTML = "";
        else
            error.innerHTML = "Invalid Email Pattern";
        return false;
    }
    error.innerHTML = "";
    return true;
}
function emptyFieldValidate(fname , lname , email )
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
            document.forms["criminal_form"]['propic'].value = "";
            return false;
        }

    }

    return true;
}
function addYears()
{
    var currentYear = (new Date()).getFullYear();
    var yearElem = document.forms['criminal_form']['year'];
    for(var i = 1935; i <= currentYear; i++)
    {
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        yearElem.appendChild(opt);
    }
}
