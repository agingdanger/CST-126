<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="UTF-8">
</head>
</html>

<?php

session_start();

$conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$DPost = $_POST["deleet"];

$result = mysqli_query($conn, $sql);

//"SELECT FROM blogPost WHERE postID == $DPost AND user_userID == $_SESSION('id') LIMIT 1"

if($sql = "SELECT FROM blogPost WHERE postID = $DPost AND user_userID = $_SESSION('id')"){
    //if($sql = "SELECT FROM blogPost WHERE user_userID = $_SESSION('id') && SELECT FROM user WHERE userID = $_SESSION('id')"){
    $sql = "DELETE FROM blogPost WHERE postID = $DPost";
    if (mysqli_query($conn, $sql)) {
        //echo "fourth if";
    }
}


$sql = "SELECT * FROM blogPost";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
        echo "<td>" . $row["postID"]. " - " . $row["pos"]. " " . $row["user_userID"] . "</td>";
        
		if($row["user_userID"] === $_SESSION['id'] || $_SESSION["admin"] == 1){
        ?>  
			
            <form action = "blogPage.php" method = "POST">
			<td>
				<input id = "delete" type = "submit" name = "delete_post" value = "Delete">
			</td>
			<input id = "deleet" type = "hidden" name = "deleet" value = "<?= $row['postID'] ?>">
            </form>

            <form action = "editPage.php" method = "POST">
                <td>
                    <input id = "edit" type = "submit" name = "edit" value = "Edit Post">
                </td>
                <input id = "edit" type = "hidden" name = "editt" value = "<?= $row['postID'] ?>">
                <input id = "edit" type = "hidden" name = "act" value = "0">
            </form>
		
		<?php
        }
        echo "</tr>";
    }
	echo "</table>";
}
else 
{
echo "0 results";
}
echo "<br>";
            

            
            
        //if  (mysqli_num_rows($result) > 0) {
        //    echo "first if";
        //    echo $DPost;
            
        //    while($row = mysqli_fetch_assoc($result)) {
        //        if(isset($_POST['delete_post'])){
        //            echo "second if";
        //            if($row["user_userID"] === $_SESSION['id']){
        //                    echo "third if";
                        
        //                $sql = "DELETE FROM blogPost WHERE postID = $DPost";
        //                if (mysqli_query($conn, $sql)) {
        //                   echo "fourth if";
        //                }
        //            }
        //            else exit(0);
                    
        //       }
        //   }
        //}

?>


<?php
session_start();
?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Secret Page</title>
</head>
<body>
<h1>Here it is!</h1>
<p>Post up.</p>
<form action="blogosphericles.php"  method="POST" >
    <textarea  id = "comment" name="comment" rows="35" cols="80">Say something</textarea>
    <br>
    Share<br></label>
    <input type="submit" value="->">
</form>
</body>
</html>

<?php 

if ($_SESSION["admin"] == 1)
{
    ?>
<form action="userList.php"  method="POST" >
    <input id = modd type="submit" value="Mod Users">
    <input id = "modd" type = "hidden" name = "modd" value = "0">
</form>
</body>
</html>

<?php 

    
}

?>




