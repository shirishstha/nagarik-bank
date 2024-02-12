<?php 
session_start();
if(isset($_SESSION['Mobile_num'])){
?>
     <!DOCTYPE html>
     <html lang="en">
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
          .signout_btn{
            height:30px;
            width:75px;
            position:absolute;
            right:20px;
            top:20px;
            background-color:wheat;
        }
        </style>
     </head>
     <body>
     <form action="update_trans.php" method="POST">
            Account Number: <input type="text" name="ac_num"><br><br>
            <input type="submit" value="submit" name="submit"><br><br><br>  
            <div class="signout_btn">
           <a href="..//signout.php">Sign out</a>
        </div>
        </form>
     </body>
     </html>

 <?php
     if(isset($_POST['submit'])){
     $ac_num=$_POST['ac_num'];
        
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "bank";
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     if (!$conn) {
         die("connection couldnot established");
     }
     $sql="SELECT * FROM customer where Account_num=$ac_num";
     $data = mysqli_query($conn, $sql);
     if (mysqli_num_rows($data) > 0) {
          header('Location:update_trans.php? ac_num='.$ac_num);
      }
      else{
          echo"Please enter a valid account number";
          }

    
    
    }
}
else{
    echo"You have to login first";
}
?>