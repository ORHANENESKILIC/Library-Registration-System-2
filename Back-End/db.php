<?php
try{
	$host='localhost';
	$databasename='library_registration_system';
	$user='root';
	$password='';
	$db=new
	PDO("mysql:host=$host;dbname=$databasename;charset=UTF8","$user",$password);
}

catch(PDOException $e){
	print $e->getmessage();
}
?>