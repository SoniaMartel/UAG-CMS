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
require 'admin/fonctions.php'; 

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

if (filesize($fichier) > 0) {

 unlink('install.php'); 

} 

else { header('Location: install.php'); } 

ob_start('ob_gzhandler'); register_shutdown_function('ob_end_flush');

$allnews = unserialize(base64_decode(file_get_contents('news.php')));

$nb_messagetotal = count($allnews);

$nbPages = ceil($nb_messagetotal / 1);

if(isset($_GET['page']) && (intval($_GET['page']) <= $nbPages)) {

$page = intval($_GET['page']) - 1; }

$liste_news = array_slice($allnews, $page, 1); 

include('lang/'.base64_decode($tableau[1]).'-lang.php');

echo'<!DOCTYPE html><!-- Systeme de Pagination Par Qwerty : http://etudiant-libre.fr.nf/ --> <html lang="'.base64_decode($tableau[1]).'"><head>';

switch ($_GET['module'])
{

case 'articles': tarticles(); break;

case 'erreurs': terreurs(); break;

default : tprofil();
}

echo'
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="Generator" content="UAG CMS" />
<link rel="alternate" type="application/rss+xml" title="flux rss" href="rss.php" />
<link rel="stylesheet" type="text/css" href="'.base64_decode($tableau[5]).'/style.css" />';

$connect3 = TRUE;                              
$ip_internet3 = 'www.googleapis.com';          
$port_internet3 = 80; 

if (! $sock3 = @fsockopen($ip_internet3, $port_internet3, $num3, $error3, 5)) { echo '';}

else { 

echo'<link href="http://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css" />';

};

if (base64_decode($tableau[31])=='') {
echo'<link rel="shortcut icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />'
;}
else {
echo'<link rel="shortcut icon" type="image/x-icon" href="'.base64_decode($tableau[31]).'" sizes="16x16" />
<link rel="icon" type="image/x-icon" href="'.base64_decode($tableau[31]).'" sizes="16x16" />'
;}



echo'</head>';

echo'<body class="home blog"><div id="wrapper"><header id="header">';

if (base64_decode($tableau[26])=='') {echo '<h1 id="site-title">'.base64_decode($tableau[0]).'</h1>';}
else if (base64_decode($tableau[27])=='') {echo '<h1 id="site-title"><img src="'.base64_decode($tableau[26]).'" alt="'.base64_decode($tableau[0]).'"></h1>';}
else {echo '<h1 id="site-title"><img src="'.base64_decode($tableau[26]).'" alt="'.base64_decode($tableau[27]).'"></h1>';}

echo'</header><div id="content"><article style="min-height:270px !important;">

<style type="text/css">
article{
min-height:0px !important;
};
</style>';

switch ($_GET['module'])
{

case 'articles': articles(); disqus(); break;

case 'erreurs': erreurs(); break;

default : profil();
}

echo'</article>';

echo'<div id="piedpage">';

if (base64_decode($tableau[4])=='on') {krsort($allnews);}
else if (base64_decode($tableau[4])=='off') {};

foreach($allnews as $i => $news) { 

$i2 = $i + 1 ;

echo '<div class="older-posts"><a href="'.base64_decode($tableau[5]).'/index2.php?module=articles&page=' . $i2 . '">' . $i2 . '</a></div></div>';

}

echo'<header id="header">

<h1></h1>';

echo'</header>';

echo'</div></div></div>';

echo'</body></html>';
 
?>