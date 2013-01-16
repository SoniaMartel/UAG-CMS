<?php

function lire_array($fichier)
{
if (file_exists($fichier))
{
$contents = file_get_contents($fichier);
$tableau=array();
$tableau=explode("-",$contents);// transformation des données en array
return $tableau;
}
else echo 'Fichier  '.$fichier.' non trouvé (lecture)';
}
/******************************************/
function ajout($fichier,$ajout)
{
			$fichier;
	// Ouvrir le fichier en écriture
	if (file_exists($fichier)) { 
 		 $inF = fopen($fichier,"a"); //Mode Append	=> ajout	 
 	}else{
 		 $inF = fopen($fichier,"w"); // Le créer si introuvable
 	}
  fputs($inF,$ajout."-");
  fclose($inF);
}

$fichier='configuration.txt'; 
$tableau=array();
$tableau=lire_array($fichier);
error_reporting(0);
/******************************************************

# *** LICENCE ***
# Ce fichier fait partie de UAG CMS
# http://julien-et-nel.be/UAG/
#
# 2012 Jonathan Julien Soulignac <julien-soulignac@live.fr>
#
# UAG CMS est un script libre, vous pouvez le redistribuer sous les termes de la 
# License Libre de Diffusion Gratuite Paternité V1 : http://julien-et-nel.be/LLDGP1/ .
#
# En outre, tous les distributeurs de versions non officielles DOIT avertir 
# l'utilisateur final de celui-ci, par tout moyen visible avant le téléchargement.
# *** LICENCE ***

******************************************************/
$salt = 'BwGk15l8WX'; 
$_admin_pass = base64_decode($tableau[7]); 
$_admin_login = base64_decode($tableau[6]);
?>
