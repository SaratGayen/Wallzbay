<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wallzbay";

  $con = mysqli_connect($hostname, $username, $password, $dbname);
if($con){
    ?>
    <script>
      alert("Connection Successful");
    </script>
    <?php
  }else{
    ?>
    <script>
      alert("Connection not Succeful")
    </script>
    <?php
  }
?>