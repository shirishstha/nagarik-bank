<?php
session_start();

/*Data Retrive*/
$Mobile_num = $_POST["Mobile_num"];
$pass = $_POST["password"];

/* Server connection*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("connection couldnot established");
}

/*Search in customer table*/ 

$sql = "SELECT Mobile_num,password,Account_num FROM customer where Mobile_num='$Mobile_num'
";
$data = mysqli_query($conn, $sql);
if (mysqli_num_rows($data) > 0) {
    foreach($data as $d){
        $db_Mobile_num = $d["Mobile_num"];
        $db_pass = $d["password"]; 
        $ac_num=$d["Account_num"];
    }

    if ($db_Mobile_num == $Mobile_num && $db_pass == $pass) {
        $_SESSION['Mobile_num']=$db_Mobile_num;
        $_SESSION['Account_num']=$ac_num;

        header('location: customer/home.php');

    } 
    else{
        echo"Dear customer, mobile and password doesnot match";
    }
}

/*End of Search in customer table*/ 

else {
     /*Search in cashier table*/ 
        $sql1 = "SELECT Mobile_num,password FROM cashier where Mobile_num='$Mobile_num'
        ";
        $data1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($data1) > 0) {
            foreach($data1 as $d){
                $db_Mobile_num = $d["Mobile_num"];
                $db_pass = $d["password"]; 
            }
        
            if ($db_Mobile_num == $Mobile_num && $db_pass == $pass) {
                echo "Mobile_num and password matched";
                $_SESSION['Mobile_num']=$db_Mobile_num;

                header('location: cashier/home.php');
            } 
            else{
                echo"Hey cashier ! mobile and password doesnot match";
            }
        }
        /*End of Search in cashier table*/ 
        else{
                /*Search in admin table*/ 
                 $sql2 = "SELECT Mobile_num,password FROM admin where Mobile_num='$Mobile_num' ";
                 $data2 = mysqli_query($conn, $sql2);

                 if (mysqli_num_rows($data2) > 0)
                  {
                      foreach($data2 as $d)
                      {
                        $db_Mobile_num = $d["Mobile_num"];
                        $db_pass = $d["password"]; 
                       
                      }
        
                     if ($db_Mobile_num == $Mobile_num && $db_pass == $pass) {
                       echo "Mobile_num and password matched";
                       $_SESSION['Mobile_num']=$db_Mobile_num;

                       header('location: admin/home.php');
                     } 
                     else{
                        echo"Hey admin ! mobile and password doesnot match";
                     }

                 }
                  else{
                    echo" you are not a registered user";
                  }
        
            }
            /*End of Search in cashier table*/ 

}


?>