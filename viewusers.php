
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be-healthy";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM healthytb";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head><center>
<body>
    <div class="container">
        <h2 class="text-center">User Details</h2>

        <?php

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>Full Name</th><th>Email</th><th>Hospital</th><th>Illness</th><th>Price</th><th>Actions</th></tr></thead>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['Name']}</td>";
                echo "<td>{$row['Email']}</td>";
                echo "<td>{$row['Hname']}</td>";
                echo "<td>{$row['Illness']}</td>";
                echo "<td>{$row['Price']}</td>";
                
                echo "<td> <a href='Delusers.php?id={$row['Name']}' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No User found.";
        }

        $conn->close();
        ?>
    </div>
</body></center>
</html>
