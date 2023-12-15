<?php
include("connect.php"); // Include your database connection file

if (isset($_GET['sneaker_id'])) {
    $sneaker_id = $_GET['sneaker_id'];

    // Fetch the sneaker and brand values from the original table
    $fetch_query = "SELECT sneaker, brand FROM sneakers WHERE id = '$sneaker_id'";
    $fetch_result = $conn->query($fetch_query);

    if ($fetch_result->num_rows > 0) {
        $sneaker_data = $fetch_result->fetch_assoc();
        $sneaker_name = $sneaker_data['sneaker'];
        $brand_name = $sneaker_data['brand'];

        // Insert the sneaker and brand values into the cart table
        $insert_query = "INSERT INTO cart (sneaker, brand) VALUES ('$sneaker_name', '$brand_name')";
        $insert_result = $conn->query($insert_query);

        if ($insert_result === TRUE) {
            // Delete the sneaker from the original table
            $delete_query = "DELETE FROM sneakers WHERE id = '$sneaker_id'";
            $delete_result = $conn->query($delete_query);

            if ($delete_result === TRUE) {
                echo '<script>alert("Sneaker added to cart and removed from the sneakers table successfully.");</script>';
                echo '<script>window.location.href = "cart.php";</script>';
            } else {
                echo '<script>alert("Error removing sneaker from the sneakers table.");</script>';
                echo '<script>window.location.href = "cart.php";</script>';
            }
        } else {
            echo '<script>alert("Error adding sneaker to cart.");</script>';
            echo '<script>window.location.href = "cart.php";</script>';
        }
    } else {
        echo '<script>alert("Sneaker not found.");</script>';
        echo '<script>window.location.href = "index.php";</script>';
    }
} else {
    echo '<script>alert("Invalid request.");</script>';
    echo '<script>window.location.href = "index.php";</script>'; // Redirect back to index.php for an invalid request
}
?>
