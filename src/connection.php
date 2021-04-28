<?php 
require('log.php');
//CONNEXION
session_start();

if(isset($_SESSION['connect'])){
	header('location: ../');
}

if(!empty($_POST["c_mail"]) && !empty($_POST["c_mdp"])){
	//Variables
	$c_mail=$_POST['c_mail'];
	$c_mdp=$_POST['c_mdp'];
	$error=1;

	//Cryptage du mot de passe 
	$c_mdp="aq1".sha1($c_mdp."1254")."25";

	$req=$bdd->prepare('SELECT * FROM users WHERE mail=?');
	$req->execute(array($c_mail));
	while($user=$req->fetch()){
		if($c_mdp==$user['mdp']){
			$error=0;
			$_SESSION['connect']=1;
			$_SESSION['nom']=$user['nom'];
			$_SESSION['prenom']=$user['prenom'];

			//COOKIES
			if(isset($_POST['connect'])){
				setcookie('auth', $user['id'], time()+364*24*3600, '/', null, false, true);


			}
			header('location: ../membre.php');
		} 
	}
	if($error==1){

		header('location: ../inscription.php?error=1');}
}

?>
