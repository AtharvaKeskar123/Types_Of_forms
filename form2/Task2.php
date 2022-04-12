<?php
     $Name = $_POST['Name'];
     $Email = $_POST['Email'];
     $Subject = $_POST['Subject'];
     $Number = $_POST['Number'];
     
     // Database Connections
     $conn = new mysqli('localhost','root','','task4');
     if($conn->connect_error){
         die('Connection failed : '.$conn->connect_error);
     }else{
         $stmt = $conn->prepare("insert into registration(Name,Email,Subject,Number) 
               values(?,?,?,?)");
         $stmt->bind_param("ssii",$Name,$Email,$Subject,$Number);
         $stmt->execute();
         echo "Welcome".$Name."<br>";
         
         echo "Your Email adress is: ".$Email."<br>";
         $stmt->close();
         $conn->close();
     }




?>