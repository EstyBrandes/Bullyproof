
<?php
    // Include database and configuration files

    include 'config.php';

    // Initialize the variables
    $email = "";
    $password = "";
    $message = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the email and password from the form
        $email = $_POST["loginMail"];
        $password = $_POST["loginPass"];

        // Create a database connection
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Check the database connection
        if (mysqli_connect_errno()) {
            die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
        }

        // Prepare the query to fetch the user with the given email and password
        $query = "SELECT * FROM tbl_207_users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connection, $query);

        // Check if the query was successful
        if ($result && mysqli_num_rows($result) > 0) {
            // Redirect the user to "patients.php" page
            header("Location: patients.php");
            exit;
        } else {
            // Invalid credentials, display an error message
            $message = "Invalid email or password";
        }

        // Close the database connection
        mysqli_close($connection);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <title>Login</title>
</head>
<body>
    <div class="container"  class="form-group">
        <h1>Login</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="frm">
            <div class="form-group">
                <label for="loginMail">Email: </label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="loginMail" id="loginMail" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="loginPass" for="exampleInputPassword1">Password: </label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="loginPass" id="loginPass" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Log Me In</button>
        </form>
        <div class="error-message"><?php echo $message; ?></div>
    </div>
</body>
</html>

