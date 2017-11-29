function rmvUser(id)
{
    var flag = confirm("Are You Sure You Want To Remove This User?");
    if(flag)
    {
        var user = document.getElementById(id);
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                var ok = this.responseText;
                if(ok == "ok")
                    user.parentNode.removeChild(user);
                else
                    alert(ok);
            }
        }
        ajax.open("GET" , "http://localhost:"+location.port+"/Projects/aiub project/admin/user_delete.php/?user_id="+id , false);
        ajax.send();
    }

}
