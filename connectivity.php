<!DOCTYPE HTML>
<html>
<head>
    <title>Sign-In</title>
    <link rel="stylesheet" type="text">
</head>
<body id="body-color">
<div id="Sign-In">
    <fieldset style="width:30%"><legend>LOG-IN HERE</legend>
        <form method="POST" action="connectivity.php">
            User <br><label>
            <input type="text" name="user" size="40">
        </label><br>
            Password <br><label>
            <input type="password" name="pass" size="40">
        </label><br>
            <input id="button" type="submit" name="submit" value="Log-In">
        </form>
    </fieldset>
</div>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: smith
 * Date: 9/20/2018
 * Time: 4:38 PM
 */

@$db = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
}else{
    echo "Connection successful ";

}


$ID = $_POST['user'];
$Password = $_POST['pass'];

function SignIn()
{
    session_start();   //starting the session for user profile page
    if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query =("SELECT *  FROM user where userName = '$_POST[user]' AND FROM user where userPass = '$_POST[pass]'") or die(mysql_error());
        $row =($query) or die();
        if(!empty($row['userName']) AND !empty($row['pass']))
        {
            $_SESSION['userName'] = $row['pass'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";

        }
        else
        {
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
    }
}
if(isset($_POST['submit']))
{
    SignIn();
}
