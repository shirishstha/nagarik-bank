<?php 
session_start();
if(isset($_SESSION['Mobile_num'])){
     $ac_num=$_POST['ac_num'];
     $ac_name=$_POST['ac_name'];
     $diposit_amt=$_POST['diposit_amt'];
     if(($ac_num&&$ac_name&&$diposit_amt)==""){
        die("All fields are mandatory");
     }
     else{
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
            foreach($data as $d){
            $db_ac_name = $d["Name"]; 
            $db_ac_num=$d["Account_num"];
            $db_balance=$d["balance"];
            }
            if($ac_name==$db_ac_name&&$ac_num==$db_ac_num){
                $diposit="UPDATE customer
                          SET balance=$db_balance+$diposit_amt
                          where Account_num=$ac_num";
                $diposit_result = mysqli_query($conn, $diposit);
                if(!$diposit){
                    die("You cannot diposit at the moment");
                }
                echo"Diposit successfull";




             //I am here







            }
            else{
                echo"account number and name doesnot matched";
            }

        }
        else{
            die("Enter a valid account number");
        }
    }

}
else{
    die("Please signin first");
}
?>