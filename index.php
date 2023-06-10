
<?php
    include 'db.php';
    include "config.php";

    if(!empty($_POST["loginMail"])){
        echo 'FROM SENT';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <title>Login</title>
<body>
<div class="container">
           <h1>Login</h1>
           <form action="#" method="post" id="frm">
               <div class="form-group">
                   <label for="loginMail">Email: </label>
                   <input type="email" class="form-control" name="loginMail" id="loginMail" aria-describedby="emailHelp" placeholder="Enter email">
               </div>
               <div class="form-group">
                   <label for="loginPass">Password: </label>
                   <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Enter Password">
               </div>
               <button type="submit" class="btn btn-primary">Log Me In</button>
               <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>   
          </form>
 	   </div>

</body>
</html>
