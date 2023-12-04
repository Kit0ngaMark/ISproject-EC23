<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Administrator Page</title>
    <link rel="stylesheet" href="good8.css">
</head>
<body>

    <h1>System Administrator Page</h1>

    <?php
    // Check if the user is authenticated (you should implement proper authentication logic)
    $isAdmin = true; // For demonstration purposes; replace with actual authentication logic

    if ($isAdmin) {
        // Display insurance details update and create forms for the administrator
        ?>

        <h2>Update Insurance Details</h2>
        <form action="admin.php" method="post">
            <!-- Input fields for updating insurance details -->
            <label for="insurance_index">Select Insurance:</label>
            <select name="insurance_index" required>
                <?php
                foreach ($insuranceDatabase as $index => $insurance) {
                    echo "<option value=\"$index\">{$insurance['name']}</option>";
                }
                ?>
            </select>
            <button type="submit" name="action" value="update">Update Insurance</button>
        </form>

        <h2>Create New Insurance</h2>
        <form action="admin.php" method="post">
            <!-- Input fields for creating a new insurance -->
            <label for="new_insurance_name">Insurance Name:</label>
            <input type="text" name="new_insurance_name" required><br>
            <label for="insuranceType">Insurance Type:</label>
        <input type="text" name="insuranceType" required><br>

        <label for="coverageAmount">Coverage Amount:</label>
        <input type="text" name="coverageAmount" required><br>

        <label for="premiumAmount">Premium Amount:</label>
        <input type="text" name="premiumAmount" required><br>
            <!-- Add other input fields as needed -->
            <button type="submit" name="action" value="create">Create Insurance</button><br>
            <a href="viewusers.php" >view users</a>

        </form>

        <?php
        // Handle the form submissions
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['action'] === 'update') {
                // Handle the update logic here
                $indexToUpdate = $_POST['insurance_index'];
                // Implement the logic to update the selected insurance
            } elseif ($_POST['action'] === 'create') {
                // Handle the create logic here
                $newInsuranceName = $_POST['new_insurance_name'];
                // Implement the logic to create a new insurance entry
            }
        }
    } else {
        echo "<p>Unauthorized access. Please log in as a system administrator.</p>";
    }
    ?>

</body>
</html>
