<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        html {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-image: url('https://i.imgur.com/pL4v865.jpeg');
            background-size: cover;
            background-position: center;
            display: flex;
            height: 100vh;
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 550px;
            padding: 40px;
            background: rgba(0, 0, 0, .4);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .5);
            border-radius: 10px;
            color: white;
            overflow: hidden; /* Ensure contents don't overflow */
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: white;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus ~ label,
        .login-box .user-box input:valid ~ label {
            top: -20px;
            left: 0;
            color: white;
            font-size: 12px;
        }

        .login-box form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            border: 1px solid #242424;
            border-radius: 5px;
            background: transparent;
            cursor: pointer;
            transition: background 0.3s, color 0.3s
        }

        .login-box form input[type="submit"]:hover {
            background: #242424;
            color: white;
            box-shadow: 0 0 5px #242424, 0 0 25px #242424, 0 0 50px #242424, 0 0 100px #242424;
            /* Remove */
        }

        /* Custom Font Style */
        @font-face {
            font-family: 'MyCustomFont';
            src: url('path/to/your/font.ttf') format('truetype');

        }
        body {
            font-family: 'MyCustomFont', sans-serif;
        }
        .login-box span {
            text-decoration: underline;
        }
        .user-info-column {
            column-count: 2;
            column-gap: 20px;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        .user-info-column p {
            width: 100%;
            margin: 0 0 10px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="user-box">
            <input type="text" name="first_name" required="" placeholder="First Name">
            <label>First Name</label>
        </div>
        <div class="user-box">
            <input type="text" name="last_name" required="" placeholder="Last Name">
            <label>Last Name</label>
        </div>
        <div class="user-box">
            <input type="text" name="number" required="" placeholder="Number">
            <label>Number</label>
        </div>
        <div class="user-box">
            <input type="text" name="birthday" required="" placeholder="Birthday">
            <label>Birthday</label>
        </div>
        <div class="user-box">
            <input type="email" name="email" required="" placeholder="Email">
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required="" placeholder="Password">
            <label>Password</label>
        </div>
        <input type="submit" value="Submit">
    </form>
    <br>
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
            echo "<div class='user-info-column clearfix'>";
            echo "<p><strong>First Name:</strong> <span style='text-decoration: underline;'>" . $_POST['first_name'] . "</span></p>";
            echo "<p><strong>Last Name:</strong> <span style='text-decoration: underline;'>" . $_POST['last_name'] . "</span></p>";
            echo "<p><strong>Number:</strong> <span style='text-decoration: underline;'>" . $_POST['number'] . "</span></p>";
            echo "<p><strong>Birthday:</strong> <span style='text-decoration: underline;'>" . $_POST['birthday'] . "</span></p>";
            echo "<p><strong>Email:</strong> <span style='text-decoration: underline;'>" . $_POST['email'] . "</span></p>";
            echo "<p><strong>Password:</strong> <span style='text-decoration: underline;'>" . $_POST['password'] . "</span></p>";
            echo "</div>";
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
