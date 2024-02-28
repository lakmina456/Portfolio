<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "user_auth.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = loginUser($username, $password);

    if ($result === true) {
        $_SESSION['username'] = $username;
        header("Location: index1.html");
        exit();
    } else {
        echo "<script>alert('Enterd Username or Password incorrect!!');</script>";
        header("Location: error.php");
        exit();
    }
}

?>
