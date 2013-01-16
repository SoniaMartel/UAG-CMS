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

if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo'<title>'.base64_decode($tableau[0]).' - Non-renseigné</title>';}

else {echo'<title>'.base64_decode($tableau[0]).' - '.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'</title>';};	

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

echo'<body class="home blog"><div id="wrapper"><header id="header"><h1 id="site-title">'.base64_decode($tableau[0]).'</h1></header><div id="content"><article>';

echo'<h2>'.Profil.'</h2><div id="article" style="padding-left:10px">

<h1>';
if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo 'Non-renseigné';}

else {echo''.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'';};

if ((base64_decode($tableau[13])=='') && (base64_decode($tableau[14])=='')) {echo '</h1>';}

else {echo' ('.base64_decode($tableau[13]).' ans '.base64_decode($tableau[14]).')</h1>';};

echo'<table>
<tr>
<td><img src="';

if (base64_decode($tableau[15])=='') {echo 'photo.jpg';}

else {echo''.base64_decode($tableau[15]).'';};

echo'" alt="" style="border: 1px solid #DDDDDD;
border-radius: 4px;
display: block;
line-height: 1;
padding: 4px; height:200px;width:200px;
margin-right:10px;"/></td>

<td style="padding:30px;">
<h2 style="color:
font-family: "Helvetica", sans-serif;
font-size: 22px;
font-weight: 700;
line-height: 24px;
margin-bottom: 20px;
">';

if (base64_decode($tableau[19])=='') {echo 'Defaut';}
else {echo''.base64_decode($tableau[19]).'';};

echo'</h2>';

if ((base64_decode($tableau[20])=='') && (base64_decode($tableau[21])=='')) {echo '<p>Loisirs : Cette zone est à remplir </td>';}

else {echo'<p>'.base64_decode($tableau[20]).'</p><p>Loisirs : '.base64_decode($tableau[21]).' </td>';};


echo'<td>
<p><a href="'.base64_decode($tableau[17]).'" style="text-decoration:none;">Facebook</a><br/></p>
<p><a href="'.base64_decode($tableau[18]).'" style="text-decoration:none;">Google+</a><br/></p>
<p><a href="'.base64_decode($tableau[16]).'" style="text-decoration:none;">Twitter</a></p>
</td>
</tr></table>'; 

echo'</article><div id="piedpage">Articles : ';

for ($i = $nbPages; $i > 0; $i--) {

if (isset($_GET['page']) && $i == $_GET['page']){

echo '&nbsp;<span class="older-posts2">'.$i.'</span>';

}

else {

if (base64_decode($tableau[8])=='off') {echo '<span class="older-posts">&nbsp;<a href="article.php?page=' . $i . '">' . $i . '</a></span>';}

elseif  (base64_decode($tableau[8])=='on') {echo '<span class="older-posts">&nbsp;<a href="article-' . $i . '.php">' . $i . '</a></span>';}

}
}

echo'</div></div></div><nav id="menu"><div class="menu-footer"><ul id="menu-main" class="menu"><li><a href="index.php">'.Accueil.'</a></li>';

if (base64_decode($tableau[9])=='off') {}

elseif  (base64_decode($tableau[9])=='on') {echo'<li><a href="admin/connexion.php">'.Administration.'</a></li>';}

echo'</ul></div></nav><footer id="footer"><div style="text-align: center"><p><strong><a rel="license" href="http://julien-et-nel.be/LLDGP1/">LLDGP1</a></strong> | <strong>'.base64_decode($tableau[0]).'</strong> | <strong><a href="http://julien-et-nel.be/UAG/">UAG CMS</a> | Design : ';

include 'themes/'.base64_decode($tableau[5]).'/auteur.php';

echo'</strong></p></div></footer></body></html>';
 
?>