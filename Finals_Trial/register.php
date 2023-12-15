<?php
require_once('connect.php');

if (isset($_POST['submit'])) {
    if ($conn) {
        $username = $_POST['username'];
        $picture = $_POST['picture'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password']; // Updated field name for confirm password

        // You may want to add validation and error handling for the password confirmation

        // Check if passwords match
        if ($password !== $c_password) {
            $err[] = 'Passwords do not match.';
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, picture, password)
            VALUES ('$username', '$picture', '$hashed_password')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                header("Location: login.php");
                exit();
            } else {
                $err[] = 'Registration Failed...' . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    } else {
        die('Connection Failed: ' . mysqli_connect_error());
    }
}
?>
