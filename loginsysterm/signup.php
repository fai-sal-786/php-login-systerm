<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){    
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;

    // Check whether this username exists
    $exitsSql = "SELECT * FROM `users` WHERE  username = '$username'";
    $result = mysqli_query($conn, $exitsSql);
    $numExitRows = mysqli_num_rows($results);
    if($numExitsRows > 0){
      // $exits = true;
      $showError = "Username Already Exists";
    }
    else{
          //  exists = false;    
 if(($password == $cpassword) && $exists==false){
     $sql = "INSERT INTO `user123` ( `username`, `password`, `date`) VALUES ( '$username', '$password', current_timestamp())";
     $result = mysqli_query($conn, $sql);
     if ($result){
     $showAlert = true;

     }
  }
  else{
      $showError = "Passwords do not match";
  }
 }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <title>signup.php!</title>
  </head>
  <body>
   
    <?php require 'partials/_nav.php'  ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You account is now created and you can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';    
    }
    if($showError){
      echo '<div class="alert alert-danger alert-dismissiable fade show" role="alert">
      <strong>Error</strong> '.$showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div> ';
    }
    ?>

    <div class="container my-5">
        <h1 class="text-centre">Signup To Our Website</h1>    
    <form action="/loginsysterm/signup.php" method="post">
       <div class="form-group ">
         <label for="Username">Username</label>
         <input type="text" max-length="11" class="form-control" id="Username" name="Username"aria-describedby="emailHelp">
   
  </div>
  <div class="form-group ">
    <label for="Password">Password</label>
    <input type="password" maxlength="23" class="form-control" id="Password" name="Password">
  </div>  
  <div class="form-group ">
    <label for="CPassword">CPassword</label>
    <input type="password" class="form-control" id="CPassword" name="CPassword">
    <small id="emailHelp" class="form-text">Make sure the same password.</small>
  </div>
  
  <button type="submit" class="btn btn-primary">Sign up</button>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <!-- <h1>Hello, world!</h1> -->
  </body>
</html>