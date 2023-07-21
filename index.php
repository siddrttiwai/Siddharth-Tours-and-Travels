<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $conn =  new mysqli('localhost','root','','siddharthtravels');

    if($conn->connect_error){
        die("Connection with database is not happening due to".$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into contact(name,email,subject,message) values(?,?,?,?)");
        $stmt->bind_param("ssss",$name, $email, $subject, $message);
        $stmt->execute();
        echo "We will get to you soon!";
        $stmt->close();
        $conn->close();
    }

?>