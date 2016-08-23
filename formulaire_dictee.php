<!DOCTYPE html>
<html ng-app="store">
<head>

<section class="paper">
 <article class="head"></article>
 
   <article contenteditable="true">

        <meta charset="utf-8" />
        <title>Dictator</title>
		<link rel="icon" type="image/png" href="img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="css/cahier.css" /> 
		<script src="js/test.js"></script>
</head>
<body>
<div class="page-header">
	<h1>Dictator</h1>
</div>
<form action="" method="POST">
<label for="prenom">Prénom : </label><input type="text" name="prenom"/><br/><br/>
<label for="nom">Nom : </label><input type="text" name="nom"/><br/><br/><br/> 
<label for="email">adresse email : </label><input type="email" name="email"/><br/><br/><br/>
<label for="pseudo">Pseudo : </label><input type="text" name="pseudo"/><br/><br/><br/>

<label for="password">Mot de passe : </label><input type="password" name="pass"/><br/><br/><br/><br/><br/><br/><br/><br/>


<input type="submit" name="envoyer" class="btn" value="envoyer" />

<?php
try{
if (isset($_POST['nom'])){	
	
	
	
	$base = new PDO ( 'mysql:host=127.0.0.1;dbname=dictactor', 'root' , 'shakti' );
	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			
			
	$verif=$base->query("SELECT emailUsers FROM users WHERE emailUsers='".$_POST['email']."'");
	$compar = $verif->rowCount();
	//var_dump($compar);		
			
			
			
	$sq1 = "INSERT INTO users (prenomUsers,nomUsers,emailUsers,pseudoUsers,passwordUsers)  VALUES (:prenom,:nom,:email,:pseudo,:pass)";	
	$resultat = $base->prepare($sq1);

	$prenom =  $_POST['prenom'];
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$pseudo = $_POST['pseudo'];
	$passw = $_POST['pass'];
	
	
	$resultat->bindParam(':prenom',$prenom);
	$resultat->bindParam(':nom',$nom);
	$resultat->bindParam(':email',$email);
	$resultat->bindParam(':pseudo',$pseudo);
	$resultat->bindParam(':pass',$passw);
	
	
	
	if ($compar==0){
					$resultat->execute();
					$resultat->closeCursor();
					$verif->closeCursor();
					header("Location:dictator.html?message=1");
					
				}
				else
				{
					$resultat->closeCursor();
					$verif->closeCursor();
					echo "<p>Votre compte est déjà enregistré</p>";
				}
			
			}
		}
	
	
	catch (Exception $e)
				 {
					 die('Erreur : '.$e->getMessage());
				 }
	finally {
				$base=null; //Fermeture de la connexion
			}
	?>

</article>
</section>

</form>
</body>
</html>