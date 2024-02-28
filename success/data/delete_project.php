<?php
require_once "db_functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $result = delete_project($id);

    if ($result) {
        echo json_encode(array("status" => "success", "message" => "Project deleted successfully."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to delete project."));
    }
}
?>
