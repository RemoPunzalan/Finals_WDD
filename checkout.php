<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sneaker Shop</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <style>
        /* Existing styles remain unchanged */

        /* New styles similar to the Sign In page */
        .social-list {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .social-list li {
            font-size: 20px;
            color: #fff;
            background-color: #007bff; /* Bootstrap primary color */
            padding: 10px;
            border-radius: 50%;
        }

        .form-data {
            margin-top: 15px;
        }

        .form-data label {
            font-weight: bold;
            color: #495057; /* Bootstrap secondary color */
        }

        .signin-btn {
            margin-top: 20px;
        }

        .forgot-text {
            color: #007bff; /* Bootstrap primary color */
        }
    </style>
</head>
<body>
    <form action="payment.php" method="post">
        <div class="container">
            <div class="row g-0 mt-5 mb-5 height-100">
                <div class="col-md-6">
                    <div class="bg-dark p-4 h-100 sidebar">
                        <ul class="chart-design">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 h-100">
                        <div class="p-3 d-flex justify-content-center flex-column align-items-center">
                            <span class="main-heading">Checkout</span>

                            <?php
                            include("connect.php"); // Include your database connection file

                            // Fetch items from the cart table
                            $fetch_cart_query = "SELECT * FROM cart";
                            $fetch_cart_result = $conn->query($fetch_cart_query);

                            // Display the items
                            while ($cart_item = mysqli_fetch_array($fetch_cart_result)) {
                            ?>
                                <div style="background-color: #fff; border: 1px solid #000; padding: 10px; margin-bottom: 10px;">
                                    <div>
                                        <strong>Sneaker:</strong> <?php echo $cart_item['sneaker']; ?>
                                    </div>
                                    <!-- Hide the brand information -->
                                    <!-- <div>
                                        <strong>Brand:</strong> <?php echo $cart_item['brand']; ?>
                                    </div> -->
                                </div>
                            <?php
                            }
                            ?>

                            <!-- Checkout button and payment form -->
                            <div style="background-color: #000; color: #fff; padding: 20px; text-align: center;">
                                <!-- Add more elements for payment screens as needed -->
                                <form action="process_payment.php" method="post" style="max-width: 400px; margin: auto;">
                                    <!-- Payment information fields go here -->
                                    <!-- Example: Card number, expiration date, CVV, etc. -->   

                                    <button type="submit" class="btn btn-light">Proceed to Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
