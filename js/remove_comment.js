function rmvComment(id)
{
    var flag = confirm("Are You Sure You Want To Remove This Comment?");
    if(flag)
    {
        var comment = document.getElementById(id);
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                var ok = this.responseText;
                if(ok == "ok")
                    comment.parentNode.removeChild(comment);
                else
                    alert(ok);
            }
        }
        ajax.open("GET" , "http://localhost/Projects/aiub project/Views/action/comment_delete.php/?comment_id="+id , false);
        ajax.send();
    }

}
