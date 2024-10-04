<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Pattern Using "for" Loops</title>
</head>
<body>
    
<?php

    $rows = 8;

    for($i = 1; $i <= $rows; $i++)
    {
        for($j = 1; $j <= $i; $j++)
        {
            echo " * ";
        }

        echo "<br>";
    }

?>

</body>
</html>