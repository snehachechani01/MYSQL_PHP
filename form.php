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
            width: 100%
        }

        p {
            width: 450px;
            text-align: center;
            color: #ffffff;
            font-size: 40px;
            padding: 2%;
            background: linear-gradient(90deg, #020024 0%, #340979 37%, #00d4ff 94%);

        }

        div {

            margin: 10% 0% 0% 30%;
        }
    </style>

</body>

</html>


<?php
$conn = mysqli_connect("localhost", "admin", "admin", "formvalid");
if (!$conn) {
    die("connection failed" . mysqli_connect_error());
} else {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $createdb = "CREATE DATABASE formvalid ";
    $createtb = "CREATE TABLE admininfo(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(15) NOT_NULL, password VARCHAR(15) NOT_NULL)";
    $inserttb = "INSERT INTO admininfo(username,password ) VALUES ('ankit','arora')";

    $query = "SELECT `username`,`password` FROM admininfo ";
    $result = mysqli_query($conn, $query);
    echo "<div>";
    $pass = false;
    $user = False;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["username"] == $username) {
                $user = true;
                if ($row["password"] == $password) {
                    $pass = true;

                    break;
                }
            }
        }
    }
    if ($user) {
        if ($pass) {
            header("Location: post.html", true, 301);
        } else {
            echo "<p>Invalid Password</p> ";
        }
    } else {
        echo "<p>Invalid Username</p> ";
    }
    echo "</div>";
}


mysqli_close($conn);
?>