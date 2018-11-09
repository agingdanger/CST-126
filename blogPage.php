<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }
            .topnav a, .topnav input[type=text], .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }
            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }
    </style>
</head>
<body>

<div class="topnav">
    <div class="search-container">
        <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<div style="padding-left:16px">
    <h2>Responsive Search Bar</h2>
    <p>Navigation bar with a search box and a submit button inside of it.</p>
    <p>Resize the browser window to see the responsive effect.</p>
</div>

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
<h1>Post Up!</h1>
<form action="blogosphericles.php"  method="POST" >
    <textarea  id = "comment" name="comment" rows="35" cols="80">Say something</textarea>
    <br>
    Share<br></label>
    <input type="submit" value="->">
</form>
</body>
</html>

