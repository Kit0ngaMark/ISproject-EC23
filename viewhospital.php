<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be-healthy";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM hospital";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance</title>
    <script src="https://kit.fontawesome.com/333c1941e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="good11.css">
</head>

<body>
    <header>
        <div id="menubar" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>Health</span>Service Info</a>
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="treatments.php">Treatments</a>
            <a href="updateprofile.php">View Profile</a>
        </nav>
    </header>
    <div class="container">
        <h2 class="text-center">Hospital Details</h2>

        <?php

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>Hospital Name</th><th>Illness</th><th>Price</th><th>Actions</th></tr></thead>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['Name']}</td>";
                echo "<td>{$row['Illness']}</td>";
                echo "<td>{$row['Price']}</td>";
                
                echo "<td> <a href='Delhospital.php?id={$row['Name']}' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No Hospital found.";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>