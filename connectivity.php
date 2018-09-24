
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


//$ID = $_POST['user'];
//$Password = $_POST['pass'];

function SignIn()
{

       //starting the session for user profile page
    session_start();
    if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query =("SELECT *  FROM user where userName = '$_POST[user]' AND = '$_POST[pass]'") or die(mysql_error());
        $row =($query) or die();
        $result=mysql_query($query);
        $count=mysql_num_rows($result);
        
        if ($count==1) {
            echo "Success! $count";
        } else {
            echo "Unsuccessful! $count";
        }
        
        if(!empty($row['userName'])/* AND !empty($row['pass'])*/)
        {
            $_SESSION['userName'] = $row['pass'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";

        }
        else
        {
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
    }
    else{
        echo "your done";
    }
}
if(isset($_POST['submit']))
{
    SignIn();
}
