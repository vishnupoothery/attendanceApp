<?php
require 'checkLogin.php';

require 'config.php';


$sql = "DELETE FROM attendance WHERE batch = :batch AND date = :date";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':batch', $_GET['batch']);
    $stmt->bindParam(':date', $_GET['date']);

    if( $stmt->execute() ):
        $message = 'Attendance deleted';
    else:
        $message = 'Sorry there must have been an issue';
    endif;
    $batch = $_GET['batch'];
    header("Location: viewAttendance.php?examID=$message&&batch=$batch");
echo $message;

?>