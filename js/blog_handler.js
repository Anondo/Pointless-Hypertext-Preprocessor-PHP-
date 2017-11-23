function nothing_wrong()
{
    var form = document.forms["blog_form"];
    if(form["body"].value == "" || form["title"].value == "")
    {
        alert("Title & Body required");
        return false;
    }
    return true;
}
