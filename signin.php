<?php
         session_start();
          include_once "php/connection.php";
          if(isset($_POST['submit'])){
          $email=$_POST['email'];
          $password=$_POST['password'];

        // checking email
          $email_search= "select * from users where email='$email'";
          $query = mysqli_query($con,$email_search);
          $email_count =  mysqli_num_rows($query);

          if($email_count){
          $email_pass = mysqli_fetch_assoc($query);
        
        // checking password

          $db_pass = $email_pass['password'];

        //   name storing in seesion
          $_SESSION['username'] = $email_pass['username'];


          $pass_decode = password_verify($password,$db_pass);

        //  log in after matching password

           if($pass_decode){

            if(isset($_POST['rememberme'])){
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);
                header('location:user.php');
            }


           echo "login successfull";
      
         // Redirecting to chat screen using script

          ?>
           <script>
           location.replace("home.html");
          </script>
          <?php
        }

       
       else{
           echo "Password Incorrect";
          }

        }else{ 
          echo "Incorrect Email";
          }
    
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
    <link rel="stylesheet" href="css/signin.css">
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
</head>
<body> 
    <section>
     <div class="img">
        <img src="img/WALZBAYsign.svg" alt="picture not found !!">

     </div>
     <div class="cont">
        <div class="items">
        <h1>Log in</h1>
        <form>
            <i class="uil uil-envelope-alt"></i>
            <input type="email" placeholder="Email addres" name="email">
            <br>
            <i class="uil uil-lock"></i>
            <input type="password" placeholder="Type your password" name="password" class="password" required>
            <i class="uil uil-eye-slash showHidePw"></i>
            <br>
            <div class="checkbox-text">
                <div class="checkbox-content">
                    <input type="checkbox" id="termCon" required>
                    <label for="termCon" class="text">remembar me</label>
                </div>
            </div>
            <input type="submit" name="submit" id="button" value="Signin">
        </form>
        <a href="signup.php">Create a new account?</a> 
    </div>  

     </div>
   </section>
   <script src="js/sh.js"></script>
</body>
</html>