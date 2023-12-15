<?php
include('connect.php'); // Include your database connection file

// Fetch sneakers data from the database
$retrieve_sneakers = mysqli_query($conn, "SELECT * FROM sneakers");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sneaker Shop - KickStart</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">KickStart Sneakers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Sneakers</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Popular Models</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex" method="GET" action="">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

                <?php

                    // Fetch the count of items from the cart table
                    $count_query = "SELECT COUNT(*) AS total_items FROM cart";
                    $count_result = $conn->query($count_query);
                    $count_data = $count_result->fetch_assoc();
                    $total_items = $count_data['total_items'];
                    ?>
                    
                    <a class="btn btn-outline-dark" href="checkout.php">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $total_items; ?></span>
                    </a>


                    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Step into Style</h1>
                <p class="lead fw-normal text-white-50 mb-0">Explore the latest sneaker trends with KickStart</p>
            </div>
        </div>
    </header>
    <!-- Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
<?php
require_once('connect.php');

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    if (!empty($search)) {
        $query = mysqli_query($conn, "SELECT * FROM sneakers WHERE (sneaker LIKE '%" . $search . "%')");

        if (mysqli_num_rows($query)) {
            ?>
            <div class="row">
                <?php
                while ($sneaker = mysqli_fetch_array($query)) {
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?php echo $sneaker['picture']; ?>" alt="<?php echo $sneaker['sneaker']; ?>" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $sneaker['sneaker']; ?></h5>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="cart.php?sneaker_id=<?php echo $sneaker['id']; ?>">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php
        } else {
            echo '<p>No sneakers found.</p>';
        }

        // Don't display the default content when a search is performed
        exit();
    }
}

// Display default content when search is not used
$retrieve_sneakers = mysqli_query($conn, "SELECT * FROM sneakers");

if (mysqli_num_rows($retrieve_sneakers)) {
    ?>
    <div class="row">
        <?php
        while ($sneaker = mysqli_fetch_array($retrieve_sneakers)) {
        ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="<?php echo $sneaker['picture']; ?>" alt="<?php echo $sneaker['brand']; ?>" />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder"><?php echo $sneaker['sneaker']; ?></h5>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="cart.php?sneaker_id=<?php echo $sneaker['id']; ?>">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
} else {
    echo '<p>No sneakers found.</p>';
}
?>

</div>


        </div>
    </section>

    <!-- Add your footer content here -->

    <!-- Bootstrap JavaScript and other scripts -->
    <!-- Ensure you have included Bootstrap and any other necessary scripts in your HTML -->
</body>

</html>



                <!-- End of dynamically displayed sneakers -->
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; KickStart Sneakers 2023</p></div>
    </footer>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>

</html>
