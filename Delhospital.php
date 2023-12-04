<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be-healthy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $Name = $_GET["id"];

    // Validate and sanitize input to prevent SQL injection
    $Name = mysqli_real_escape_string($conn, $Name);

    // Check if the insurance with the given Name exists before attempting to delete
    $checkIfExists = "SELECT * FROM `hospital` WHERE `Name` = '$Name'";
    $result = $conn->query($checkIfExists);

    if ($result === false) {
        // Handle the query execution error
        echo "Error executing query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Insurance exists, proceed with deletion
        $deleteSql = "DELETE FROM `hospital` WHERE `name` = '$Name'";

        if ($conn->query($deleteSql) === true) {
            // Redirect to crtdinsurance.php after successful deletion
            header("Location: viewhospital.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Hospital with Name '$Name' not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
