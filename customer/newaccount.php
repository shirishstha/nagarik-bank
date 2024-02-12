<?php

/*Data Retrive*/
$ac_num=$_POST["ac_num"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$age=$_POST["age"];
$address=$_POST["address"];
$mobile_num=$_POST["mobile_num"];
$email=$_POST["email"];
$pass=$_POST["password"];
$confirmpass=$_POST["confirmpass"];

$mobile_rex="/^98[0-9]{8}$/";
if(!(empty($ac_num)||empty($name)||empty($gender)||empty($age)||empty($address)||empty($mobile_num)||empty($email)||empty($pass)||empty($confirmpass))){
  if(strlen($ac_num)==9){
   if(preg_match($mobile_rex,$mobile_num)){
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
         if($pass==$confirmpass){
            /* Server connection*/
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="bank";
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            if(!$conn){
                die("connection couldnot established");
            }
            
            $sql="INSERT INTO customer(Account_num,Name,Address,Age,Gender,Email,Mobile_num,Password)
                   VALUES('$ac_num','$name','$address',$age,'$gender','$email','$mobile_num','$pass')
            ";
            if(mysqli_query($conn,$sql)){
                echo "Signup successfully";
                echo"<a href='..//signin.html'>Signin</a>";
            }else{
                echo "error couldnot signup";
            }
         }else{
            echo"Password and confirm password doesnot matched";
         }
       }else{
        echo"Invalid email";
       }
    }else{
        echo"Invalid mobile number";
    }
   }else{
    echo"Account number must be of 9 digit long";
   }
}else{
    echo"All the information are mandatory";
}
?>