<?php
   session_start();
   if(isset($_SESSION['Mobile_num'])){
    include 'header.html';
   $mobile_num=$_SESSION['Mobile_num'];
   

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "bank";
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   if (!$conn) {
       die("connection couldnot established");
   }
 
//    Data of main content
   $sql="SELECT * FROM customer where Mobile_num=$mobile_num";
   $data = mysqli_query($conn, $sql);
   if (mysqli_num_rows($data) > 0) {
    foreach($data as $d){
        $Mobile_num = $d["Mobile_num"];
        $name = $d["Name"]; 
        $ac_num=$d["Account_num"];
        $balance=$d["balance"];
    }
   }

//     data of transaction
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="..//design.css">
    <style>
        .inner_transaction{
            padding-left:80px;
        }
        .info_welcome{
            position: absolute;
            font-weight: 100;
            font-size: 30px;
            top: 30px;
        }

    </style>

</head>
<body>
 

    
    <div class="info">
        <div class="info_welcome"> Welcome <span> <?php echo"$name"  ?></span></div>
       <br><br><br>
      Account Number: <?php echo"$ac_num"?> <br>
      Account Name: <?php echo"$name"?> <br>
      Balance: <?php echo"$balance"?>
  </div> 

  <div class="transaction_history">
    <div class="inner_transaction">
    <h3>Transaction History</h3> <br>
    
    Transaction id &nbsp;&nbsp;Sender account number&nbsp;&nbsp;Receiver account number&nbsp;&nbsp; Amount <br><br>
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
 include'..//footer.html';
  } else{
    echo"Please login first";
}

 ?>