<?php

if(isset($_POST["arg1"]) && isset($_POST["arg2"]) && isset($_POST["operator"]))
{
    if($_POST["arg1"] && $_POST["arg2"])
    {
            if($_POST["operator"] == "add")
            {
                echo "<p>".$_POST["arg1"]." + ".$_POST["arg2"]." = ".((double)$_POST["arg1"] + (double)$_POST["arg2"])."</p>";
            }
            elseif ($_POST["operator"] == "sub")
            {
                echo "<p>".$_POST["arg1"]." - ".$_POST["arg2"]." = ".((double)$_POST["arg1"] - (double)$_POST["arg2"])."</p>";
            }
            elseif($_POST["operator"] == "mul")
            {
                echo "<p>".$_POST["arg1"]." * ".$_POST["arg2"]." = ".$_POST["arg1"] * $_POST["arg2"]."</p>";
            }
            else
            {
                echo "<p>".$_POST["arg1"]." / ".$_POST["arg2"]." = ".$_POST["arg1"] / $_POST["arg2"]."</p>";
            }
     }
    else
    {
        echo "<p>Invalid Entry</p>";
    }
}
echo "<a href = calc.html><button>Return</button></a>"


 ?>
