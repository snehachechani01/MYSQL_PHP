


<?php

$dbname = "myDB";
$tablename = "Post";
$id = $_POST["id"];
$posttitle = $_POST["posttitle"];
$postdescription = $_POST["postdescription"];
$conn = mysqli_connect("localhost", "admin", "admin");

echo "<div>";
//CREATE THE DATABASE
$sql = "CREATE DATABASE if not exists myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn = mysqli_connect("localhost", "admin", "admin", $dbname);
//Create the table

$createtable = "CREATE TABLE IF NOT EXISTS  $tablename(`id` INT(6) PRIMARY KEY, `PostTitle` VARCHAR(30), `PostDescription` VARCHAR(50))";



//Insert data into the table
$inserttable = "INSERT INTO `$tablename`(`id`,`PostTitle`,`PostDescription`) VALUES ($id,'$posttitle','$postdescription')";
if (mysqli_query($conn, $inserttable)) {
    echo "<p>Data inserted into table</p>";
} else {
    echo "<p>Error inserting data: " . mysqli_error($conn) . "</p>";
}
echo "</div>";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>
        body {
            width: 100%;
           
            background-size: 100%;

        }

        p {
            width: 50%;
            text-align: center;
            color: black;
            font-size: 30px;
            padding: 2%;

            background-color:palevioletred;

        }

        div {

            margin: 5% 0% 0% 30%;
        }

        input[type=submit] {
         
            background-color: papayawhip;
            color: black;
            padding: 16px 22px;
            font-weight: bolder;
            font-size: 22px;
            margin: 8px 5px;
            border:blanchedalmond;
            border-radius: 8px;
            cursor: pointer;
        }

        .form {
            width: 600px;
        }
    </style>

    <div class="form">
        <form id="form" method="post" action="">
            <input type="submit" value="Show Table" onclick="document.forms['form'].action='show.php'">
            <input type="submit" value="Update Table" onclick="document.forms['form'].action='update.html'">
            <input type="submit" value="Delete Table" onclick="document.forms['form'].action='delete.html'">

        </form>
    </div>

</body>

</html>