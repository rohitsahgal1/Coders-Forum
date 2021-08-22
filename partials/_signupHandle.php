<?php
$showError="False";
 if($_SERVER['REQUEST_METHOD'] == "POST"){
     include '_dbconnect.php';
     $name=$_POST['name'];
     $user_email=$_POST['signupEmail'];
     $pass=$_POST['signupPassword'];
     $cpass=$_POST['signupCpassword'];
     
     $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email' ";
     $result = mysqli_query($conn , $existSql);
     $numExistsrows = mysqli_num_rows($result);
     if($numExistsrows > 0){
         $showError = "Username already exists";
     }
     else{
         if(($pass == $cpass)){
             $hash = password_hash($pass , PASSWORD_DEFAULT );
             $sql = "INSERT INTO `users` (`user_name`,`user_email`, `user_pass`, `timestamp`) 
             VALUES ('$name', '$user_email', '$hash', current_timestamp())";             
             $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
                header("Location: /index.php?signupsuccess=true");
                exit();
             }
         }
         else{
             $showError = "Passwords do not match";
         
         }
     }   
     header("Location: /index.php?signupsuccess=false&error=$showError");
 
 }



?>