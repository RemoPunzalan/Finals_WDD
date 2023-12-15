<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login.php
    header("Location: login.php");
    exit();
}

// If the user is logged in, you can include additional logic or just continue with the rest of your script.

// Example: Display the user's name
$userName = $_SESSION['username'];
echo "Welcome, $userName!";

// Your other code goes here

?>
