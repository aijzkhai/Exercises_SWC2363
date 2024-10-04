<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>

<?php
    $num1 = $num2 = $result = "";
    $num1Err = $num2Err = $operationErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["num1"])) {
            $num1Err = "First number is required";
        } else {
            $num1 = test_input($_POST["num1"]);
            if (!is_numeric($num1)) {
                $num1Err = "Invalid number format";
            }
        }

        if (empty($_POST["num2"])) {
            $num2Err = "Second number is required";
        } else {
            $num2 = test_input($_POST["num2"]);
            if (!is_numeric($num2)) {
                $num2Err = "Invalid number format";
            }
        }

        if (empty($num1Err) && empty($num2Err)) {
            if (isset($_POST['operation'])) {
                $operation = $_POST['operation'];
                switch ($operation) {
                    case '+':
                        $result = $num1 + $num2;
                        break;
                    case '-':
                        $result = $num1 - $num2;
                        break;
                    case '*':
                        $result = $num1 * $num2;
                        break;
                    case '/':
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                        } else {
                            $operationErr = "Cannot divide by zero";
                        }
                        break;
                    default:
                        $operationErr = "Invalid operation";
                }
            } else {
                $operationErr = "Operation is required";
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
        Enter first number: 
        <input id="num1" name="num1" type="text" size="30" maxlength="30" 
        value="<?php echo $num1; ?>">
        <span class="error"><?php echo $num1Err;?></span>
    </p>
    <p>
        Enter second number: 
        <input id="num2" name="num2" type="text" size="30" maxlength="30" 
        value="<?php echo $num2; ?>">
        <span class="error"><?php echo $num2Err;?></span>
    </p>
    <p>
        <button type="submit" name="operation" value="+">Add</button>
        <button type="submit" name="operation" value="-">Subtract</button>
        <button type="submit" name="operation" value="*">Multiply</button>
        <button type="submit" name="operation" value="/">Divide</button>
        <span class="error"><?php echo $operationErr;?></span>
    </p>
</form>

<?php
if (!empty($result) || $result === 0) {
    echo "<p>Result: $num1 $operation $num2 = $result</p>";
}
?>

</body>
</html>
