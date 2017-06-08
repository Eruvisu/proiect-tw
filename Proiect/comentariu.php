<?php
session_start();
header('location: recenzii.php');
require (__DIR__ . '/app/start.php');
 
$hostname = "fenrir.info.uaic.ro";
$username = "ArtifactyDB";
$password = "d8iAwA0NwO";
$dbname = "ArtifactyDB";

$con = new mysqli($hostname, $username, $password, $dbname);

 if($con->connect_error)
  {
    die("Connection failed: " . $con->connect_error);
  }
 

IF($_SERVER["REQUEST_METHOD"]=="POST") 
{

 $comentariu=$_POST['comentariu'];
 $submit=$_POST['submit'];

  if($submit)
  {
	  
	  if($comentariu)
	  {
		  $sql= "INSERT INTO comentarii (nume,comentariu,timestamp) VALUES ('".$_SESSION['username']."','$comentariu',NOW())";
		  
	  }
	  else
	  {
		  echo "Va rugam completati toate campurile!";
	  }
	  
  }

  if($con->query($sql) == TRUE)
  {
   echo "Inregistrare adaugata cu succes in baza de date!";
  }
  else
  { echo "Error: " .$sql . "<br>" . $con->error;}
  
  
}

$con->close();

?>