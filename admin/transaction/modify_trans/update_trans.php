<?php 
session_start();
if(isset($_SESSION['Mobile_num'])){

 
?>
    <!DOCTYPE html>
       <html lang="en">
       
       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Update data</title>
           <style>
               .update {
       
                   margin: 200px;
                   margin-top: 130px;
                   margin-left: 450px;
                   margin-right: 400px;
                   padding-top: 50px;
                   padding-left: 150px;
                   padding-bottom: 50px;
                   box-shadow: 0 0 10px black;
                   border-radius: 10px;
               }
       
               * {
                   margin: 0;
                   padding: 0;
       
               }
       
               .update_btn {
                   padding-left: 100px;
                 
               }
               
           </style>
       </head>
       
       <body>
           <form action="final_update.php" method="POST">
              
               <div class="update">
                <input type="hidden" name="ac_num" value="$ac_num">
                   Sender account num: <input type="text" name="sender_ac_num"><br><br>
                   Receiver account num: <input type="text" name="receiver_ac_num"><br><br>
                   Transaction amount: <input type="text" name="transaction_amt"><br><br>
                   <div class="update_btn">
                       <input type="submit" value="Update" name="submit"><br>
                   </div>
                   
               </div>
           </form>
       </body>
       
       </html>
    
    <?php
   $ac_num=$_GET['ac_num'];
   
}else{
    echo"You have to login first";
}
?>
