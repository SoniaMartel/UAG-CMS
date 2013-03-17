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

$fichier='admin/configuration.txt'; 
$tableau=array();
$tableau=lire_array($fichier);
error_reporting(0);

$filename = 'admin/configuration.txt';

if (filesize($filename) > 0) {} 

else { header('Location: install.php'); } 

error_reporting(0); 

include('lang/'.base64_decode($tableau[1]).'-lang.php');

require 'admin/fonctions.php';

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
<link rel="stylesheet" href="admin/defaut.css" />
<link rel="stylesheet" href="admin/defaut2.css" />
<link rel="shortcut icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="stylesheet" href="admin/jquery/css/ui-lightness/jquery-ui-1.10.2.custom.css" />
<script src="admin/js/jquery.min.js"></script>
<script src="admin/js/jquery-ui.min.js"></script>
<script src="admin/js/jquery.coda-slider-3.0.js"></script>

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

<script src="admin/js/editeur.js"></script>
<script type="text/javascript">addEvt(window,\'load\',whizzywig);</script>
    <script>
        $(function(){
            setInterval(function(){
                $(\'#ajax-refresh\').load(\'admin/chat.php\');
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
include('admin/chat.php');

echo'</div>';

echo'</div>
<div id="header">UAG CMS
';

echo'</div><div id="menu"> <div id="draggable"  style="margin-bottom:10px;"><a href="index.php" title="Blog(s)"><img src="admin/images/home.png">Blog(s)</a></div>';

if (base64_decode($tableau[9])=='off') {}

else { echo'<div id="draggable2" style="margin-bottom:10px;"><a href="/admin" title="'.Administration.'"><img src="admin/images/configure.png">'.Administration.'</a></div>';}

echo'<div id="draggable3" style="margin-bottom:10px;"><a href="index.php?page=LLDGP1" title="LLDGP1"><img src="admin/images/info.png">LLDGP1</a></div>';

if (base64_decode($tableau[22])=='') {}

else if (base64_decode($tableau[23])=='') {}

else {
echo'<div id="draggable4" style="margin-bottom:10px;">
<a href="index.php?page=lien1" title="'.base64_decode($tableau[22]).'"><img src="admin/images/liens.png">'.base64_decode($tableau[22]).'</a></div>';}

if (base64_decode($tableau[24])=='') {}

else if (base64_decode($tableau[25])=='') {}

else {
echo'<div id="draggable5" style="margin-bottom:10px;">
<a href="index.php?page=lien2" title="'.base64_decode($tableau[24]).'"><img src="admin/images/liens.png">'.base64_decode($tableau[24]).'</a></div>';}

echo'

<div id="draggable6" style="margin-bottom:10px;"><a href="index.php?page=RSS" title="RSS"><img src="admin/images/rss.png">RSS</a></div>

<div id="draggable7" style="margin-bottom:10px;"><a href="index.php?page=UAG" title="UAG"><img src="admin/images/pays.png">UAG</a></div>

</div><div id="contenu2">';

/* Les différentes Pages de l'administration */

echo'<div id="dialog-modal" title="';

switch ($_GET['page'])
{

case 'LLDGP1': echo LLDGP1;  break;

case 'RSS': echo RSS;  break;

case 'UAG': echo UAG;  break;

case 'lien1': echo''.base64_decode($tableau[22]).'';  break;

case 'lien2': echo''.base64_decode($tableau[24]).'';  break;

default : echo 'Blog(s)';

} 

echo'">';

switch ($_GET['page'])
{

case 'LLDGP1': LLDGP1(); break;

case 'lien1': lien1();  break;

case 'lien2': lien2();  break;

case 'RSS': RSS();  break;

case 'UAG': UAG();  break;

default : blog2();

}

echo'</div>';

switch ($_GET['page'])
{

case 'images': break;

case 'configuration': break;

default : include('admin/includes/bas.php');
}

?>
