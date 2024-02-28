<?php
require_once "db_functions.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $project = get_project_by_id($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
     <style>
                    /* styles.css */
            body {
                font-family: Arial, sans-serif;
                background-color: #f7f7f7;
                margin: 0;
                padding: 0;
            }

            .edit-project-form {
                max-width: 400px;
                margin: 30px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            form {
                display: grid;
                gap: 10px;
            }

            label {
                font-weight: bold;
            }

            input[type="text"],
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
            }

            button {
                width: 100%;
                padding: 10px;
                background-color: #007BFF;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #0056b3;
            }

            @media screen and (max-width: 480px) {
                .edit-project-form {
                    max-width: 90%;
                }
            }

     </style>
</head>
<body>
    <div class="edit-project-form">
        <h2>Edit Project</h2>
        <form action="update_project.php" method="post">
            <input type="hidden" name="id" value="<?php echo $project['ID']; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $project['Username']; ?>">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $project['Title']; ?>">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $project['Description']; ?></textarea>

            <label for="image">Image:</label>
            <input type="text" id="image" name="image" value="<?php echo $project['Image']; ?>">

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
