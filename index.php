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

$filename = 'admin/configuration.txt';

if (filesize($filename) > 0) {

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

echo'<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="Generator" content="UAG CMS" />
<meta property="og:image" content="'.base64_decode($tableau[4]).'" />
<link rel="alternate" type="application/rss+xml" title="flux rss" href="rss.php" />
<link rel="stylesheet" type="text/css" href="themes/'.base64_decode($tableau[5]).'/style.css" />';

if (base64_decode($tableau[3])=='') {echo '';}
else {echo'<link rel="shortcut icon" type="image/x-icon" href="'.base64_decode($tableau[3]).'" sizes="16x16" /><link rel="icon" type="image/x-icon" href="'.base64_decode($tableau[3]).'" sizes="16x16" />';};

if (base64_decode($tableau[4])=='') {echo '';}
else {echo'<link rel="apple-touch-icon" href="'.base64_decode($tableau[4]).'" />
<link rel="apple-touch-icon-precomposed" href="'.base64_decode($tableau[4]).'" />';};

echo'</head>
';

echo'<body class="home blog"><div id="wrapper"><header id="header">';

if (base64_decode($tableau[26])=='') {echo '<h1 id="site-title">'.base64_decode($tableau[0]).'</h1>';}
else if (base64_decode($tableau[27])=='') {echo '<h1 id="site-title"><img src="'.base64_decode($tableau[26]).'" alt="'.base64_decode($tableau[0]).'"></h1>';}
else {echo '<h1 id="site-title"><img src="'.base64_decode($tableau[26]).'" alt="'.base64_decode($tableau[27]).'"></h1>';}

echo'</header><div id="content"><article>';

switch ($_GET['module'])
{

case 'articles': articles(); break;

case 'erreurs': erreurs(); break;

default : profil();
}

echo'</article><div id="piedpage">Articles : ';

foreach($allnews as $i => $news) { 

$i2 = $i + 1 ;

$news['titre'] = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i","\\1", $news['titre'] );
$news['titre'] = preg_replace("`\[.*\]`U","",$news['titre']);
$news['titre'] = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$news['titre']);
$news['titre'] = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $news['titre']);
$news['titre'] = ( $news['titre'] == "" ) ? $type : strtolower(trim($news['titre'], '-'));
$news['titre'] = htmlentities($news['titre'], ENT_COMPAT, 'utf8');

if (base64_decode($tableau[8])=='off') {echo '<span class="older-posts">&nbsp;<a href="index.php?module=articles&page=' . $i2 . '">' . $i2 . '</a></span>';}

elseif  (base64_decode($tableau[8])=='on') {echo '<span class="older-posts">&nbsp;<a href="article-' . $i2 . '.php">' . $i2 . '</a></span>';}

elseif  (base64_decode($tableau[8])=='on2') {

echo'<span class="older-posts">&nbsp;<a href="' . $i2 . '-'.$news['titre'].'.php">' . $i2 . '</a></span>';}

else {echo '<span class="older-posts">&nbsp;<a href="index.php?module=articles&page=' . $i2 . '">' . $i2 . '</a></span>';}

}

echo'</div></div></div><nav id="menu"><div class="menu-footer"><ul id="menu-main" class="menu"><li><a href="index.php">'.Accueil.'</a></li>';

if (base64_decode($tableau[9])=='off') {}

elseif  (base64_decode($tableau[9])=='on') {echo'<li><a href="admin/connexion.php">'.Administration.'</a></li>';}

if (base64_decode($tableau[22])=='') {}

else if (base64_decode($tableau[23])=='') {}

else {echo'<li><a href="'.base64_decode($tableau[23]).'">'.base64_decode($tableau[22]).'</a></li>'; }

if (base64_decode($tableau[24])=='') {}

else if (base64_decode($tableau[25])=='') {}

else {echo'<li><a href="'.base64_decode($tableau[25]).'">'.base64_decode($tableau[24]).'</a></li>'; }

echo'</ul></div></nav><footer id="footer"><div style="text-align: center"><p><strong><a rel="license" href="http://julien-et-nel.be/LLDGP1/">LLDGP1</a></strong> | <strong>'.base64_decode($tableau[0]).'</strong> | <strong><a href="http://julien-et-nel.be/UAG/">UAG CMS</a> | Design : ';

include 'themes/'.base64_decode($tableau[5]).'/auteur.php';

echo'</strong></p></div></footer></body></html>';
 
?>