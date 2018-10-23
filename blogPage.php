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
        echo $row["postID"]. " - " . $row["pos"]. " " . $row["user_userID"]. "<br>";
        
        //if($row["user_userID"] === $_SESSION['id']){
        //    
        
        //}
        
    }
} 
else 
{
echo "0 results";
}
    ?>
            <html>
            <form action = "blogPage.php" method = "POST">
            <input id = "delete" type = "submit" name = "delete_post" value = "Delete">
            Delete A Post
            <input id = "deleet" type = "text" name = "deleet" value = "Post ID">
            </form>
            </html>
            <?php
            
            session_start();
            
            $DPost = $_POST["deleet"];
            
            $result = mysqli_query($conn, $sql);
            
            //"SELECT FROM blogPost WHERE postID == $DPost AND user_userID == $_SESSION('id') LIMIT 1"
    
            if($sql = "SELECT FROM blogPost WHERE postID = $DPost")
                echo $sql;
                if($sql = "SELECT FROM blogPost WHERE user_userID = $_SESSION('id') && SELECT FROM user WHERE userID = $_SESSION('id')"){
                $sql = "DELETE FROM blogPost WHERE postID = $DPost";
                if (mysqli_query($conn, $sql)) {
                    echo "fourth if";
                }
            }
            
           
            
            session_start();
            
            $post = $_POST['comment'];
            
            $userID = $_SESSION['id'];
            
            
            if (empty($_SESSION)){
                echo "empty dawg";
            }
            print_r($_SESSION);
            
            //echo $_SESSION['userr'];
            
            
            //echo $_SESSION['id'];
            
            
            
            if(!empty($post)){
                
                echo $post;
                
                $conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");
                
                $sql = ("INSERT INTO blogPost (postId, pos, user_userID) VALUES ( '', '$post' , '$userID')");
                
            } else {
                echo "You need to type something in!";
                exit("1");
            }
            
            
            
            if(mysqli_query($conn, $sql)){
                echo "Blog Posted to our Records";
                ?>
    
    <!DOCTYPE HTML>
            <html>
            <head>
                <title>Log your whoa's</title>
                <link rel="stylesheet" type="text">
            </head>
            <body id="body-color">
            <div id="Sign-In">
                <fieldset style="width:30%"><legend>Continue to BLOG</legend>
                    <form  action="blogPage.php" method="POST">
                        
                        <input id="input" type="submit" name="submit" value="Contribute">
                    </form>
                </fieldset>
            </div>
            </body>
            </html>
            
	<?php
  //  require("blogPage.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
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