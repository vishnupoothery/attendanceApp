<?php

session_start();

require 'config.php';

if(!empty($_POST['submit'])):
    $sql = "UPDATE batch SET batchName = :batchName WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':batchName', $_POST['batchName']);
    $stmt->bindParam(':id', $_POST['id']);
    if( $stmt->execute() ):
        $message = 'Batch Sucessfully edited';
    else:
        $message = 'Sorry there must have been an issue registering';
    endif;
endif;
header("Location: viewBatches.php?message=$message");
?>