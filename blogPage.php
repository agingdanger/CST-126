<?php 

session_start();

$conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM blogPost";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["postID"]. " - Post " . $row["pos"]. " " . $row["user_userID"]. "<br>";
        
        if($row["user_userID"] === $_SESSION['id']){
            
            ?>
            <html>
            <form action = "blogPage.php" method = "POST">
            <input id = "delete" type = "submit" name = "delete_post" value = "Delete">
            Delete A Post
            <input id = "deleet" type = "text" name = "deleet" value = "Post ID">
            </form>
            </html>
            <?php
            $DPost = $_POST['deleet'];
        }
        if(isset($_POST['delete_post'])){
            //echo "Please get here";
            $sql = "DELETE FROM blogPost WHERE postID = $DPost";
        }
    }
	
} else {
    echo "0 results";
}

?>