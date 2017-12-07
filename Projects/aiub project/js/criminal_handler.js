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
