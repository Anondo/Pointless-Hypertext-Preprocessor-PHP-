$(document).ready(function() {
    var total_users = $(".users").length;
    $("#searchbox").keyup(function() {
        for(var i = 0; i < no_of_blogs; i++)
            $(".users").eq(i).show();

        var query = $(this).val();
        if(query != "")
        {
            var by = $("#searchby option:selected").val();
            for(var i = 0; i < no_of_blogs; i++)
            {
                var key = $(".users ."+by).eq(i).text();
                if(by == "aabelow")
                {
                    var query_age = parseInt(key);
                    var actual_age = parseInt($(".users .aabelow").eq(i).text());
                    if(actual_age > query_age)
                        $(".users").eq(i).hide();
                }
                else if(by == "aabove")
                {
                    var query_age = parseInt(key);
                    var actual_age = parseInt($(".users .aabove").eq(i).text());
                    if(actual_age < query_age)
                        $(".users").eq(i).hide();
                }
                else(!key.includes(query))
                    $(".users").eq(i).hide();
            }
        }
    });
});
