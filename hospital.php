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
    $Name = $_POST["Name"];
    $Illness=$_POST["Illness"];
    $Price=$_POST["Price"];
    

    $sql = "INSERT INTO hospital ( Name, Illness, Price) VALUES ('$Name','$Illness','$Price')";

    if ($conn->query($sql) === true) {
        echo "insuarance updation successful!";
        header("Location: viewhospital.php"); // Redirect to admin welcome page or dashboard
         exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

