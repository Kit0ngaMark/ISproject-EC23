<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["book_doctor"])) {
    // Assuming you have a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "be-healthy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the selected doctor's information
    $doctor_id = $_POST["doctor_id"];
    $sql = "SELECT * FROM doctors WHERE id = $doctor_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $doctor = $result->fetch_assoc();

        // Insert booking information into the database (you need to create a bookings table)
        $user_id = $_SESSION["user_id"]; // Assuming you have user authentication and user ID stored in the session
        $booking_date = date("Y-m-d"); // Change this to the selected booking date

        $insert_booking_sql = "INSERT INTO bookings (user_id, doctor_id, booking_date) VALUES ($user_id, $doctor_id, '$booking_date')";
        $conn->query($insert_booking_sql);

        // Redirect to the user's profile page
        header("Location: profile.php");
        exit();
    } else {
        echo "Doctor not found.";
    }

    $conn->close();
}

// Display the doctors
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be-healthy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary head content -->
</head>
<body>
    <!-- Display doctor cards -->
    <div id="cards">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row['doctor_name']}</h5>
                                    <p class='card-text'>{$row['specialization']}</p>
                                    <form method='post'>
                                        <input type='hidden' name='doctor_id' value='{$row['id']}'>
                                        <button type='submit' name='book_doctor' class='btn btn-primary'>Book</button>
                                    </form>
                                </div>
                            </div>
                        </div>";
                }
            } else {
                echo "No doctors found.";
            }
            ?>
        </div>
    </div>
</body>
</html>
