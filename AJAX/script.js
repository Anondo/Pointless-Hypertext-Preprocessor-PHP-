function execute()
{
    var argument = parseInt(document.getElementById('argument').value);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            alert(this.responseText);
        }
    }
    xmlhttp.open("GET" , "action.php?number="+ argument, true);
    xmlhttp.send();
}
