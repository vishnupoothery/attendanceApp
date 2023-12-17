<?php

session_start();

require 'config.php';

if(!empty($_POST['submit'])):


//    $sql = "INSERT INTO attendance (rollNo,batch,date,absent) VALUES (:rollNo,:batch,:date,:absent)";
    $sql = "UPDATE attendance SET absent = :absent WHERE rollNo = :rollNo AND date = :date";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':rollNo', $rollNo);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam('absent', $absent);

    $date = $_POST['date'];
    $batch = $_POST['batch'];
    $roll = $_POST['rollNo'];
    $absentss = $_POST['absent'];

    for ($i = 0; $i<$_POST['count'];$i++)
    {
        $rollNo = $roll[$i];
        $absent = $absentss[$i];
        $stmt->execute();
    }
    $message = "Attendance Edited";


endif;

header("Location: viewBatchAttendance.php?message=$message&&batch=$batch&&date=$date");

?>