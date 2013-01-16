<?php
session_start();

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

// on inclu la page de config
include("config.php");

if(!isset($_SESSION['_login']) || !isset($_SESSION['_pass']  ))
{
     // si on ne détecte aucune sessions, c'est que cette personne n'est pas connecté
     // on affiche le formulaire de connexion
     include("connexion.php");
     exit();
}
else
{
     // les sessions existe ... reste à savoir si les informations sont correct ou non
     if(($_admin_login != $_SESSION['_login']) || ($_SESSION['token'] == $_POST['token']) ||($_SESSION['_pass'] != $_admin_pass))
     {
         include("connexion.php");
         exit();
     }
}

$timestamp_ancien = time() - (30*60);

if($_SESSION['token_time'] >= $timestamp_ancien) {}

else

{
unset($_SESSION);
unset($_COOKIE);
session_destroy();
header ("X-FRAME-OPTIONS: DENY");
header ('Location: connexion.php');
}

header ("X-FRAME-OPTIONS: DENY");
?>
