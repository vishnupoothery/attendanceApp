<?php
//  $host = 'localhost:3307';
//  $user = 'root';
//  $pass = '';
//  $db = 'ucattendance';

//  $conn = new mysqli($host,$user,$pass,$db);
//  if($conn->connect_error){
//    die("Connection Failed : ".$conn->connect_error);
//  }
//  else{
//  }
?>

<?php
 $DB_HOST = 'localhost:3307';
 $DB_USER = 'root';
 $DB_PASS = '';
 $DB_NAME = 'ucattendance';
 
 try{
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;", $DB_USER, $DB_PASS);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
?>