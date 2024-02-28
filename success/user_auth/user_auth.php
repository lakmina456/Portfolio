<?php

session_start();

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "website";


function registerUser($username, $password)
{
    global $servername, $username, $password, $dbname;


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $stmt = $conn->prepare("INSERT INTO users (Username, Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {

        return true;
    } else {

        return false;
    }
}


function loginUser($username, $password)
{
    global $servername, $username, $password, $dbname;


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT Password FROM users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {

            $_SESSION['username'] = $username;
            return true;
        } else {

            return false;
        }
    } else {

        return false;
    }
}
?>
