<?php
   $first-name = $_POST['first-name'];
   $sec-name = $_POST['sec-name'];
   $email = $_POST['email'];
   $zip-code = $_POST['zip-code'];
   $ph-number = $_POST['ph-number'];
   $visit-date = $_POST['visit-date'];
   $message = $_POST['message'];


   $conn = new mysqli('localhost','root','','test');
   if($conn->connect_error){
       die('Connection Failed :' .$conn->connect_error);
   }else{
       $stmt = $conn->prepare("insert into registration(first-name, sec-name, email, zip-code, ph-number, visit-date, message) values(?, ?, ?, ?, ?, ?, ?)");
       $stmt->bind_param("ssssiis",$first-name, $sec-name, $email, $zip-code, $ph-number, $visit-date, $message);
       $stmt->execute();
       echo "Registration Successful....";
       $stmt->close();
       $conn->close();
   }

?>