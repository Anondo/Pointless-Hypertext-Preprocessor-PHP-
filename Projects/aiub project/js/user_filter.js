$(document).ready(function() {
    var total_users = $(".users").length;
    $("#searchbox").keyup(function() {

        var key = $("#searchby option:selected").val();
        var value = $(this).val();
        if(value != "")
        {
            $.get("http://localhost:"+location.port+"/Projects/aiub project/Views/action/user_filter.php?key="+key+"&value="+value,
            function(data , status)
            {
                if(data != "")
                    var json_data = JSON.parse(data);
                else
                    var json_data = [];
                for(var i = 0; i < total_users; i++)
                {
                    $(".users").eq(i).hide();
                    for(var j = 0; j < json_data.length; j++)
                    {
                        $(".users[id="+json_data[j].user_id+"]").show();
                    }
                }
            });
        }
        else
        {
            for(var i = 0; i < total_users; i++)
                $(".users").eq(i).show();
        }
    });
});
