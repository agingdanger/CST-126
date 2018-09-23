
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

    $conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");
}else {
    echo "All values must be entered";
    exit("1");
}
mysqli_select_db("\mysqli", "user");
{

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
    }else{
        echo "Connection successful ";

    }

	


    $sql = "INSERT INTO user (userName,userPass,userEmail) VALUES ('$username', '$password', '$email')";

    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
}

?>

<form action = "content.html">
	Please immediately press the button<br>
	
	<input type = "submit" value= "Button">
</form>
