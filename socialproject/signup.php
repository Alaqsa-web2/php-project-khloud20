
<?php 
session_start();
require'database.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5 css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style-->
    <link rel="stylesheet" href="css/style.css">
    <title>Sign up</title>
</head>
<body>
<main class="form-signin">
        <form  enctype="multipart/form-data" method="post" >
            <a href="home.php">
              <h1 class="brand">Social Media</h1>
            </a>
          <h1 class="h3 mb-3 fw-normal">Register Now</h1>
      
          <div class="form-floating">
            <input type="text" name = "name" class="form-control" id="floatingInputN" required placeholder="name">
            <label for="floatingInputN">Name</label>
          </div>
          <div class="form-floating">
            <input type="email" name = "email" class="form-control" id="floatingInput" required  placeholder="name@example.com">
            <label for="floatingInput">Email Adress</label>
          </div>
          <div class="form-floating">
            <input type="password" name = "password" class="form-control" id="floatingPassword" required placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
            <input type="file" name = "image" class="form-control" id="floatingPassword"  placeholder="choose a picture ">
            <label for="floatingPassword">Picture</label>
          </div>
      
          <div class="checkbox mb-3">
            <a class="linksignup" href="login.php">I Have Account Go to Login</a>
          </div>
          <button class="w-100 btn btn-lg btnLogin" name = "submit" type="submit">Sign up</button>
        </form>
    </main>

    <!--Bootstrap 5 js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>
<?php
if(isset($_POST['submit'])){
$username = $_POST['name'];
$email = $_POST['email'];  
$password = $_POST['password'];  

$sql = 'insert into Users (user_name,password,email) values ("'.$username.'","'.$password.'","'.$email.'");';
$result = mysqli_query($con,$sql);
if($result){
  header('location:login.php');
}
}
?>












