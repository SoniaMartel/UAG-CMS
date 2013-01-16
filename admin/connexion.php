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
$filename = 'configuration.txt';

echo'<meta http-equiv="content-type" content="text/html; charset=utf-8" />';

if (filesize($filename) > 0) {

} 

else {


echo '<div id="page"><div id="titre2">System of protection:<br/><br/> no configuration file, no connection!</div></div>';
    
}

error_reporting(0); 
include '../lang/en-lang.php';
require 'fonctions.php';
connexion_blog();
header ("X-FRAME-OPTIONS: DENY");

?>
