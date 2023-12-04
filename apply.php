<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "be-healthy";

$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume you have retrieved these values from the logged-in user's session
session_start();
if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];

    // Transfer details from hospital to healthytb
    $sqlTransferDetails = "
        INSERT INTO healthytb (id, Hname, Illness, Price)
        SELECT '$userId', ho.Name, ho.Illness, ho.Price
        FROM hospital ho
        WHERE ho.id = '$userId'
    ";

    if ($conn->query($sqlTransferDetails) === true) {
        echo "User details transferred successfully!";
    } else {
        echo "Error transferring user details: " . $conn->error;
    }
} else {
    echo "User not logged in.";
}

$conn->close();
?>
