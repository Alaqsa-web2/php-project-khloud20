<?php
session_start();
require'database.php' ;
$user_name = $_SESSION['name'];
$email = $_SESSION['email'];
// $picture = $_SESSION['picture'];
$password = $_SESSION['password'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- <li class = "nav-item">
                <a href="home.php" class= "nav-link">HOME</a>
            </li>
           -->
        </ul>
       <h1 ><a class="navbar-brand brand" href="home.php">Social Media</a> </h1>
      </div>
    </nav>
<!--     
    <img src="imgs/<?php 
     $sql ='select picture from Users where password = "'.$password.'" and email = "'.$email.'";';
     $result=$con->query($sql);
     if($result->num_rows > 0){
         echo '<img src="$picture" alt="">';
     }
    ?> -->
    
    <table>
    <tr style="color: green ">
      
          <td><?php
             $sql = 'select user_name from Users where email = "'.$email.'" and password = "'.$password.'";';
             $result=$con->query($sql);
             if($result->num_rows > 0){
                 echo"hello I'm :";
             echo $result->fetch_assoc()['user_name'];
             }
            ?></td>
        </tr>
        <tr>
          <!-- <td> Email </td> -->
            <td><?php
            //  require'database' ;
             $sql = 'select email from Users where user_name = "'.$user_name.'" and password = "'.$password.'" ;';
             $result=$con->query($sql);
             if($result->num_rows > 0){
                 echo "This is my email : ".
              $result->fetch_assoc()['email'];
             }
            ?></td> 
        </tr>
       
    </table>
    
        <?php
        $sql3 = 'select * from Users, Posts where Users.id = "'.$_SESSION['user_id'].'"and Posts.User_id = "'.$_SESSION['user_post_id'].'" ;';
        $resll = mysqli_query($con,$sql3);
        if($resll->num_rows > 0 ){
            while($row = $resll->fetch_assoc()){
                 $textsp = $row['text'];
                $createdp = $row['created_at'];
                $namesp = $row['user_name'];

                echo '  <table class="table" >
                <tr>
                    <td> '.$namesp.'</td>
                </tr>
                <tr>
                    <td> '.$createdp.'</td>
                </tr>
                <tr>
                    <td> '.$textsp.'</td>
                </tr>
            </.table><br>
           ';
            
            }
        }
           
        ?>
</body>
</html>