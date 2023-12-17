<?php

session_start();

require 'config.php';

    $sql = "UPDATE batch SET old = 1 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':id', $_GET['id']);
    if( $stmt->execute() ):
        $message = 'Batch Moved to old batches';
    else:
        $message = 'Sorry there must have been an issue registering';
    endif;
header("Location: viewBatches.php?message=$message");
?>