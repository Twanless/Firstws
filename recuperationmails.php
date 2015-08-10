<?php

//configuration

//email destinataire
$destinataire = 'sokhnahndiaye@gmail.com';

//Confirmation message envoyé
$message_envoye= "Ton message m'est bien parvenu, Merci!";

//message non envoyé
$message_non_envoye = "L'envoi de ton message a échoué, réessaye stp.";

//message d'erreurs de ??? et si tous les champs ne sont pas remplis
$message_erreur_formulaire = "Tu dois d'abord envoyer le formulaire" //mettre un lien? 
$message_champs_vides = "Vérifie que tous les champs soient bien remplis.";


//Test envoi formulaire

if(!isset($_POST['action']))
{
	//formulaire non envoyé??
	echo '<p>'.$message_erreur_formulaire. '</p>'."\n";
}
else
{
	//fonction pour supprimer tout en gardant le texte
	function Rec($text)
	{
		$text = htmlspecialchars(trim($text), ENT_QUOTES);
		if (1 === get_magic_quotes_gpc())
		{
			$text = nl2br($text);
			return $text;
		};

		//fonction pour vérifier la validé du mail
			function Ismail($email)
			{
				$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
				return (($value === 0) || ($value === false))  ? false : true;
			}

			// formulaire envoyé en récupère tous les champs
			$nom = (isset($_POST['nom'])) ? Rec($_POST['nom']) :'';
			$email = (isset($_POST['email'])) ? Rec($_POST['email']) : '';
			$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

			//vérification des variables et de l'email
			$email = (Ismail($email)) ? $email : ''; //soit l'email est vide si érroné, soit il vaut l'email entré

			if (($nom != '')  && ($email != '') && ($message != '')) 
			{
				//si les 3 variables sont remplies, on génère puis envoie le mail

			}


	}
}




