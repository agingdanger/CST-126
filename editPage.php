<?php

session_start();

$blogID = $_POST['editt'];
$act = $_POST['act'];

echo $blogID . "<br>";

$conn = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "g7t9d2srsz60d6e8", "peqn2hgv8zm6awzt", "lhhymmozru2i72c4");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($act == 0) {
    $sqlEdit = "SELECT * FROM blogPost WHERE postID = $blogID";

    $post = "";

    if ($result = mysqli_query($conn, $sqlEdit)) {
         if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $post = $row['pos'];

        }
    }


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
    <form action="editPage.php" method="POST">
        <textarea id="comment" name="comment" rows="35" cols="80"><?= $post ?></textarea>
        <br>
        Share<br></label>
        <input type="submit" value="->">
        <input id="edit" type="hidden" name="editt" value="<?= $blogID ?>">
        <input id="edit" type="hidden" name="act" value="1">
    </form>
    </body>
    </html>

    <?php
}
else{
    $pos = $_POST['comment'];
    $sql = "UPDATE blogPost SET pos = '$pos' WHERE postID = $blogID";

    $result = mysqli_query($conn, $sql);

    include("blogPage.php");
}
/**
 * Created by PhpStorm.
 * User: Chuckman
 * Date: 10/31/2018
 * Time: 9:54 PM
 */