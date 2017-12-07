function nothing_wrong()
{
    var error = document.getElementById("blogDetails_error");
    var form = document.forms["blog_form"];
    if(form["body"].value == "" || form["title"].value == "")
    {
        //alert("Title & Body required");

        error.innerHTML = "Title & Body required";
        return false;
    }
    error.innerHTML = "";
    return true;
}
function blogDeletePrompt()
{
    var sure = confirm("Are You Sure You Want To Remove This Blog?");
    if(sure)
        return true;
    else
        return false;
}
