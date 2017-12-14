$(document).ready(function() {
    var total_criminals = $(".criminals").length;
    $("#searchbox").keyup(function() {

        var key = $("#searchby option:selected").val();
        var value = $(this).val();
        if(value != "")
        {
            $.get("http://localhost:"+location.port+"/Projects/aiub project/Views/action/criminal_filter.php?key="+key+"&value="+value,
            function(data , status)
            {
                if(data != "")
                    var json_data = JSON.parse(data);
                else
                    var json_data = [];
                for(var i = 0; i < total_criminals; i++)
                {
                    $(".criminals").eq(i).hide();
                    for(var j = 0; j < json_data.length; j++)
                    {
                        $(".criminals[id="+json_data[j].criminal_id+"]").show();
                    }
                }
            });
        }
        else
        {
            for(var i = 0; i < total_criminals; i++)
                $(".criminals").eq(i).show();
        }
    });
});
