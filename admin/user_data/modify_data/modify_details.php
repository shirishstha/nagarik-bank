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
           <link rel="stylesheet" href="../../../design.css">
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
           <form action="" method="POST">
              
               <div class="update">
                   Account Name:<input type="text" name="name" ><br><br>
                   Gender:<input type="radio" name="gender" value="male">Male
                           <input type="radio" name="gender" value="female">Female<br><br>
                   Age: <input type="text" name="age"><br><br>
                   Address: <input type="text" name="address"><br><br>
                   E-mail:&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email"><br><br>
                   Mobile no: <input type="text" name="mobile_num">
                   <div class="update_btn">
                       <input type="submit" value="Update" name="submit"><br>
                   </div>
                   
               </div>
           </form>
       </body>
       
       </html>
    
    <?php
    if(isset($_POST['submit'])){
     $ac_num=$_GET['ac_num'];

     $name=$_POST['name'];
     $gender=$_POST['gender'];
     $age=$_POST['age'];
     $address=$_POST['address'];
     $email=$_POST['email'];
     $mobile_num=$_POST['mobile_num'];

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "bank";
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     if (!$conn) {
         die("connection couldnot established");
     }
 
     $sql="UPDATE customer
           SET Name='$name',
               Address='$address',
               Age='$age',
               Gender='$gender',
               Email='$email',
               Mobile_num='$mobile_num'
               where Account_num=$ac_num";
     if(mysqli_query($conn,$sql)){
         echo"data modified sucessfully";
     }
     else{
         die("Couldnot update data at the moment");
     }
    
   }
    
   include '../../../footer.html';
}else{
    echo"You have to login first";
}
?>
