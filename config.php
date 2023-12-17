<?php
 $DB_HOST = 'localhost';
 $DB_USER = 'root';
 $DB_PASS = '';
 $DB_NAME = 'pulse';
 
 try{
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;", $DB_USER, $DB_PASS);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
?>