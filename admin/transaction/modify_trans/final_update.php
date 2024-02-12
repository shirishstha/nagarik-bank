<?php 
session_start();
if(isset($_SESSION['Mobile_num'])){
    $ac_num=$_POST['ac_num'];

    $sender_ac_num=$_POST['sender_ac_num'];
    $receiver_ac_num=$_POST['receiver_ac_num'];
    $transaction_amt=$_POST['transaction_amt'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("connection couldnot established");
    }

    $sql="UPDATE transaction
          SET sender_ac_num='$sender_ac_num',
              receiver_ac_num='$receiver_ac_num',
              transaction_amt='$transaction_amt'

              where Account_num=$ac_num";
    if(mysqli_query($conn,$sql)){
        echo"data modified sucessfully";
    }
    else{
        die("Couldnot update data at the moment");
    }

   
}else{
    echo"You have to login first";
}
?>
