<?php
          session_start();
          include_once "php/connection.php";
          if(isset($_POST['submit'])){
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $password = mysqli_real_escape_string($con, $_POST['password']);
          if(isset($_FILES['image']))
          
          // servercite empty validation
          if($username != "" && $email !="" && $password !="" && $_FILES !=""){

          
        //   password encryption
          $pass=password_hash($password,PASSWORD_BCRYPT);
          
        //   email chechking
          $emailquery = "select * from users where email='$email'";
          $query=mysqli_query($con,$emailquery);
          $emailcount = mysqli_num_rows($query);
          if($emailcount>0){
          echo "email already exist";
          } 
          // image
          else{
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"userpfpic/".$new_img_name)){
                              
        //   inserting records
          $insertquery = "insert into users (uniqueid,username,email,password,img) values ('$username','$email','$pass','$new_img_name')";


        // connection alerts
          $iquery = mysqli_query($con,$insertquery);
          if($iquery){
            ?>
            <script>
              alert("Connection Successful");
            </script>
            <?php
          }else{
            ?>
            <script>
              alert("Connection not Succeful");
            </script>
            <?php
          }
       }
      }}}}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallzbay-The.best.wallapers.of.the.earth</title>
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="imge/x-ico">
    <link rel="stylesheet" href="css/signup.css">
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body> 
    <section>
     <div class="img">
        <img src="img/Color logo - no background.png" alt="picture not found !!">

     </div>
     <div class="cont">
        <div class="items">
        <h1>Create Account</h1>
        <!-- direct login via google & facebook -->
        <div class="media-options">
            <a href="#" class="field google">
                <i class="uil uil-google"></i>
                <span>Login with Google</span>
            </a>
    
            <a href="#" class="field google">
                <i class="uil uil-facebook"></i>
                <span>Login with Facebook</span>
            </a>
        </div> 
        <span>-OR-</span>
        <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
            <i class="uil uil-user"></i>
            <input type="text" placeholder="Full Name" name="fname" required>
            <br>
            <i class="uil uil-image-upload"></i>
            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="image" name="image" required>
            <br>
            <i class="uil uil-envelope-alt"></i>
            <input type="email" placeholder="Email addres" name="email" required>
            <br>
            <i class="uil uil-lock"></i>
            <input type="password" placeholder="Type your password" name="password" class="password" required>
            <i class="uil uil-eye-slash showHidePw"></i>
            <br>
            <div class="checkbox-text">
                <div class="checkbox-content">
                    <input type="checkbox" id="termCon" required>
                    <label for="termCon" class="text">I accepted all terms and conditions</label>
                </div>
            </div>
            <input type="submit" name="submit" id="button" value="Signup">
        </form>
        <br>
        <p>Alreday  have aaccount?<a href="signin.html">Login</a> </p>
    </div>
        

     </div>
     
   </section>
   <script src="js/sh.js"></script>
</body>
</html>