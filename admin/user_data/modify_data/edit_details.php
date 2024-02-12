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
        <link rel="stylesheet" href="../../../design.css">
     </head>
     <body>
     <div class="header_main">
        <div class="logo">
            <img src="../../../materials/logo.jpg" alt="logo">
        </div>
        <div class="bank_name">
            Nagarik Bank pvt.ltd
        </div>
       <div class="nav">
         <ul>
            <li><a href="../../home.php">Home</a></li>
            <li> <a href="../../user_data/search_details.php">Search user details</a></li>
            <li><a href="../../transaction/search_transaction.php">Search transaction</a></li>
            <li><a href="../../user_data/modify_data/edit_details.php">Edit user details</a></li>
         </ul>
       </div>
       
       <div class="signout_btn">
        <a href="../../../signout.php">Sign out</a>
      </div>

    </div>
    <div class="search_ac_num">
     <form action="input_details.php" method="POST">
            Account Number: <input type="text" name="ac_num"><br><br>
            <input type="submit" value="submit" name="submit"><br><br><br>  
        </form>
</div>
     </body>
     </html>

<?php
    include '../../../footer.html';
    }
else{
    echo"You have to login first";
}
?>