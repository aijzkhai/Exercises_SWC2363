<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Eligibility Check</title>
</head>
<body>

<?php
    $name = $age = "";
    $nameErr = $ageErr = $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
        } else {
            $age = test_input($_POST["age"]);
            if (!is_numeric($age) || $age < 0) {
                $ageErr = "Invalid age format";
            } else {
                if ($age >= 18) {
                    $message = "Hello $name, you are eligible to vote.";
                } else {
                    $message = "Hello $name, you are not eligible to vote.";
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
        Enter your name: 
        <input id="name" name="name" type="text" size="30" maxlength="30" 
        value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr;?></span>
    </p>
    <p>
        Enter your age: 
        <input id="age" name="age" type="text" size="30" maxlength="30" 
        value="<?php echo $age; ?>">
        <span class="error"><?php echo $ageErr;?></span>
    </p>
    <p>
        <input type="submit" value="Submit">
    </p>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
