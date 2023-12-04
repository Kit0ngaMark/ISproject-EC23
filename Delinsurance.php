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
    $InsuranceName = $_GET["id"];

    // Validate and sanitize input to prevent SQL injection
    $InsuranceName = mysqli_real_escape_string($conn, $InsuranceName);

    // Check if the insurance with the given Name exists before attempting to delete
    $checkIfExists = "SELECT * FROM `1nsurance` WHERE `Insurancename` = '$InsuranceName'";
    $result = $conn->query($checkIfExists);

    if ($result === false) {
        // Handle the query execution error
        echo "Error executing query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        // Insurance exists, proceed with deletion
        $deleteSql = "DELETE FROM `1nsurance` WHERE `Insurancename` = '$InsuranceName'";

        if ($conn->query($deleteSql) === true) {
            // Redirect to crtdinsurance.php after successful deletion
            header("Location: crtdinsurance.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Insurance with Name '$InsuranceName' not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
