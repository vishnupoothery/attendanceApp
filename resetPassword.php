<?php

session_start();

require 'config.php';

    $message = "error";


    $sql = "UPDATE student SET password = :pass WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $pass = password_hash($_GET['roll'],PASSWORD_BCRYPT);

    $stmt->bindParam(':id', $_GET['id']);
    $stmt->bindParam(':pass', $pass);

    echo $_GET['id'];
    



    if( $stmt->execute() ):
        $message = 'Password Updated';

    else:
        $message = 'Sorry there must have been an issue updating password';
    endif;

echo $message;
$roll = $_GET['id'];
header("Location: viewStudent.php?id=$roll&message=$message");
?>