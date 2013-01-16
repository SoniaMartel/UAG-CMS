<?php
session_start(); // on initialise les sessions PHP
header ('Location: index.php');

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
include 'config.php';
include 'langues.php';

if($_POST && !empty($_POST['login']) && !empty($_POST['mdp']))
{
     // on crypt le mot de passe envoyer par le formulaire
     $password_sha1 = sha1($_POST['mdp'].$salt);

     if(($_admin_login == $_POST['login']) && ($password_sha1 == $_admin_pass))
     {
         $_SESSION['_login'] = $_admin_login;
         $_SESSION['_pass'] = $password_sha1;
     }
     else
     {
         include 'connexion.php';
         exit();
     }
}
?>
