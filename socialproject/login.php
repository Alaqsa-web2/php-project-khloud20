<!-- 
// session_start();
// require'database.php' ;
// $path=getcwd().'\\imgs\\'.$_FILES['image']['name'];
// echo $path;
// $pic = move_uploaded_file($_FILES['image']['tmp_name'],$path);
// $_SESSION["picture"] = $_FILES['image']['name'];
// $username=$_POST['name'];
// $password = $_POST['password'];
// $email = $_POST['email'];
  // $sql ='insert into Users (user_name,email,password,picture) values("'.$_SESSION['name'].'","'.$_SESSION["email"].'","'.$_SESSION["password"].'");';
  //   if($con->query($sql)){          
  //      echo 'row inserted';
  //   }else{
  //     echo 'faild to insert';
  //   }
      // header('location:select.php'); -->


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
    <title>login</title>
</head>
<body>
    <main class="form-signin">
        <form method = "post" action ="home.php">
        <a href="home.php">
            <h1 class="brand">Social Media</h1>
        </a>
          <h1 class="h3 mb-3 fw-normal">Please Login</h1>
      
          <div class="form-floating">
            <input type="email" name = "email" class="form-control" id="floatingInput" required placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" name = "password" class="form-control" id="floatingPassword" required placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
      
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btnLogin" name = "login" type="submit">Login</button>
        </form>
    </main>

    <!--Bootstrap 5 js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
