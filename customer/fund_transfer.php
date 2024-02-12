<?php
   session_start();
   if(isset($_SESSION['Mobile_num'])){
    include 'header.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..//design.css">
</head>
<body>

   <div class="fund_trans">
    <form action="#" method="POST">
       
         <h3>Fund Transfer</h3>
           Account Name: <input type="text" name="receiver_name"><br><br>
           Account Number: <input type="text" name="receiver_ac_num"><br><br>
           Amount: <input type="text" name="amount"><br><br><br>
           <input type="submit" name="submit" value="Transfer">
       
       
    </form>
  </div>
       
</body>
</html>


<?php

  $sender_ac_num=$_SESSION['Account_num'];

  if(isset($_POST['submit'])){
    
     $receiver_name=$_POST['receiver_name'];
     $receiver_ac_num=$_POST['receiver_ac_num'];
     $transfer_amount=$_POST['amount'];
    if(($receiver_name&&$receiver_ac_num&&$transfer_amount)==""){
      die("All fields are mandatory");
    }
     $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bank";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
      die("connection couldnot established");
  }


  $receiver="SELECT * FROM customer where Account_num=$receiver_ac_num";
  $data = mysqli_query($conn, $receiver);
  if (mysqli_num_rows($data) > 0) {
    foreach($data as $d){
       $db_receiver_name=$d["Name"];
       $receiver_balance=$d["balance"];
     }
    if($receiver_name==$db_receiver_name){
       /* balance retrive of sender */
       $sender="SELECT * FROM customer where Account_num=$sender_ac_num";
       $data = mysqli_query($conn, $sender);
       if (mysqli_num_rows($data) > 0) {
        foreach($data as $d){
         $sender_balance=$d["balance"];
         $mobile_num=$d["Mobile_num"];
         }
        if($transfer_amount<=$sender_balance){
            /*FOR sending side*/
            $sender_updated_blc=$sender_balance-$transfer_amount;
            $send="UPDATE customer 
                    SET balance=$sender_updated_blc
                    where Account_num=$sender_ac_num;
             ";

            if(!(mysqli_query($conn,$send))){
                die("Balance couldnot be updated in sender side ");
            }
           
            /*For receiving side */
            $receiver_updated_blc=$receiver_balance+$transfer_amount;
            $receive="UPDATE customer 
                   SET balance=$receiver_updated_blc
                   where Account_num=$receiver_ac_num;
            ";
            $result=mysqli_query($conn,$receive);
           if(!$result){
               echo"Balance couldnot be updated in receiver side ";
           }
           else{
               echo"Transaction Sucessfull";
               $transaction="INSERT INTO transaction (sender_ac_num,receiver_ac_num,transaction_amt)
                            VALUES($sender_ac_num,$receiver_ac_num,$transfer_amount)
               ";
               if(!(mysqli_query($conn,$transaction))){
                die("Cannot record in transaction table");
               }
               header("Location:home.php");
           }
         }
        else{
            echo"You have insufficient balance";
         }
       }
        
    }
    else{
        echo"Name and account number doesnot matched";
    }
  }
  else{
    echo"Please enter a valid or registered account number";
  }
 }
   
 include '..//footer.html';
}else{
  echo"Please login first";
}

?>