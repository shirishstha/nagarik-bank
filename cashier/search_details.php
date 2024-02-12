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
  <div class="search_ac_num">
       <form action="view_details.php" method="POST">
            Account Number: <input type="text" name="ac_num"><br><br>
            <div class="submit_btn">
            <input type="submit" value="View" name="submit"><br><br><br>  
            </div>
        </form>
</div>
  </body>
  </html>
     

 <?php
 include '..//footer.html';
}else{
  echo"You have to login first";
}
?>
