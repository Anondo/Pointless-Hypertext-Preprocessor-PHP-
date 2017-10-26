<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <form action = "<?php $_PHP_SELF ?>" method = "POST">
        ARGUMENT 1:
        <input type = "number" step = "0.01" name = "arg1"/>
        <br />
        ARGUMENT 2:
        <input type = "number" step = "0.01" name = "arg2" />
        <br />
        <input type = "submit" name = "submitButton" value="Calc" />
    </form>
</body>
</html>

<?php

if(isset($_POST["arg1"]) && isset($_POST["arg2"]))
{
    if($_POST["arg1"] && $_POST["arg2"])
    {
        echo "<p>".$_POST["arg1"]." + ".$_POST["arg2"]." = ".((double)$_POST["arg1"] + (double)$_POST["arg2"])."</p>";
        echo "<p>".$_POST["arg1"]." - ".$_POST["arg2"]." = ".((double)$_POST["arg1"] - (double)$_POST["arg2"])."</p>";
        echo "<p>".$_POST["arg1"]." / ".$_POST["arg2"]." = ".$_POST["arg1"] / $_POST["arg2"]."</p>";
        echo "<p>".$_POST["arg1"]." * ".$_POST["arg2"]." = ".$_POST["arg1"] * $_POST["arg2"]."</p>";
    }
    else
    {
        echo "<p>Invalid Entry</p>";
    }
}

 ?>
