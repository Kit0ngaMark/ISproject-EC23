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
    header("Location: login.php");
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST["new_name"];
    $newEmail = $_POST["new_email"];

    // Update user information in the database
    $updateStmt = $conn->prepare("UPDATE healthytb SET name = ?, email = ? WHERE id = ?");
    $updateStmt->bind_param("ssi", $newName, $newEmail, $user_id);

    if ($updateStmt->execute()) {
        echo "Profile updated successfully!";
        // Refresh user information after updating
        $user['Name'] = $newName;
        $user['Email'] = $newEmail;
    } else {
        echo "Error updating profile: " . $updateStmt->error;
    }

    $updateStmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en"><center>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="good5.css">
</head>
<body>
    <h1>Edit Profile</h1>

    <form action="edit.php" method="post">
        <div>
            <label for="new_name">New Name:</label>
            <input type="text" id="new_name" name="new_name" value="<?php echo $user['Name']; ?>" required>
        </div>
        <div>
            <label for="new_email">New Email:</label>
            <input type="email" id="new_email" name="new_email" value="<?php echo $user['Email']; ?>" required>
        </div>
        <div>
            <button type="submit">Update Profile</button>
        </div>
    </form>
    <a href="app2.html">Browse</a>
</body></center>
</html>
