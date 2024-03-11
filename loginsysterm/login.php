<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOS"] == "POST"){
  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];



  //$sql = "Select * from users where username='$username' and pasword='$password'":
  $sql = "Select * from users where username='$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysql_num_rows($results);
  if($num == 1){
     while($row=mysqli_fetch_assoc($result)){
         if(password_verify($password, $row['password'])){
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header("location: welcome.php");
     }
     else{
          $showError = "Invalid Credentials";
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

    <title>login.php!</title>
  </head>
  <body>
    <!--  -->
    <?php require 'partials/_nav.php'  ?>
    <?php
    if($login){
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> you are logged in.
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> ';
    }
    if($showError){
      echo ' <div class='alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Error </strong> '.$showErrr.'
           <button type="button" class="close" data=dissmiss-"alert" aria-label="close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div> ';
          }

          ?>

          <div class="container my-5">
          <h1 class="text-centre">Login to our websitte </h1>
          <form action="/loginsysterm/login.php" method="post">
           <div class="form-group">
             <label for='username'>username</label>
             <input type="text" class="form-control" id="username" name="username" aria-describedby="emailhelp">

             </div>
             <div class="form-group">
             <label for='password'>password</label>
             <input type="text"> class="form-control" id="password" name="password">
             </div>


             <button type="submit" class="btn btn-primary">Login</button>
             </form>
             </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <h1>Hello, world!</h1>
  </body>
</html>