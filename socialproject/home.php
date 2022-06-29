<?php
session_start();
require 'database.php';

if(isset($_POST['login'])){
$email = $_POST['email'];  
$password = $_POST['password'];

$sql = 'select * from Users where email = "'.$email.'" and password = "'.$password.'";';
$result = mysqli_query($con,$sql);
if ($result->num_rows >0){
  while($row = $result->fetch_assoc()){
    $_SESSION['user_id']= $row['id'];
    $_SESSION['name']= $row['user_name'];
    $_SESSION['password']= $row['password'];
    $_SESSION['email']= $row['email'];
  }

}}
echo $_SESSION['name'];

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
    <title>Social Media</title>
</head>
<body>

<!--start nav bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand brand">Social Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText" style="flex-grow: 0;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class = "nav-item">
                <a href="profile.php" class= "nav-link">PROFILE</a>
            </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="login.php">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link asignUp" href="signup.php">SIGNUP</a>
          </li>
        </ul>
      <!--if login-->
        <!-- <div class="flexPostForm">
            <div class="imgPostForm imgHead" >
                <img src="img/man.jpg" alt="">
            </div>
            <div class="namePostCard">
                <p class="name">Omar Khaled</p>
            </div>   
        </div>  -->
    </div>
    </div>
</nav>
<!--end nav bar-->

