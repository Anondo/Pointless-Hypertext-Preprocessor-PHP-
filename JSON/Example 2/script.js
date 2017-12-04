function displayObjectInfo()
{
    var http = new XMLHttpRequest();
    http.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var studentObj = JSON.parse(this.responseText);
            document.getElementById('display').innerHTML = "Name = "+studentObj.name+"<br/>CGPA = "+studentObj.cgpa;
        }
    }
    http.open("GET" , "action.php" , true);
    http.send();
}
