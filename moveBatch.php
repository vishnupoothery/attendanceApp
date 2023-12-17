<?php

session_start();

require 'config.php';

if (isset($_GET['id'])) {
    $sql = "DELETE FROM class WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $_GET['id']);
    
    if ($stmt->execute()) {
        $message = 'Batch Deleted';
    } else {
        $message = 'Sorry, there must have been an issue deleting the batch';
    }
} else {
    $message = 'Invalid batch ID';
}

header("Location: viewBatches.php?message=$message");
?>
