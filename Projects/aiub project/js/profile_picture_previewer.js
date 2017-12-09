function preview(input_elem)
{
    var input = input_elem;
    var fReader = new FileReader();
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function(event)
    {
        var img = document.getElementById("profile_pic");
        img.src = event.target.result;
    }

}
