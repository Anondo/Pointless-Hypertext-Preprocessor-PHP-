function isAnyFieldEmpty()
{
    var error = document.getElementById("emptyField_error");
    var username_email = document.getElementById('username_email');
    var password = document.getElementById('password');
    if(username_email.value == "" || password.value == "")
    {
        //alert("None of the fields can be empty!");
        error.innerHTML = "None of the fields can be empty!";
        return false;
    }
    error.innerHTML = "";
    return true;
}
