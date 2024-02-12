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
        </head>
          <body>
         
        

        <?php
     foreach($data as $d){
         $mobile_num = $d["Mobile_num"];
         $name = $d["Name"]; 
         $ac_num=$d["Account_num"];
         $balance=$d["balance"];
         $gender=$d['Gender'];
         $age=$d['Age'];
         $address=$d['Address'];
         $email=$d['Email'];
        
     
       
        
      
       
        
       

     }
    }else{
      echo"Please enter a valid account number";
    }
      ?>
       <div class="ac_details">
            <table border="10">
              <tr>
                <th> Account.no</th>
                <th> Name</th>
                <th> Mobile.no</th>
                <th> Gender</th>
                <th> Age</th>
                <th> Address</th>
                <th>Email</th>
                <th> Balance</th>
              </tr>
              <tr>
                <td><?php   echo"$ac_num"    ?> </td>
                <td><?php   echo"$name";  ?></td>
                <td><?php   echo"$mobile_num";   ?></td>
                <td><?php   echo"$gender";  ?></td>
                <td><?php   echo"$age";   ?></td>
                <td><?php   echo"$address"; ?></td>
                <td><?php   echo"$email"; ?></td>
                <td>Rs.<?php   echo"$balance"; ?></td>
              </tr>
            </table>

            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
             &nbsp;&nbsp;
            &nbsp;&nbsp;
             &nbsp;&nbsp;
            &nbsp;&nbsp;
             <br><br>
      </div>
    </body>
    </html>
    
 <?php
 include '..//footer.html';
}else{
  echo"You have to login first";
}
?>
