<?php
/**
 * Created by PhpStorm.
 * User: smith
 * Date: 9/20/2018
 * Time: 4:38 PM
 */

@$db = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");

if (mysqli_connect_errno($db)) {
    echo "Error: Could not connect to database.  Please try again later.";
}else{
    echo "Connection successful ";

}

echo $_POST['user'];
echo $_POST['pass'];
//$ID = $_POST['user'];
//$Password = $_POST['pass'];

$start = false;
//SignIn();

//function SignIn()
//{
    session_start();   //starting the session for user profile page
    //if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    if($start)
    {
        $query =mysql_query("SELECT *  FROM user where userName = '$_POST[user]' AND userPass = '$_POST[pass]'");// or die(mysql_error());
        $row =($query); //or die();
        if(!empty($row['userName']) AND !empty($row['userPass']))
        {
            $_SESSION['userName'] = $row['pass'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";

        }
        else
        {
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
    }
    else
    {
        echo "You suck.";
    }
//}
//if(isset($_POST['submit']))
//{
//    SignIn();
//}
