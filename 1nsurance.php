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
    $InsuranceName = $_POST["Insurancename"];
    $InsuranceType=$_POST["Insurancetype"];
    $Amount=$_POST["amount"];
    

    $sql = "INSERT INTO 1nsurance ( Insurancename, Insurancetype, amount) VALUES ('$InsuranceName','$InsuranceType','$Amount')";

    if ($conn->query($sql) === true) {
        echo "insuarance updation successful!";
        header("Location: crtdinsurance.php"); // Redirect to admin welcome page or dashboard
         exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

