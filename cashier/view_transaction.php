<?php 
session_start();
if(isset($_SESSION['Mobile_num'])){
    include 'header.html';
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
     ?>
       <!DOCTYPE html>
       <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="..//design.css">
            <style>
                .transaction_history{
                    min-height: 200px;
                    width: 50%;
                    position: relative;
                    top: 50px;
                    border-radius: 40px;
                    box-shadow: 0 0 8px black;
                    left: 350px; 
                    margin-bottom:200px;
                }
                .inner_transaction{
                    padding-left:100px;
                }
            </style>
       </head>
      <body>
            
      <div class="transaction_history">
       <div class="inner_transaction">
        <h3>Transaction History</h3> <br>
        Transaction id &nbsp;Sender account number&nbsp;Receiver account number&nbsp; Amount <br><br>
        <?php  
        $transaction=" SELECT * FROM transaction where sender_ac_num='$ac_num' OR receiver_ac_num='$ac_num' ";
        $trans_data=mysqli_query($conn,$transaction);
        if (mysqli_num_rows($trans_data) > 0) {
         foreach($trans_data as $d){
            $transaction_id = $d["transaction_id"];echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo"$transaction_id";echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            $sender_ac_num = $d["sender_ac_num"];echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; echo" $sender_ac_num";echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            $receiver_ac_num=$d["receiver_ac_num"];echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo" $receiver_ac_num";echo"&nbsp&nbsp&nbsp&nbsp";
            $transaction_amt=$d["transaction_amt"];echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo" $transaction_amt";echo"&nbsp";
            echo"<br> <br>";
          }
         }      
         ?>
      </div>  
    </div>  
     </body>
     </html>
        <?php
    }else{
      echo"Please enter a valid account number";
    }
    include '..//footer.html';
    
 
}else{
    die("Please login first");
}
?>
