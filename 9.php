<?php
session_start();

$valid_username = "admin";
$valid_password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if ($username === $valid_username && $password === $valid_password) {
            $_SESSION["loggedin"] = true;
            $message = "Login successful. Welcome, $username!";
        } else {
            $message = "Invalid username or password.";
        }
    } else {
        $message = "Please provide both username and password.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<?php if(isset($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

</body>
</html>
