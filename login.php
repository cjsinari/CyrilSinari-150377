<?php

session_start();
  
  include("functions.php");


  $form_data = $_POST;

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "registration_test";


   if($_SERVER['REQUEST_METHOD'] == "POST") {

     
     $email_address = $form_data['email_address'];
     $password = $form_data['password'];


     $connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

     if($connection == true){

      //read from database 
      $sql = "SELECT FROM  users WHERE email_address = '$email_address' limit 1";
      $result = mysqli_query($connection, $query);

      if($result){
       
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            
              if ($user_data['password'] === $password ){
                 
                $_SESSION['email_address'] = $user_data['email_address'];
                header("Location: index.php");
                die;
              
            }
            
            
        } 
       
     
      } 
      
      else{
           die("Something went wrong : ".mysqli_error($connection));
          }
    }
      else {
        //not connected
         //stop execution with the error message
         die("There is a problem : ".mysqli_connect_error());
      }


  }


























?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="stylephp.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>  
</head>
<body>

  <div id ="box"></div>

  <form method= "post">

		<label>Email address</label>
		<input type="email" id="email_address" name="email_address" placeholder="Enter email address" required><br>
		
		<label>Password</label>
		<input type="password" id="password" name="password" placeholder= "Enter password" required><br>
		
		<input type="submit" value="Log in"><br>


        <p>Don't have an account? Register <a href="registration.php"> here </p>
        

  </form>




</body>
</html>