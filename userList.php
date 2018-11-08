<?php
session_start();

$conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");


$mod = $_POST['modd'];
$del = $_GET['cool'];

echo $mod;



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if($mod == 0) 
{
    $sql = "SELECT * FROM user";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result = mysqli_query($conn, $sql)) 
    {
        echo "<table>";
        
         while($row = mysqli_fetch_assoc($result))
         {
            echo "<tr>";
            
            
            echo "<td>" .  $row["userID"]  . " - " . $row["userPass"]  . " - " . $row["userName"] . " - " . $row["userEmail"] . " - " . $row["userAdmin"];      
            
            ?>
            
            <form action = "userList.php" method = "GET">
			<td>
				<input id = "delete" type = "submit" name = "delete_post" value = "Delete">
			</td>
			<input id = "deleet" type = "hidden" name = "deleet" value = "<?= $row['userID'] ?>">
                <input id = "deleet" type = "hidden" name = "cool" value = "1">

            </form>
            
            
            <?php

            //if($del = 1){

                $user = $_GET['userID'];

                echo $user;

                $sqll = "DELETE from 'user' WHERE userID = '$user'";

            //}

            if (userAdmin == 0){
             
                
                
            }
            if (userADmin== 1){


            }
                
         }
    }
}
    

  
?>