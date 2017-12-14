$(document).ready(function() {
    var total_blogs = $(".blogs").length;
    $("#searchbox").keyup(function() {
        var key = $("#searchby option:selected").val();
        var value = $("#searchbox").val();
        $.get("http://localhost:"+location.port+"/Projects/aiub project/admin/admin_blog_filter.php?key="+key+"&value="+value,
        function(data , status)
        {
            if(value != "")
            {
                if(data != "")
                    var json_data = JSON.parse(data);
                else
                    var json_data = [];
                for(var i = 0; i < total_blogs; i++)
                {
                    $(".blogs").eq(i).hide();
                    for(var j = 0; j < json_data.length; j++)
                    {
                        $(".blogs[id="+json_data[j].blog_id+"]").show();
                    }
                }
            }
            else
            {
                for(var i = 0; i < total_blogs; i++)
                    $(".blogs").eq(i).show();
            }
        });
    });
});
