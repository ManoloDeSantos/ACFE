<!DOCTYPE HTML>
<html>
<html lang="fr">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>

</head>

<body>
<p id"O">   

<?php

$code=$_POST['code'];
$message=$_POST['message'];  
$nom=$_POST['nom']; 
$email=$_POST['email']; 
$telephone=$_POST['telephone'];


include("configuration.php");



//je vérifie si l’utilisateur est déjà enregistré 
$query="select * from registre_utilisateurs where idUser=".$code;

$result=mysql_query($query) or die("Erreur dans l’instruction SQL");

if (mysql_num_rows($result) > 0) {
	echo"<br/><br/>";
	echo "L’Utilisateur est déjà enregistré </br>";
	echo "<a href=../contact.php>Retourner</a>";

} else if (mysql_num_rows($result) == 0) {
//nous enregistrons l’utilisateur dans l’association
  
$query="insert into registre_utilisateurs(idUser,email,telephone,nom,message)
	values($code,'$email','$telephone','$nom','$message')";
	$result=mysql_query($query) or die("Erreur d’exécution de l’instruction SQL ".mysql_error());
	
	echo"<br/><br/>";
	echo "<br/>";
    echo "<a href=../contact.php>Retourner</a>";
	mysql_close();          
        

}

?>
 <!-- javascript -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>

  </body>
</html>