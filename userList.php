<?php
session_start();

$conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");


$mod = $_POST['modd'];
$del = $_POST['cool'];
$modd = $_POST['moddd'];

echo $mod;



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($del == 1){

    $user = $_POST['deleet'];

    $sql = "DELETE FROM blogPost WHERE user_userID = " . $user;

    $result = mysqli_query($conn, $sql);

    $sql = "DELETE FROM user WHERE userID = " . $user;

    $result = mysqli_query($conn, $sql);

}

if($modd == 1){

    $user = $_POST['mod'];

    $sql = "UPDATE user SET userAdmin = 1 WHERE userID = " . $user;

    $result = mysqli_query($conn, $sql);

}
if($modd == 2){

    $user = $_POST['mod'];

    $sql = "UPDATE user SET userAdmin = 0 WHERE userID = " . $user;

    $result = mysqli_query($conn, $sql);

}

if($mod == 0) 
{
    $sql = "SELECT * FROM user";
    
    if ($result = mysqli_query($conn, $sql)) 
    {
        echo "<table>";
        
         while($row = mysqli_fetch_assoc($result))
         {
            echo "<tr>";
            
            
            echo "<td>" .  $row["userID"]  . " - " . $row["userPass"]  . " - " . $row["userName"] . " - " . $row["userEmail"] . " - " . $row["userAdmin"] . "</td>";
            $admin = $row["userAdmin"];
            if($admin == 0) {
                ?>

                <form action="userList.php" method="POST">
                    <td>
                        <input id="delete" type="submit" name="delete_post" value="Delete">
                    </td>
                    <input id="deleet" type="hidden" name="deleet" value="<?= $row['userID'] ?>">
                    <input id="deleet" type="hidden" name="cool" value="1">

                </form>
                <?php
            }

            //in the statement below which echo's 1 or two int the moddd value it actually changes the value of moddd
            // rather than just echoing the number
                ?>


             <form action = "userList.php" method = "POST">
             <td>
             <input id = "mod" type = "submit" name = "Mod" value = <?php if($admin == 0) echo "Mod"; else echo "Un-Mod"; ?>>

             </td>

             <input id = "mod" type = "hidden" name = "mod" value = "<?= $row['userID'] ?>">

             <input id = "mod" type = "hidden" name = "moddd" value = <?php if($admin == 0) echo "1"; else echo "2"; ?>>

             </form>

             </tr >

            
            <?php

            if (userAdmin == 0){
             
                
                
            }
            if (userADmin== 1){


            }
                
         }

         echo "</table>";
    }
}
    

  
?>