<?php
$showError="False";
 if($_SERVER['REQUEST_METHOD'] == "POST"){
     include '_dbconnect.php';
     $email=$_POST['loginEmail'];
     $pass=$_POST['loginPass'];
     
     $Sql = "SELECT * FROM `users` WHERE user_email = '$email' ";
     $result = mysqli_query($conn , $Sql);
     $num = mysqli_num_rows($result);
     if($num == 1){
         $row = mysqli_fetch_assoc($result);
         if(password_verify($pass , $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['name'] = $row['user_name'];
            $_SESSION['user_email'] = $email;
            header("Location: /index.php?loginsuccess=true");
            exit();
           }
         else{
            $showError = "Invalid credentials";
           }
       }
       else{
           $showError = "Invalid credentials";

         }header("Location: /index.php?loginsuccess=false&error=$showError");

}   


?>