<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculating the Area of a Rectangle</title>
</head>
<body>

<?php
    $length = $width = $area = "";
    $lengthErr = $widthErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["length"])) {
            $lengthErr = "Length is required";
        } else {
            $length = test_input($_POST["length"]);
            if (!is_numeric($length) || $length <= 0) {
                $lengthErr = "Invalid length format.";
            }
        }

        if (empty($_POST["width"])) {
            $widthErr = "Width is required";
        } else {
            $width = test_input($_POST["width"]);
            if (!is_numeric($width) || $width <= 0) {
                $widthErr = "Invalid width format.";
            }
        }

        if (empty($lengthErr) && empty($widthErr)) {
            $area = calculate_area($length, $width);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function calculate_area($length, $width) {
        return $length * $width;
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
        Enter length: 
        <input id="length" name="length" type="text" size="20" maxlength="20" 
        value="<?php echo $length; ?>">
        <span class="error"><?php echo $lengthErr;?></span>
    </p>
    <p>
        Enter width: 
        <input id="width" name="width" type="text" size="20" maxlength="20" 
        value="<?php echo $width; ?>">
        <span class="error"><?php echo $widthErr;?></span>
    </p>
    <p>
        <input type="submit" value="Calculate Area">
    </p>
</form>

<?php
if (!empty($area)) {
    echo "<p>The area of the rectangle is $area.</p>";
}
?>

</body>
</html>
