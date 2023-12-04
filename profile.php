<?php
// Your database connection code here
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "be-healthy";

$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume a session is started when the user logs in
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: app1.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user information from the database
$stmt = $conn->prepare("SELECT * FROM healthytb WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="good5.css">
</head>
<body>
    <center>
    <h1>Welcome, <?php echo $user['Name']; ?>!</h1>
    
    <!-- Display user information in a table -->
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Hospital</th>
            <th>Illness</th>
            <th>Price</th>
        </tr>
        <tr>
            <td><?php echo $user['Email']; ?></td>
            <td><?php echo $user['Hname']; ?></td>
            <td><?php echo $user['Illness']; ?></td>
            <td><?php echo $user['Price']; ?></td>
        </tr>
    </table>
    
    <a href="edit.php">Edit Profile</a><br><a href="crtdhospital.php">View Hospitals</a>
    </center>
</body>
</html>
