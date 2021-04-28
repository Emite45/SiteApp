<?php 
//Connexion à la base de données
//CONNEXION A LA BDD
try {
    $bdd=new PDO('mysql:host=localhost;dbname=neuroconnect;charset=utf8', 'root', '');
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
 
//Ajout d'un utilisateur lors de l'inscription 
if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) && $_POST['mdp']==$_POST['confirmation'] && isset($_POST['CGU'])){
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $mail=$_POST['mail'];
    $mdp=$_POST['mdp'];
	
	

	//Cryptage du mot de passe 
	$mdp="aq1".sha1($mdp."1254")."25";

	//Envoi des coordonnées à mySQL
    $requete=$bdd->prepare('INSERT INTO users(prenom, nom, mail, mdp) VALUES(?, ?, ?, ?)');
    $requete->execute(array($prenom, $nom, $mail, $mdp));
	header('location: ../inscription.php?success=1');
}
	//Verification que l'adresse mail n'a pas été utilisé deux fois
    ?>


 



	

