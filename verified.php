<?php
// Start a session to access session variables
session_start();
include('connection.php');
// Check if the user is logged in (You should have a login mechanism in place)
if (!isset($_SESSION['user_id'])) {
    // Redirect to a login page or display an error message
    echo "You are not logged in. Please log in to continue.";
    exit;
}

// Include the database connection file


// Get data from the POST request
$license_number = $_POST['license_number'];
$car_number = $_POST['car_number'];
$car_model = $_POST['car_model'];
$user_id = $_SESSION['user_id']; // Get the user_id from the current session
if (empty($license_number)) {
    echo "License Number is required.";
    exit;
}

if (empty($car_number)) {
    echo "Car Number is required.";
    exit;
}

if (empty($car_model)) {
    echo "Car Model is required.";
    exit;
}
$rating=3;
// Insert data into the "driver" table
$sql = "INSERT INTO driver (`driver_id`, `license_no`,`rating`, `verified`) VALUES ('$user_id', '$license_number', 0, 'not verified')";
$result=mysqli_query($link,$sql);
if (!$result) {
    echo '<div class="alert alert-danger">Error: ' . mysqli_error($link) . '</div>';
} else {
    echo "Success";
}
?>
