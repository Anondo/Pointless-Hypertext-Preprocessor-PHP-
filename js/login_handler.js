function isAnyFieldEmpty()
{
    var username_email = document.getElementById('username_email');
    var password = document.getElementById('password');
    if(username_email.value == "" || password.value == "")
    {
        alert("None of the fields can be empty!");
        return false;
    }
    return true;
}
