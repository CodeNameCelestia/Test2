<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Background Image</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://i.imgur.com/pL4v865.jpeg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 200);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 100);
            max-width: 23%; /* Changeable width */
            width: 90%; /* Changeable width */
            opacity: 0.3; /* Opacity */
        }

        form {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name"><br>

        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name"><br>

        <label for="number">Number:</label><br>
        <input type="text" id="number" name="number"><br>

        <label for="birthday">Birthday:</label><br>
        <input type="text" id="birthday" name="birthday"><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = array();

        $fields = array("first_name", "last_name", "number", "birthday", "email", "password");
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[] = "Please fill in all fields.";
                break;
            }
        }

        if (empty($errors)) {

            echo "<h2>User Information</h2>";
            echo "<p><strong>First Name:</strong> " . $_POST['first_name'] . "</p>";
            echo "<p><strong>Last Name:</strong> " . $_POST['last_name'] . "</p>";
            echo "<p><strong>Number:</strong> " . $_POST['number'] . "</p>";
            echo "<p><strong>Birthday:</strong> " . $_POST['birthday'] . "</p>";
            echo "<p><strong>Email:</strong> " . $_POST['email'] . "</p>";
            echo "<p><strong>Password:</strong> " . $_POST['password'] . "</p>";
        } else {
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }
    ?>
</div>

</body>
</html>
