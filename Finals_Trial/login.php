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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles1.css" rel="stylesheet" />
</head>
<body>
    <form action="login.php" method="post">
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
                    <div class="p-3 d-flex justify-content-center flex-column align-items-center"> <span class="main-heading">Sign In</span>
                        <ul class="social-list mt-3">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-google"></i></li>
                            <li><i class="fa fa-linkedin"></i></li>
                        </ul>
                        <?php
                                        session_start();
                                        require_once('connect.php');

                                        // Check if the form is submitted
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // Retrieve username and password from the form
                                            $username = $_POST['username'];
                                            $password = $_POST['password'];

                                            // Create a SQL query to check the user's credentials
                                            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows == 1) {
                                                // User found, credentials are correct
                                                $row = $result->fetch_assoc(); // Fetch user data from the database
                                                $firstname = $row['firstname']; // Get user's first name
                                                $lastname = $row['lastname'];   // Get user's last name

                                                session_start();
                                                $_SESSION['loggedin'] = true;
                                                $_SESSION['firstname'] = $firstname; // Set the user's first name
                                                $_SESSION['lastname'] = $lastname;   // Set the user's last name
                                                $_SESSION['id'] = $row['id'];       // Set the user's unique ID

                                                header("Location: index.html");
                                                exit();
                                            } else {
                                                $sqlUsernameCheck = "SELECT * FROM users WHERE username = '$username'";
                                                $resultUsernameCheck = $conn->query($sqlUsernameCheck);

                                                if ($resultUsernameCheck->num_rows != 1) {
                                                    // Incorrect username
                                                    echo "Incorrect username";
                                                } else {
                                                    // Incorrect password
                                                    echo "Incorrect password";
                                                }
                                            }

                                            $conn->close();
                                        }
                                        ?>
                                        
                            <div class="form-data"> <label>Email</label> 
                                <input type="text" id="username" name="username" class="form-control w-100" required> 
                            </div>

                            <div class="form-data"> <label>Password</label> 
                                <input type="password" id="password" name="password" class="form-control w-100" required> 
                            </div>

                            <div class="form-data" style="color:red;"> <label>Wrong Username or Password</label> </div>
                            
                            <div class="d-flex justify-content-between w-100 align-items-center">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Remember me </label> </div> <a class="text-decoration-none forgot-text" href="register.html">Create an Account</a>
                            </div>
                            
                            <div class="signin-btn w-100 mt-2"> 
                                <button class="btn btn-danger btn-block" input type="submit" value="Login" >Login</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>