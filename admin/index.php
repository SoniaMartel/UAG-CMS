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

if (filesize($filename) > 0) {} 

else { header('Location: ../install.php'); } 


include('./verif.php');
error_reporting(0); 
include 'langues.php';
require 'fonctions.php';

echo'
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>UAG CMS</title>
<meta name="Description" content="Administration de UAG CMS" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="defaut.css" />
<link rel="stylesheet" href="defaut2.css" />
<link rel="shortcut icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="stylesheet" href="jquery/css/ui-lightness/jquery-ui-1.10.2.custom.css" />
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.coda-slider-3.0.js"></script>

    <script>
      $(function() {
        $(\'#main-slider\').codaSlider({
          autoHeight: false,
          continuous:false,
          dynamicArrows: false,
          dynamicTabs: false
        });
        $(\'#showcase\').codaSlider();
        $(\'#continuous\').codaSlider({
          autoSlide: false,
          continuous: false,
          dynamicArrowsGraphical: false,
          dynamicTabsAlign: "right",
          dynamicTabsPosition: "bottom",
          panelTitleSelector: "div.title"
        });
        $(\'#dynamic-tabs\').codaSlider({
          autoSlideControls:false,
          dynamicTabsAlign: "left",
          dynamicTabsPosition: "top",
          dynamicArrows: false
        })
        $(\'#information\').codaSlider({
          dynamicArrows: false,
          dynamicTabs: false,
          slideEaseFunction: "easeOutCirc"
        });
      });
      </script>

<script src="js/editeur.js"></script>
<script type="text/javascript">addEvt(window,\'load\',whizzywig);</script>
    <script>
        $(function(){
            setInterval(function(){
                $(\'#ajax-refresh\').load(\'chat.php\');
            }, 0);
        });
    </script>
	
<script>
$(function() {
$( "#dialog-modal" ).dialog({
width: 1020,
modal: false
});
});
 $(function() {
$( "#draggable" ).draggable();
});
 $(function() {
$( "#draggable2" ).draggable();
});
 $(function() {
$( "#draggable3" ).draggable();
});
 $(function() {
$( "#draggable4" ).draggable();
});
 $(function() {
$( "#draggable5" ).draggable();
});
 $(function() {
$( "#draggable6" ).draggable();
});
 $(function() {
$( "#draggable7" ).draggable();
});
</script>

</head>
<body>
<body onload="whizzywig()">';

echo'
<style type="text/css">
';
if (base64_decode($tableau[30])=='') {echo'
html {background-image:url(\''.base64_decode($tableau[5]).'/fond.jpg\');}
page{background-color:transparent !important;}
body{background-color:transparent !important;}';}
else {echo'
html {background-image:url(\''.base64_decode($tableau[30]).'\');}
page{background-color:transparent !important;}
body{background-color:transparent !important;}';}

echo'</style>

<div id="page">
<div id="header2">
<div id="ajax-refresh">';
include('chat.php');

echo'</div>';

echo'</div>
<div id="header">UAG CMS
';

include('includes/centre.php'); 

/* Les différentes Pages de l'administration */

echo'<div id="dialog-modal" title="';

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

case 'blog': echo Blog; break;

default : echo Accueil;
} 

echo'">';

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

case 'blog': blog(); break;

default : accueil();
}

echo'</div>';

switch ($_GET['page'])
{

case 'images': break;

case 'configuration': break;

default : include('includes/bas.php');
}

?>