<!--start content-->
<div class="container">
    <div class="postForm">
       <div class="flexPostForm">
        <div class="imgPostForm">
            <img src="img/man.jpg" alt="">
        </div>
        <div class="navbar-toggler" >
            <table>
        <form action="home.php" method = "post">
            <tr>
        <td rowspan ="3" colspan ="4"><input  class="form-control" name = "text" type="textarea" placeholder="Type Your Post Here" rows = "3" cloumns = "4" aria-label=".form-control-lg example"></td>
        <td><button class="w-100 btn btn-lg btnLogin" name = "post" type="submit">post</button></td>
        </tr>    
    </form>
        </table>
        </div>
        <?php
        if(isset($_POST['post'])){
        $text = $_POST['text'];  
        if($text != null){
        date_default_timezone_set("Asia/Gaza");
        $createdPost = date("y:m:d H:i:sa");
    
        $sql = 'insert into Posts (text,created_at,user_id) values ("'.$text.'","'.$createdPost.'", "'.$_SESSION['user_id'].'") ;';
        $result = mysqli_query($con,$sql);
        
        $sql2 = 'select * from Posts where user_id = "'.$_SESSION['user_id'].'";';
        $res = mysqli_query($con,$sql2);
        if ($res->num_rows >0){
        while($row = $res->fetch_assoc()){
        $_SESSION['user_post_id']= $row['User_id'];
        $_SESSION['textpost']= $row['text'];
        $_SESSION['post_id']= $row['post_id'];
        $_SESSION['createdPost'] = $row['created_at'];
          }  }
        }
        }
        ?>
       
      
        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control txtPostModal" id="exampleFormControlTextarea1" rows="3">
                        Type your post here...
                    </textarea>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Post</button>
                </div>
            </div> -->
            <!-- </div> -->
        </div>
       </div>     
    </div>
    <?php
    $sql3 = 'select * from Users , Posts
    where Users.id = Posts.User_id;';
      
        $resl = mysqli_query($con,$sql3);
        if($resl->num_rows > 0 ){
            while($row = $resl->fetch_assoc()){
                $texts = $row['text'];
                $created = $row['created_at'];
                $names = $row['user_name'];

                echo '  <table class="table" >
                <tr>
                    <td> '.$names.'</td>
                </tr>
                <tr>
                    <td> '.$created.'</td>
                </tr>
                <tr>
                    <td> '.$texts.'</td>
                </tr>
            </.table><br>
            <table class="table">
            <tr>
            <form action="home.php" method = "post">
            <td rowspan ="3" colspan ="4"><input  class="form-control" name = "commenttext" type="textarea" placeholder="Type Your Comment Here" rows = "3" cloumns = "4" aria-label=".form-control-lg example"></td>
            <td><button class="w-100 btn btn-lg btnLogin " name = "postcom" type="submit"> post comment </button></td>     
            </form></tr></table>
            ';}
            if(isset($_POST['postcom'])){
                $textcom = $_POST['commenttext'];
            if($textcom != null){
    
                date_default_timezone_set("Asia/Gaza");
                $createdcomment = date("y:m:d H:i:sa");
            
                $sql = 'insert into Comments (textCom,created_at_com,post_comment_id,user_comment_id) values ("'.$textcom.'","'.$createdcomment.'","'.$_SESSION['post_id'].'","'.$_SESSION['user_post_id'].'");';
                $result = mysqli_query($con,$sql);}

              $sql5 = 'select post_id from Posts where post_id = "'.$_SESSION['user_post_id'].'";';
              $ress = mysqli_query($con,$sql5);
              if($ress->num_rows > 0){
                $sql4 = 'select * from  Posts , Comments ,Users
                where Posts.post_id = Comments.post_comment_id;';      
                  $resluts = mysqli_query($con,$sql4);
               if($resluts->num_rows > 0 ){
               while($row = $resluts->fetch_assoc()){
                  $textscom = $row['textCom'];
                  $createdcom = $row['created_at_com'];
                  $namescom = $row['user_name'];
                  echo '  <table class="table" >
                  <tr>
                      <td> '.$namescom.'</td>
                  </tr>
                  <tr>
                      <td> '.$createdcom.'</td>
                  </tr>
                  <tr>
                      <td> '.$textscom.'</td>
                  </tr>
              </.table><br>';
              }}
              }
                }}
        ?>
        <?php
        

            // $sql2 = 'select * from Comments where user_id = "'.$_SESSION['user_id'].'";';
            // $res = mysqli_query($con,$sql2);
            // if ($res->num_rows >0){
            // while($row = $res->fetch_assoc()){
            // $_SESSION['user_post_id']= $row['User_id'];
            // $_SESSION['textpost']= $row['text'];
            // $_SESSION['post_id']= $row['post_id'];
            // $_SESSION['createdPost'] = $row['created_at'];
            //   }  }
          
    
    // $sql = 'insert into Comments (textCom,created_at_com,post_comment_id,user_post_id) values ("'.$textcom.'","'..")';
   
        ?>
    <div class="postCard">
        <div class="postForm">
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="img/man.jpg" alt="">
                </div>
                <div class="namePostCard">
                    <p class="name"><?php echo $_SESSION['name'];?></p>
                    <div class="divTime">
                        <i class="fa-solid fa-clock"></i>
                        <p><?php echo $_SESSION['createdPost']; ?></p>
                    </div>
                </div>   
            </div>
            <div class="imgPost">
            <img src="img/business.jpg" class="img-fluid rounded" alt="...">
            </div>
            <div class="divNumComments">
                <i class="fa-solid fa-comment pNumComments"></i>
                <p class="pNumComments">22 Comments</p>
            </div>
            <div>
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <input class="form-control" type="text" placeholder="Type your comment" aria-label=".form-control-lg example">
                </div>
            </div>
            <hr class="hr">
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Omar Khaled</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/girlface.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Amal Ahmed</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div class="postCard">
        <div class="postForm">
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="img/man.jpg" alt="">
                </div>
                <div class="namePostCard">
                    <p class="name">Omar Khaled</p>
                    <div class="divTime">
                        <i class="fa-solid fa-clock"></i>
                        <p>4h</p>
                    </div>
                </div>   
            </div>
            <div class="imgPost">
            <img src="img/business.jpg" class="img-fluid rounded" alt="...">
            </div>
            <div class="divNumComments">
                <i class="fa-solid fa-comment pNumComments"></i>
                <p class="pNumComments">22 Comments</p>
            </div>
            <div>
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <input class="form-control" type="text" placeholder="Type your comment" aria-label=".form-control-lg example">
                </div>
            </div>
            <hr class="hr">
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Omar Khaled</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/girlface.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Amal Ahmed</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
<!--end content-->


<!--Bootstrap 5 js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>