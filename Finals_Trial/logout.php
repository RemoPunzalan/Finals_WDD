<?php
// Start the session
session_start();

// Unset or destroy the session variable that indicates the user is logged in
if (isset($_SESSION['loggedin'])) {
    unset($_SESSION['loggedin']); // Unset the specific variable
    // OR
    // session_destroy(); // Destroy the entire session (you can choose either)
}

// Redirect the user to the login page (login.html)
header("Location: login.html");
exit();
?>
