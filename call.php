<?php
$servername = "localhost";
$db_username = "root"; 
$db_password = ""; 
$database = "be-healthy";

$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Firstname = $_POST["fname"];
    $Lastname = $_POST["lname"];
    $Email=$_POST["email"];
    $Phonenumber = $_POST["mob"];
    $Suggestions = $_POST["ans"];

    $sql = "INSERT INTO calltb ( fname, lname, email, mob, ans) VALUES ('$Firstname', '$Lastname', '$Email', '$Phonenumber','$Suggestions')";

    if ($conn->query($sql) === true) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

