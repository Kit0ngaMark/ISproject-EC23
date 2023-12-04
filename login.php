<?php
// Database connection details
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "be-healthy";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["email"];
    $Password = trim($_POST["password"]);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, name, email, password FROM healthytb WHERE email = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $email, $stored_password);
        $stmt->fetch();

        // Verify the provided password against the stored password in the database
        if ($Password == $stored_password) {
            // Start a session and store user information
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $name;

            // Redirect to the user's profile page
            header("Location: profile.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $stmt->close();
     // Check for administrator login
     $selectQuery = $conn->prepare("SELECT * FROM administrators WHERE email = ?");
     $selectQuery->bind_param("s", $Email);
     $selectQuery->execute();

     $result = $selectQuery->get_result();
     $admin = $result->fetch_assoc();

     if ($admin && $Password === $admin["Password"]) {
         $_SESSION["admin_id"] = $admin["id"];
         $_SESSION["user_role"] = 'admin';

         header("Location: admin1.php"); // Redirect to admin welcome page or dashboard
         exit();
     }

     echo "Invalid email or password.";
     $selectQuery->close();
}

$conn->close();
?>
