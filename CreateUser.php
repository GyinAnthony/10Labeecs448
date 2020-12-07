<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $Exists = FALSE;
    $username = $_POST['username'];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "anthongao", "do9aeWu3",
    "anthongao");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $Stuff = "SELECT `user_id` FROM Users"; 
    $result = $mysqli->query($Stuff);
    while ($row = $result->fetch_assoc()) 
    {
        $temp = $row['user_id'];
        if($temp == $username) 
        {
            $Exists = TRUE;
        }
    }

    if($username != "") 
    {
        if($Exists) {
            echo "Error, already exist." . "<br>";
        }
        else 
        {
            $query = "INSERT INTO Users (`user_id`) VALUES ('$username')";
            $mysqli->query($query);
            echo "User saved! <br>";
        }
    }
    else 
    {
        echo "Error, cannot register user, field is blank." . "<br>";
    }
    $mysqli->close();

?>