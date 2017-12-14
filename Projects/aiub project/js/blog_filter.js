$(document).ready(function() {
    var no_of_blogs = $(".blogs").length;
    $("#searchbox").keyup(function() {

        var query = $(this).val();
        if(query != "")
        {
            var by = $("#searchby option:selected").val();
            for(var i = 0; i < no_of_blogs; i++)
            {
                var key = $(".blogs ."+by).eq(i).text();
                if(!key.includes(query))
                    $(".blogs").eq(i).hide();
            }
        }
        else
        {
            for(var i = 0; i < no_of_blogs; i++)
                $(".blogs").eq(i).show();
        }
    });
});
