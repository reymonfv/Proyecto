<?php 
function OpenCon()
{
	$dbhost = "localhost";
	$dbuser="root";
	$dbpass="toor";
	$db="examdespliegue";
	$conn= new mysqli($dbhost,$dbuser,$dbpass,$db) or die("error al conectar");
	return $conn;
}
function CloseCon($conn)
{
	$conn -> close();
}
?>