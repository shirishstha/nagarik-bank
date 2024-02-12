<?php 
session_start();
if(isset($_SESSION['Mobile_num'])){
     $ac_num=$_POST['ac_num'];
     $ac_name=$_POST['ac_name'];
     $withdraw_amt=$_POST['withdraw_amt'];
     if(($ac_num&&$ac_name&&$withdraw_amt)==""){
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
                if($db_balance>=$withdraw_amt){
                $withdraw="UPDATE customer
                          SET balance=$db_balance-$withdraw_amt
                          where Account_num=$ac_num";
                $withdraw_result = mysqli_query($conn, $withdraw);
                if(!$withdraw_result){
                    die("You cannot withdraw at the moment");
                }
                echo"Withdraw successfull";




             //I am here





               }else{
                echo"This customer doesnot have Rs.".$withdraw_amt;
               }

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