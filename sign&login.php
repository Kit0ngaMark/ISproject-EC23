<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be-healthy";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sign Up
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["role"])) {
        $Name = $_POST["name"];
        $Email = $_POST["email"];
        $Password = $_POST["password"]; // Plain text password
        $role = $_POST["role"];

        if ($role == 'user' || $role == 'admin') {
            $table = ($role == 'user') ? 'healthytb' : 'administrators';

            $insertQuery = $conn->prepare("INSERT INTO $table (name, email, password) VALUES (?, ?, ?)");
            $insertQuery->bind_param("sss", $Name, $Email, $Password);

            if ($insertQuery->execute()) {
                echo "$role registered successfully!";
                header("Location: app2.html");
                exit();
            } else {
                echo "Error: " . $insertQuery->error;
            }

            $insertQuery->close();
        } else {
            echo "Invalid role.";
        }
    }

    // Login
    elseif (isset($_POST["email"]) && isset($_POST["password"])) {
        $Email = $_POST["email"];
        $Password = $_POST["password"]; // Plain text password

        $selectQuery = $conn->prepare("SELECT * FROM healthytb WHERE email = ?");
        $selectQuery->bind_param("s", $Email);
        $selectQuery->execute();

        $result = $selectQuery->get_result();
        $user = $result->fetch_assoc();

        if ($user && $password === $user["Password"]) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_role"] = 'user';

            header("Location: profile.php"); // Redirect to a welcome page or dashboard
            exit();
        }

        $selectQuery->close();

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
}

$conn->close();
?>
