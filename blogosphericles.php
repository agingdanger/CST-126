<?php

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
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
        
        
        
        
/*if ((!isset($_POST['name'])) || (!isset($_POST['password']))) {
// visitor needs to enter a name and password
    ?>
    <h1>Please Log In</h1>
    <p>This page is secret.</p>
    <form method="post" action="secret.php">
        <p><label for="name">Username:</label>
            <input type="text" name="name" id="name" size="15" /></p>
        <p><label for="password">Password:</label>
            <input type="password" name="password" id="password" size="15" /></p>
        <button type="submit" name="submit">Log In</button>
    </form>
    <?php
} else if(($_POST['name']=='user') && ($_POST['password']=='pass')) {
// visitor's name and password combination are correct
    echo '<h1>Here it is!</h1>
<p>I bet you are glad you can see this secret page.</p>';
} else {
// visitor's name and password combination are not correct
    echo '<h1>Go Away!</h1>
<p>You are not authorized to use this resource.</p>';
}*/

//</body>
//</html>

