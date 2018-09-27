<?php
/**
 * Created by PhpStorm.
 * User: smith
 * Date: 9/20/2018
 * Time: 4:38 PM
 */

//$conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
}else{
    echo "Connection successful ";

}

/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn()
{
    session_start();   //starting the session for user profile page
    if(!empty($_POST['userr']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");
        
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.  Please try again later.";
        }else{
            echo "Connection successful ";
            
        }
        
        $query = ("SELECT *  FROM user where userName = '$_POST[userr]' AND userPass = '$_POST[pass]'") or die(mysql_error());  
        $result = $conn->query($query);
        $row = ($result) or die();
        echo "Does it reach here?";
        
       if($result = mysqli_query($conn, $query)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['userID'] . "</td>";
                    echo "<td>" . $row['userName'] . "</td>";
                    echo "<td>" . $row['userPass'] . "</td>";
                    echo "<td>" . $row['userEmail'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
        }
        
        
        if(!empty($row['userName']) && !empty($row['userPass']))
        {
            $_SESSION['userr'] = $row['userPass'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";

        }
        else
        {
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
    }
    else{
        echo "you suck.";
    }
}
if(isset($_POST['submit']))
{
    SignIn();
}
