<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Administrator Home Page</title>
    <link rel="stylesheet" href="good9.css">
</head>
<body>
    <div class="container">

    <h1>System Admin Page</h1>

    <?php
    // Replace these values with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "be-healthy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user is authenticated (you should implement proper authentication logic)
    $isAdmin = true; // For demonstration purposes; replace with actual authentication logic

    if ($isAdmin) {
        // Sample administrator information query (replace with actual query)
        $adminQuery = $conn->query("SELECT Name, Email FROM administrators WHERE id = 1");

        // Check for errors
        if (!$adminQuery) {
            die("Error: " . $conn->error);
        }

        // Fetch administrator information
        $adminInfo = $adminQuery->fetch_assoc();

        if ($adminInfo) {
            ?>

            <h2>Welcome, <?php echo $adminInfo['Name']; ?>!</h2>
            <p>Email: <?php echo $adminInfo['Email']; ?></p>

            <h2>Navigation</h2>
            <ul>
                <li><a href="viewusers.php">View Users</a></li>
                <li><a href="viewhospital.php">View Hospitals</a></li>
                <li><a href="createinsurance.php">update Insurance</a></li>
                <li><a href="createhospital.php">update Hospital</a></li>
            </ul>

            <?php
        } else {
            echo "<p>Administrator not found.</p>";
        }
    } else {
        echo "<p>Unauthorized access. Please log in as a system administrator.</p>";
    }

    // Close the MySQLi connection
    $conn->close();
    ?>
    </div>
</body>
</html>
