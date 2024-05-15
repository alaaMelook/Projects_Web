<?php
session_start();
include("connection1.php");


?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>review flower</title>

<head>
    <title>review flower</title>
    <link rel="stylesheet" href="car.css">
</head>

<body>
    <div>
    <nav>
        <a href="logout.php">LOGOUT</a>
    </nav><br>
    
    </div>

    <?php

    $query = "SELECT
        
        id,
        model,
        color,
        country,
        city,
        year,
        cost,
        status
        
        
    FROM flower ;";
    $result = mysqli_query($con, $query);

    echo "<table border = '1px'>";

    if ($result->num_rows > 0) {

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Model</th>";
        echo "<th>Color</th>";
        echo "<th>Country</th>";
        echo "<th>City</th>";
        echo "<th>Year</th>";
        echo "<th>Cost</th>";
        echo "<th>Status</th>";
        echo "<th>Edit</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo '<form method = "GET" action = "edit_car_view.php">';
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['model']}</td>";
            echo "<td>{$row['color']}</td>";
            echo "<td>{$row['country']}</td>";
            echo "<td>{$row['city']}</td>";
            echo "<td>{$row['year']}</td>";
            echo "<td>{$row['cost']}</td>";
            echo "<td>{$row['status']}</td>";

            echo '<td><input type = "submit" name = "update"  value = "Update"/></td>';
            echo "</tr>";
            echo '<input type="hidden" name="id" id="id" value="' . $row['id'] . '">';
            echo '</form>';
        }
        echo "</table>";
    } else {
        echo "no search results";
    }
    mysqli_close($con); 
    ?>

</html>