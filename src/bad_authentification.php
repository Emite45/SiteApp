<?php
//Affichage d'un message en cas de mauvaise saisi des identifiants
			if(isset($_GET['error'])){
				echo '<p id="error">Identifiants incorrects</p>';
				}
				else if(isset($_GET['success'])){
					echo '<p></p>';
				}
?>