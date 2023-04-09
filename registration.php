<?php
session_start();
  
  
  
  include("functions.php");


  $form_data = $_POST;

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "registration_test";


  if($_SERVER['REQUEST_METHOD'] == "POST") {

     $first_name = $form_data['first_name'];
     $last_name = $form_data['last_name'];
     $country = $form_data['country'];
     $email_address = $form_data['email_address'];
     $password = $form_data['password'];


     $connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

     if($connection == true){

      $sql = "INSERT INTO users
      (first_name, last_name, country, email_address, password)
      VALUES('$first_name', '$last_name', '$country', '$email_address', '$password')";

      
      $query = mysqli_query($connection,$sql);
      if($query){
       echo "Your message has been received.";
       
       header("Location:login.php");

     }  else{
        die("Something went wrong : ".mysqli_error($connection));
     }
 
   }else{
      //not okay
      //stop execution with the error message
     die("There is a problem : ".mysqli_connect_error());
  }


     
   /*  
   if(!empty($first_name) || !empty($last_name) || !empty($country)  || !empty($email_address) && !empty($password) && !is_numeric($first_name) && !is_numeric($last_name) && !is_numeric($country) )
     
   {
      //save to database
      $query = "INSERT into users ('first_name', 'last_name', 'country', 'email_address', 'password') values ($first_name, $last_name, $country, $email_address, $password)";

      $query = mysqli_query($connection, $query);
      
          
      header("Location: login.php");
      die;
   }

  else{
    echo "Please enter valid details!";
  }  */




}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="stylephp.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
   
<div id="box"></div>
<form method= "post">
 
   <label>First Name</label>
   <input type="text" id="first_name" name="first_name" placeholder="" required><br>
    
   <label>Last Name</label>
   <input type="text" id="last_name" name="last_name" placeholder="" required><br>

   <label>Country</label>
   <input type="text" id="country" name="country" placeholder="" required><br>

   <label>Email address</label>
   <input type="email" id="email_address" name="email_address" placeholder="" required><br>

   <label>Password</label>
   <input type="password" id="password" name="password" placeholder="" required><br>

   <input type="submit" value="Register"><br>

</form>

</body>
</html>