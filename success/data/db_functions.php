<?php
require_once "db_connect.php";

// Insert new project details into the database
function insert_project($username, $title, $description, $image) {
    $conn = get_db_connection();

    $username = $conn->real_escape_string($username);
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $image = $conn->real_escape_string($image);

    $sql = "INSERT INTO projects (Username, Title, Description, Image) VALUES ('$username', '$title', '$description', '$image')";
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}


// Retrieve project data from the database
function get_projects() {
    $conn = get_db_connection();

    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);

    $projects = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    $conn->close();

    return $projects;
}
function get1_projects1() {
    $conn = get_db_connection();

    // Get the 9th and 1st row data
    $sql = "SELECT * FROM projects LIMIT 1 OFFSET 8";
    $result = $conn->query($sql);

    $projects = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    // Get the rest of the 9th row data
    $sql = "SELECT * FROM projects LIMIT 9, 18446744073709551615"; // A very large number to get the remaining rows
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    $conn->close();

    return $projects;
}

function get_rows(){
    $conn = get_db_connection();

    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql)->num_rows;
    return $result;
}

function get_project_by_id($id) {
    $conn = get_db_connection();

    $id = $conn->real_escape_string($id);

    $sql = "SELECT * FROM projects WHERE ID=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $project = $result->fetch_assoc();
    } else {
        $project = array(); 
    }

    $conn->close();

    return $project;
}
// Update project information
function update_project($id, $username, $title, $description, $image) {
    $conn = get_db_connection();

    $id = $conn->real_escape_string($id);
    $username = $conn->real_escape_string($username);
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $image = $conn->real_escape_string($image);

    $sql = "UPDATE projects SET Username='$username', Title='$title', Description='$description', Image='$image' WHERE ID=$id";
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

// Delete projects
function delete_project($id) {
    $conn = get_db_connection();

    $id = $conn->real_escape_string($id);

    $sql = "DELETE FROM projects WHERE ID=$id";
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}
?>
