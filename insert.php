
<?php

/**
 * Created by PhpStorm.
 * User: Preston, Charles, Kevin, Filiberto
 * Date: 9/9/2018
 * Time: 3:42 PM
 */

$port = 3306;
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (!empty($username) && !empty($password) && !empty($email)) {

    @$db = mysqli_connect("https://stormy-gorge-83409.herokuapp.com", "root", "root", "users");
}else {
    echo "All values must be entered";
    exit("1");
}
mysqli_select_db("\mysqli", "users");
{

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
    }else{
        echo "Connection successful ";

    }

    $sql = "INSERT INTO users (userName,userPass,userEmail) VALUES ('$username', '$password', '$email')";

    if(mysqli_query($db, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
}
