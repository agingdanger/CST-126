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

$sql = "SELECT * FROM blogPost";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
        echo "<td>" . $row["postID"]. " - " . $row["pos"]. " " . $row["user_userID"] . "</td>";
        
		if($row["user_userID"] === $_SESSION['id']){
        ?>  
			
            <form action = "blogPage.php" method = "POST">
			<td>
				<input id = "delete" type = "submit" name = "delete_post" value = "Delete">
			</td>
			<input id = "deleet" type = "hidden" name = "deleet" value = "<?= $row['postID'] ?>">
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
            
            session_start();
            
            $DPost = $_POST["deleet"];
            
            
            
            $result = mysqli_query($conn, $sql);
            
            //"SELECT FROM blogPost WHERE postID == $DPost AND user_userID == $_SESSION('id') LIMIT 1"
    
            if($sql = "SELECT FROM blogPost WHERE postID = $DPost AND user_userID = $_SESSION('id')"){
                //if($sql = "SELECT FROM blogPost WHERE user_userID = $_SESSION('id') && SELECT FROM user WHERE userID = $_SESSION('id')"){
                $sql = "DELETE FROM blogPost WHERE postID = $DPost";
                if (mysqli_query($conn, $sql)) {
                    echo "fourth if";
                }
            }
            
            
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