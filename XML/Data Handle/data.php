<?php

$username = $_POST["username"];
$password = $_POST["pass"];
$operation = $_POST["operation"];
$xml = simplexml_load_file("mydata.xml") or die("Could not create object!");
if(!empty($username) && !empty($password))
{
    if($operation == "Check")
    {
        echo "<h2>Check Operation Results:</h2>";
        $valid = false;
        foreach($xml->user as  $user)
        {
            if($user->username == $username && $user->password ==  $password)
            {
                $valid = true;
                break;
            }
        }
        if($valid)
            echo "<p>The User $username is valid</p>";
        else
            echo "<p>Invalid User</p>";
    }
    elseif($operation == "Insert")
    {
        echo "<h2>Insertion Operation Result:</h2>";
        $child = $xml->addChild("user");
        $child->addChild("username" , $username);
        $child->addChild("password" , $password);
        file_put_contents("mydata.xml" , $xml->asXML());
        echo "<p>Inserted</p>";
    }
}
else
{
    echo "<h1>Empty Form</h1>";
}



 ?>
