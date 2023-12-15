<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Payment Form</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <link href="css/styles2.css" rel="stylesheet" />
</head>

<body>
    <style>
        body {
            background-image: url('https://image-cdn.hypb.st/https%3A%2F%2Fhypebeast.com%2Fimage%2F2019%2F05%2Fbespokeind-travis-scott-nike-sb-dunk-air-jordan-1-pack-6.jpg?cbr=1&q=90');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .py-20 {
            padding-top: 20rem;
        }
    </style>

    <?php
    include('connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
        // Check if the form is submitted using POST method and if the place_order parameter is set

        // Perform any necessary form validation here

        // Assuming you have a connection to your database established in your PHP file
        // Modify the following SQL query according to your database schema
        $sqlQuery = "INSERT INTO purchased (sneaker, brand) SELECT sneaker, brand FROM cart";

        // Execute the SQL query
        if ($conn->query($sqlQuery) === TRUE) {
            // Display a success message
            echo '<script>alert("Transaction successful!");</script>';

            // Redirect to index.php
            echo '<script>window.location.href = "receipt.php";</script>';
            echo '<script>window.open("index.php");</script>';
        } else {
            // Display an error message
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }

        // Close the database connection
        $conn->close();

        // Open a new tab for receipt.php
        echo '<script>window.open("receipt.php", "_blank");</script>';
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" target="_blank">
        <div class="py-10 h-screen px-2">
            <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-md">
                <div class="md:flex">
                    <div class="w-full p-3 px-6 py-10">
                        <div class="text-center">
                            <span class="text-xl text-gray-700">Payment Form</span>
                        </div>

                        <!-- Dropdown for Address -->
                        <div class="mt-3 relative">
                            <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Select Address</span>
                            <select class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600">
                                <option value="Manila">Manila</option>
                                <!-- Add more options... -->
                            </select>
                        </div>

                        <!-- Dropdown for Payment Options -->
                        <div class="mt-4 relative">
                            <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Select Payment Option</span>
                            <select class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600">
                                <option value="credit_card">Credit Card</option>
                                <!-- Add more options... -->
                            </select>
                        </div>

                        <!-- Other Fields... -->

                        <div class="mt-4">
                            <button class="h-12 w-full bg-red-600 text-white rounded hover:bg-red-700" type="submit" name="place_order">Place Order <i class="fa fa-long-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
