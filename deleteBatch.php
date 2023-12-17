<?php
require 'checkLogin.php';

require 'config.php';
$sql = "DELETE FROM student WHERE batch = :batch";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':batch', $_GET['id']);
    $stmt->execute();


    $sql = "DELETE FROM class WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);

    if( $stmt->execute() ):
        $message = 'Batch deleted';
    else:
        $message = 'Sorry there must have been an issue';
    endif;
    header("Location: viewOldBatches.php?message=$message");
echo $message;

?>