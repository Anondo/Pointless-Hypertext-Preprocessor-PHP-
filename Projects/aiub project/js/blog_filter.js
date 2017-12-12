$(document).ready(function() {
    var no_of_blogs = $(".blogs").length;
    $("#searchbox").keyup(function() {
        for(var i = 0; i < no_of_blogs; i++)
            $(".blogs").eq(i).show();

        var query = $(this).val();
        if(query != "")
        {
            var by = $("#searchby option:selected").val();
            for(var i = 0; i < no_of_blogs; i++)
            {
                var key = $(".blog ."+by).eq(i).text();
                if(key.search(query))
                    $(".blogs").eq(i).hide();
            }
        }
    });
});
