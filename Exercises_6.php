<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of Integers from 0 to 30</title>
</head>
<body>

<?php
    $sum = 0; // Initialize sum variable

    // Loop through numbers from 0 to 30
    for ($i = 0; $i <= 30; $i++) {
        $sum += $i; // Add current number to the sum
    }

    // Display the total sum
    echo "The sum of the integers from 0 to 30 is $sum.";
?>

</body>
</html>
