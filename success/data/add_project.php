<?php
session_start();

require_once "db_functions.php";

// Get form data
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];}


$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image']['name'];

$imagePath = '../../img/' . $image;
if (is_uploaded_file($_FILES['image']['tmp_name']))
{       
    //in case you want to move  the file in uploads directory
     move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
     
     
}
// Insert the project details into the database
$insertResult = insert_project($username, $title, $description,'img/'.$image);

if ($insertResult) {
    header("Location: ../../index1.php");
    exit;
} else {
    echo "Failed to add the project.";
}
?>
