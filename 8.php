<!DOCTYPE html>
<html>
<head>
    <title>Reverse String</title>
</head>
<body>
    <h1>PHP Reverse String Function</h1>
    <form method="post" action="">
        <label for="input">Enter a string:</label>
        <input type="text" name="input" id="input" required>
        <button type="submit" name="reverse">Reverse</button>
    </form>

    <?php
    
    if (isset($_POST['reverse'])) {
 
        function reverseString($str) {
            return strrev($str);
        }

        $input = $_POST['input'];

        $reversed = reverseString($input);

        echo "<p>Reversed string: $reversed</p>";
    }
    ?>
</body>
</html>
