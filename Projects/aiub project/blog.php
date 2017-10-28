<html>
<head>
    <title>
        <?php
            require("Models.php");
            $db = new Models();
            if(isset($_GET["blog_id"]))
            {
                $id = $_GET["blog_id"];
                $result = $db->executeQuery("select title from blogs where blog_id = $id");
                $result = $result->fetch_assoc();
                echo $result["title"];
            }
            else
            {
                echo "Blog";
            }

         ?>
    </title>
</head>


<body>
    <table>
        <?php

            if(isset($_GET["blog_id"]))
            {
                $id = $_GET["blog_id"];
                $result = $db->executeQuery("select * from blogs where blog_id = $id");
                $blog = $result->fetch_assoc();
                $blogger = "Anonymous";
                if(!$blog["name_hidden"])
                {
                    $blogger_id = $blog["blogger_id"];
                    $idresult = $db->executeQuery("select username from users where user_id in (select blogger_id from blogs where blogger_id = $blogger_id);");
                    $blogger_name_row = $idresult->fetch_assoc();
                    $blogger = $blogger_name_row["username"];
                }
                echo "<tr>";
                echo "<td>";
                echo $blog["title"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo $blog["datetime"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo $blog["body"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo $blog["attachment"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo "By-----".$blogger;
                echo "</td>";
                echo "</tr>";
            }
            else
            {
                echo "Do Not Mess Up The URL";
            }

         ?>
    </table>
</body>




</html>
