<?php
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

if (filesize($filename) > 0) {

 unlink('../install.php'); 

} 

else { header('Location: ../install.php'); } 


include('./verif.php');
error_reporting(0); 
include 'langues.php';
require 'fonctions.php';
include('includes/haut.php');

/* Les différentes Titres des Pages de l'administration */

switch ($_GET['page'])
{

case 'liste': echo Articles; break;

case 'supprimer': echo Articles; break;

case 'ajouter': echo Ecrire; break;

case 'editer': echo Editer; break;

case 'images': echo Images; break;

case 'upload': echo Images; break;

case 'delete': echo Images; break;

case 'configuration': echo Configuration; break;

default : echo Accueil;
} 

include('includes/centre.php'); 

/* Les différentes Pages de l'administration */

switch ($_GET['page'])
{

case 'liste': liste_news(); break;

case 'supprimer': supprimer_news(); break;

case 'ajouter': anti_slash(); ajout_news(); break;

case 'editer': anti_slash(); editer_news(); break;

case 'images': formulaire_images(); images(); break;

case 'upload': envoyer_images(); break;

case 'delete': supprimer_images(); break;

case 'configuration': configuration(); break;

default : accueil();
}

switch ($_GET['page'])
{

case 'images': break;

case 'configuration': break;

default : include('includes/bas.php');
}

?>
