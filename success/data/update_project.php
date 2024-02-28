<?php
require_once "db_functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_POST["image"];


    $result = update_project($id, $username, $title, $description, $image);

    if ($result) {
        // Redirect to the page where the project details are displayed after the update
        header("Location: ../../index1.php?id=".$id);
        exit();
    } else {
        // Handle update failure, e.g., display an error message
        echo "Failed to update project.";
    }
}
?>
