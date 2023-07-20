
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
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPass"];

        // Create a database connection
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Check the database connection
        if (mysqli_connect_errno()) {
            die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
        }

        // Prepare the query to fetch the user with the given email and password
        $query = "SELECT * FROM tbl_207_users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);

        // Check if the query was successful
        if ($result && mysqli_num_rows($result) > 0) {
            // Redirect the user to "patients.php" page
            $_SESSION['email'] = $row['user_email'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_f_name'] = $row['user_f_name'];
            $_SESSION['img'] = $row['img'];
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
        <form action="login_process.php" method="post" id="frm">
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Log Me In</button>
        </form>
        <div class="error-message"><?php echo $message; ?></div>
    </div>
</body>
</html>

