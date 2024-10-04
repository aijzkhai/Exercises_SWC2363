<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Type Check</title>
</head>
<body>

<?php
    $number = $message = "";
    $numberErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["number"])) {
            $numberErr = "Number is required";
        } else {
            $number = test_input($_POST["number"]);
            if (!is_numeric($number)) {
                $numberErr = "Invalid number format.";
            } else {
                if ($number > 0) {
                    $message = "$number is a positive number.";
                } else if ($number < 0) {
                    $message = "$number is a negative number.";
                } else {
                    $message = "This number equals to zero.";
                }
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
        Enter your number: 
        <input id="number" name="number" type="text" size="20" maxlength="20" 
        value="<?php echo $number; ?>">
        <span class="error"><?php echo $numberErr;?></span>
    </p>
    <p>
        <input type="submit" value="Submit">
    </p>
</form>

<p><?php echo $message; ?></p>

</body>
</html>