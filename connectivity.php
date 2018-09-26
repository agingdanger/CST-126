<?php
/**
 * Created by PhpStorm.
 * User: smith
 * Date: 9/20/2018
 * Time: 4:38 PM
 */

$conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");

if (mysqli_connect_errno($conn)) {
    echo "Error: Could not connect to database.  Please try again later.";
}else{
    echo "Connection successful ";

}

//echo $_POST['userr'];
//echo $_POST['pass'];

$ID = $_POST['userr'];
$Password = $_POST['pass'];

$start = true;
//SignIn();

//function SignIn()
//{

        session_start();   //starting the session for user profile page
        //if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
        if($start)
        {
            //echo "you made it this far";
            
            $query = mysqli_query("SELECT *  FROM lhhymmozru2i72c4.user where userName = '$ID' AND userPass = '$Password'");// or die(mysqli_error());
            $result = mysqli_query($conn, $query);
            
            if ( false == $query){
                echo "error1: ", mysqli_error($query);
            }
            if ( false == $result){
                echo "error2: ", mysqli_error($result);
            }
            
            //echo "but not this far";
            //print_var( $result);
            
            $row =$query; //or die();
            //echo "how about dat";
            
            if(mysqli_num_rows($result) >= 1){
                while ($row = mysqli_fetch_assoc($result)){
                    echo "Name: " . $row["userName"]. "<br>";
                }
            }
            else{
                echo "0 results" . "<br>";
            }
            if(!empty($row['userr']) AND !empty($row['pass']))
            {
                echo "where";
                $_SESSION['userr'] = $row['pass'];
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
