<?php  
$Host = "localhost";
$User = "root";
$Pass = "";
$Dbname = "aplikasipengelolaanlaundry";

try
{
	$Connection = new PDO("mysql:host={$Host};dbname={$Dbname}", $User, $Pass);
	$Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo $e->getMessage();
}



?>