function updateCrimeOnLocation(location)
{
    var flag = false;
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var response = this.responseText;
            if(response == "ok")
            {
                flag = true;
            }
        }
    }
    ajax.open("GET" , "http://localhost/Projects/aiub project/Views/action/update_crime_on_location.php?loc_name="+location, false);
    ajax.send();
    return flag;
}
