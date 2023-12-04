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
    $username = $_GET["id"];

    // Validate and sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    // Check if the author with the given ID exists before attempting to delete
    $checkIfExists = "SELECT * FROM healthytb WHERE  Name = '$username'";
    $result = $conn->query($checkIfExists);

    if ($result->num_rows > 0) {
        // Author exists, proceed with deletion
        $deleteSql = "DELETE FROM healthytb WHERE name = '$username'";

        if ($conn->query($deleteSql) === true) {
            // Redirect to viewauthors.php after successful deletion
            header("Location: viewusers.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Author with ID $AuthorID not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
