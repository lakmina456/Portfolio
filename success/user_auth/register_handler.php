<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "user_auth.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = registerUser($username, $password);

    if ($result === true) {
        header("Location: registration_success.php");
    } else {
        echo "Registration failed: " . $result;
    }
}
?>
