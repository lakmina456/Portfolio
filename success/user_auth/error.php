<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #dc3545;
        }

        p {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        li {
            color: #dc3545;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>#Error Login</h1>
        <p>There was an error processing your login.Enterd Username or Password incorrect!!</p>
        <ul>
            <?php
            session_start();
            if (isset($_SESSION["errors"]) && !empty($_SESSION["errors"])) {
                foreach ($_SESSION["errors"] as $error) {
                    echo "<li>$error</li>";
                }
                unset($_SESSION["errors"]);
            }
            ?>
        </ul>
        <p>Please go back and correct.</p>
        <p><a href="login.html">Go back to login</a></p>
    </div>
</body>
</html>
