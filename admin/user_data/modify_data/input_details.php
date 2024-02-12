<?php 
session_start();
if(isset($_SESSION['Mobile_num'])){
?>
    <?php
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
             header('Location:modify_details.php? ac_num='.$ac_num);
         }
         else{
             echo"Please enter a valid account number";
             }
  }
else{
    echo"You have to login first";
}
?>