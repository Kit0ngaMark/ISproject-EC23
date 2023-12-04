<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "be-healthy";

$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $InsuranceName = $_POST["Insurancename"];
    $InsuranceType = $_POST["Insurancetype"];
    $Amount = $_POST["amount"];

    // Check if the connection is successful before preparing the statement
    if (!$conn->connect_error) {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO 1nsurance (Insurancename, Insurancetype, amount) VALUES (?, ?, ?)");

        // Check if the statement is prepared successfully
        if ($stmt) {
            $stmt->bind_param("sss", $InsuranceName, $InsuranceType, $Amount);

            if ($stmt->execute()) {
                echo "Insurance created successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Connection error.";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Insurance Page</title>
    <link rel="stylesheet" href="good10.css">
</head>
<body>

    <h1>Hospital Page</h1>

    <!-- Insurance creation form -->
    <h2>Update Hospital</h2>
    <form action="hospital.php" method="post">
        <label for="new_insurance_name"> Name:</label>
        <input type="text" name="Name" required><br>
        <label for="new_insurance_type">Illness Treated:</label>
        <textarea name="Illness" id="Illness" placeholder="Enter Illness" rows="10" required></textarea><br>
        <label for="amount">Coverage Amount:</label>
        <input type="text" name="Price" required><br>
        <button type="submit">Create </button>
    </form>

</body>
</html>
