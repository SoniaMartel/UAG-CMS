<?php 
/******************************************************

# *** LICENCE ***
# Ce fichier fait partie de UAG CMS
# http://julien-et-nel.be/UAG/
#
# 2012 Jonathan Julien Soulignac <julien-soulignac@live.fr>
#
# UAG CMS est un script libre, vous pouvez le redistribuer sous les termes de la 
# License Libre de Diffusion Gratuite Paternit&eacute; V1 : http://julien-et-nel.be/LLDGP1/ .
#
# En outre, tous les distributeurs de versions non officielles DOIT avertir 
# l'utilisateur final de celui-ci, par tout moyen visible avant le t&eacute;l&eacute;chargement.
# *** LICENCE ***

******************************************************/

/* BLOG */

/* erreurs */

function terreurs()   {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

echo'<title>'.base64_decode($tableau[0]).' - 404</title>';

}

function erreurs()   {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

echo'<h2 style="color:'.base64_decode($tableau[5]).' !important">404</h2><center><img src="404.gif" alt="404" width="180px"></center><div id="article" style="padding-left:10px"><br/><h1 style="color:'.base64_decode($tableau[5]).' !important">La r&eacute;ponse à la page disparue, d&eacute;truite, d&eacute;plac&eacute;e ou autre.</h1>';

}

/* Articles */

function tarticles()  {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

ob_start('ob_gzhandler'); register_shutdown_function('ob_end_flush');

$allnews = unserialize(base64_decode(file_get_contents('news.php')));

$nb_messagetotal = count($allnews);

$nbPages = ceil($nb_messagetotal / 1);

if(isset($_GET['page']) && (intval($_GET['page']) <= $nbPages)) {

$page = intval($_GET['page']) - 1; }

$liste_news = array_slice($allnews, $page, 1); 

if(!empty($liste_news)) { foreach($liste_news as $id => $news) {

echo'<title>'.base64_decode($tableau[0]).' - '.$news['titre'].'</title><meta name="Description" content="'.$news['chapo'].'">';	} }

else { echo'<title>'.base64_decode($tableau[0]).' - '.Informations.'</title><meta name="Description" content="'.PasdeNews.'">'; };

}

function articles()  {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

ob_start('ob_gzhandler'); register_shutdown_function('ob_end_flush');

$allnews = unserialize(base64_decode(file_get_contents('news.php')));

$nb_messagetotal = count($allnews);

$nbPages = ceil($nb_messagetotal / 1);

if(isset($_GET['page']) && (intval($_GET['page']) <= $nbPages)) {

$page = intval($_GET['page']) - 1; }

$liste_news = array_slice($allnews, $page, 1); 


if(!empty($liste_news)) { foreach($liste_news as $id => $news) {

echo'<h2 style="color:'.base64_decode($tableau[5]).' !important"><a href="" style="color:'.base64_decode($tableau[5]).' !important"><strong>'.$news['titre'].' '.Par.' '.base64_decode($tableau[2]).' - ';

if (base64_decode($tableau[1])=='fr') { 

if (base64_decode($tableau[10])=='on') { 

echo ''.$news['jour'].' ';

if     ($news['mois']=='01') {echo Janvier ;}
elseif ($news['mois']=='02') {echo Fevrier ;}
elseif ($news['mois']=='03') {echo Mars ;}
elseif ($news['mois']=='04') {echo Avril ;}
elseif ($news['mois']=='05') {echo Mai ;}
elseif ($news['mois']=='06') {echo Juin ;}
elseif ($news['mois']=='07') {echo Juillet ;}
elseif ($news['mois']=='08') {echo Aout ;}
elseif ($news['mois']=='09') {echo Septembre ;}
elseif ($news['mois']=='10') {echo Octobre ;}
elseif ($news['mois']=='11') {echo Novembre ;}
elseif ($news['mois']=='12') {echo Decembre ;}

echo ' '.$news['annee'].' ';

 }

elseif (base64_decode($tableau[10])=='off') { echo' '.$news['jour'].'-'.$news['mois'].'-'.$news['annee'].' '; } }

else { 

if (base64_decode($tableau[10])=='on') { 

echo ''.$news['annee'].' ';

if     ($news['mois']=='01') {echo Janvier ;}
elseif ($news['mois']=='02') {echo Fevrier ;}
elseif ($news['mois']=='03') {echo Mars ;}
elseif ($news['mois']=='04') {echo Avril ;}
elseif ($news['mois']=='05') {echo Mai ;}
elseif ($news['mois']=='06') {echo Juin ;}
elseif ($news['mois']=='07') {echo Juillet ;}
elseif ($news['mois']=='08') {echo Aout ;}
elseif ($news['mois']=='09') {echo Septembre ;}
elseif ($news['mois']=='10') {echo Octobre ;}
elseif ($news['mois']=='11') {echo Novembre ;}
elseif ($news['mois']=='12') {echo Decembre ;}

echo ' '.$news['jour'].' ';

 }

elseif (base64_decode($tableau[10])=='off') { echo' '.$news['annee'].'-'.$news['mois'].'-'.$news['jour'].' '; } }

echo'</strong></a></h2><div id="article" style="padding-left:10px">'.$news['contenu'].'</div>';		

}
}

else { header('Location: erreur.php'); }

echo'</article><article style="min-height:0px;font-weight:bold;text-align:center;">Note :';

if ($news['note']=='0') {

echo'
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
';
}

elseif ($news['note']=='1') {

echo'
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
';
}

elseif ($news['note']=='2') {

echo'
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
';
}

elseif ($news['note']=='3') {

echo'
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile0.png" alt="0">
<img src="/admin/images/etoile0.png" alt="0">
';
}

elseif ($news['note']=='4') {

echo'
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile0.png" alt="0">
';
}

elseif ($news['note']=='5') {

echo'
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
<img src="/admin/images/etoile1.png" alt="1">
';
}

elseif ($news['note']=='Off') {

echo'
Désactivée
';
}

else {

echo'
Désactivée
';
}

if (base64_decode($tableau[3])=='') {echo'</article><article style="min-height:0px;font-weight:bold;text-align:center;">Les commentaires ne sont pas activés.';}

else {

echo'</article><article><div id="disqus_thread"></div>
<script type="text/javascript">
var disqus_shortname = \''.base64_decode($tableau[3]).'\'; // required: replace example with your forum shortname
(function() {
var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
dsq.src = \'http://\' + disqus_shortname + \'.disqus.com/embed.js\';
(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
})();
 </script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
';

}
}

/* Profil */

function tprofil()  {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo'<title>'.base64_decode($tableau[0]).' - Non-renseign&eacute;</title>';}

else {echo'<title>'.base64_decode($tableau[0]).' - '.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'</title>';};	

}

function profil()  {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

echo'<h2 style="color:'.base64_decode($tableau[5]).' !important">'.Profil.'</h2><div id="article" style="padding-left:10px">

<h1 style="color:'.base64_decode($tableau[5]).' !important">';
if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo 'Non-renseign&eacute;';}

else {echo''.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'';};

if ((base64_decode($tableau[13])=='') && (base64_decode($tableau[14])=='')) {echo '</h1>';}

else {echo' ( '.base64_decode($tableau[13]).' ans '.base64_decode($tableau[14]).' <img src="admin/images/pays/'.base64_decode($tableau[14]).'.png" alt-"'.base64_decode($tableau[14]).'" style="border: black 1px solid;"> )</h1>';};

echo'<table>
<tr>
<td><img src="';

if (base64_decode($tableau[15])=='') {echo 'photo.png';}

else {echo''.base64_decode($tableau[15]).'';};

echo'" alt="" style="border: solid #DDDDDD; background:'.base64_decode($tableau[5]).' !important;
border-radius: 4px;
display: block;
height:200px;width:200px;
margin-right:10px;"/></td>

<td style="padding:30px;">
<h2 style="color:'.base64_decode($tableau[5]).' !important;
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

else {echo'<p>'.base64_decode($tableau[20]).'</p><p><b>Loisirs  :</b> '.base64_decode($tableau[21]).'</p></td>';};


echo'<td>';

if (base64_decode($tableau[17])=='') {echo '';}
else { echo'<p><a href="https://fr-fr.facebook.com/'.base64_decode($tableau[17]).'" style="text-decoration:none; color:'.base64_decode($tableau[5]).' !important;">Facebook</a><br/></p>'; };

if (base64_decode($tableau[18])=='') {echo '';}
else { echo'<p><a href="https://plus.google.com/'.base64_decode($tableau[18]).'" style="text-decoration:none; color:'.base64_decode($tableau[5]).' !important;">Google+</a><br/></p>'; };

if (base64_decode($tableau[16])=='') {echo '';}
else { echo'<p><a href="https://twitter.com/'.base64_decode($tableau[16]).'" style="text-decoration:none; color:'.base64_decode($tableau[5]).' !important;">Twitter</a></p>'; };

echo'</td></tr></table>'; 

}

/* ADMINISTRATION */

/* Index de l'administration */

function accueil() {

$connect = TRUE;                              
$ip_internet = 'www.julien-et-nel.be';          
$port_internet = 80; 

if (! $sock = @fsockopen($ip_internet, $port_internet, $num, $error, 5)) { echo ' <div id="erreur"><p>LE SITE DU DEVELLOPEUR EST HORS LIGNE</p></div>'; }

else { 

$file2 = 'http://julien-et-nel.be/UAG/mots.txt';
$file_headers2 = @get_headers($file2);

if($file_headers2[0] == 'HTTP/1.1 503 Service Unavailable') { 

echo'<div id="erreur"><p>Le site du développeur est temporairement indisponible ou en maintenance.</p></div>';

}

elseif($file_headers2[0] == 'HTTP/1.1 502 Not Implemented') { 

echo'<div id="erreur"><p>Le site du développeur est temporairement indisponible ou en maintenance.</p></div>';

}

else {

echo'<div id="info"><p>'.Mots.' : ';

echo htmlspecialchars(file_get_contents($file2));

echo'</p></div>';

}

$file = 'http://julien-et-nel.be/UAG/UAG-1-96.txt';
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {

echo'<div id="erreur"><a href="http://julien-et-nel.be/UAG/" style="color:black;"><p>'.MauvaiseVersion.'</p></a></div>';
 }
else {

if($file_headers[0] == 'HTTP/1.1 503 Service Unavailable') { }
elseif($file_headers[0] == 'HTTP/1.1 502 Not Implemented') { } 
else {echo'<div id="valide"><p>'.BonneVersion.'</p></div>';}
} fclose($sock); }

echo'<div id="pays"><p>'.Pays.'</p></div>';

}

/* Configuration du blog */ 

function configuration() {

$fichier='configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

if ($_GET['id']=='2') {  

echo'<meta http-equiv="refresh" content="1; URL=index.php?page=configuration">
<p style="color:green">Modification effectu&eacute;e ! Redirection en cours ... </p>';
 
// Fichier de transition pour &eacute;cup&eacute;rer les donn&eacute;es du formulaire

 	 $f=fopen($fichier,"w");fclose($f); // on efface le fichier, on le cr&eacute;e à nouveau (vide)

$salt = 'BwGk15l8WX'; 

$_POST[0] = str_replace(array('-','php'),array(':)',''), $_POST[0]);	
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[0],null,'UTF-8'))))));
$_POST[1] = str_replace(array('-','php'),array(':)',''), $_POST[1]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[1],null,'UTF-8'))))));
$_POST[2] = str_replace(array('-','php'),array(':)',''), $_POST[2]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[2],null,'UTF-8'))))));
$_POST[3] = str_replace(array('-','php'),array(':)',''), $_POST[3]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[3],null,'UTF-8'))))));
$_POST[4] = str_replace(array('-','php'),array(':)',''), $_POST[4]);		 
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[4],null,'UTF-8'))))));
$_POST[5] = str_replace(array('-','php'),array(':)',''), $_POST[5]);		 
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[5],null,'UTF-8'))))));
$_POST[6] = str_replace(array('-','php'),array(':)',''), $_POST[6]);			 
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[6],null,'UTF-8')))))); 
$_POST[7] = str_replace(array('-','php'),array(':)',''), $_POST[7]);		 
ajout($fichier,trim(base64_encode(stripslashes((sha1($_POST[7].$salt))))));
$_POST[8] = str_replace(array('-','php'),array(':)',''), $_POST[8]);			 
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[8],null,'UTF-8')))))); 
$_POST[9] = str_replace(array('-','php'),array(':)',''), $_POST[9]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[9],null,'UTF-8')))))); 
$_POST[10] = str_replace(array('-','php'),array(':)',''), $_POST[10]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[10],null,'UTF-8')))))); 
$_POST[11] = str_replace(array('-','php'),array(':)',''), $_POST[11]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[11],null,'UTF-8')))))); 
$_POST[12] = str_replace(array('-','php'),array(':)',''), $_POST[12]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[12],null,'UTF-8')))))); 
$_POST[13] = str_replace(array('-','php'),array(':)',''), $_POST[13]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[13],null,'UTF-8')))))); 
$_POST[14] = str_replace(array('-','php'),array(':)',''), $_POST[14]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[14],null,'UTF-8')))))); 
$_POST[15] = str_replace(array('-','php'),array(':)',''), $_POST[15]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[15],null,'UTF-8')))))); 
$_POST[16] = str_replace(array('-','php'),array(':)',''), $_POST[16]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[16],null,'UTF-8')))))); 
$_POST[17] = str_replace(array('-','php'),array(':)',''), $_POST[17]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[17],null,'UTF-8')))))); 
$_POST[18] = str_replace(array('-','php'),array(':)',''), $_POST[18]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[18],null,'UTF-8')))))); 
$_POST[19] = str_replace(array('-','php'),array(':)',''), $_POST[19]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[19],null,'UTF-8')))))); 
$_POST[20] = str_replace(array('-','php'),array(':)',''), $_POST[20]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[20],null,'UTF-8')))))); 
$_POST[21] = str_replace(array('-','php'),array(':)',''), $_POST[21]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[21],null,'UTF-8')))))); 
$_POST[22] = str_replace(array('-','php'),array(':)',''), $_POST[22]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[22],null,'UTF-8')))))); 
$_POST[23] = str_replace(array('-','php'),array(':)',''), $_POST[23]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[23],null,'UTF-8')))))); 
$_POST[24] = str_replace(array('-','php'),array(':)',''), $_POST[24]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[24],null,'UTF-8')))))); 
$_POST[25] = str_replace(array('-','php'),array(':)',''), $_POST[25]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[25],null,'UTF-8'))))));
$_POST[26] = str_replace(array('-','php'),array(':)',''), $_POST[26]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[26],null,'UTF-8')))))); 
$_POST[27] = str_replace(array('-','php'),array(':)',''), $_POST[27]);
ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[27],null,'UTF-8'))))));
}

else {

echo '<form action="index.php?page=configuration&id=2" method="post">';
echo '<table>';
echo '<tr>
<td COLSPAN=2><center><b>Configuration</b></center></td>
<td COLSPAN=2><center><b>Profil</b></center></td>
</tr><tr>
<td class="titre"></br>'.Titre.'  &nbsp;</td><td></br><input type="text" name="0" value="'.base64_decode($tableau[0]).'" placeholder="Titre de votre blog" STYLE="width:170px;" /></td>
<td class="profil"></br>'.Nom.'  &nbsp;</td><td></br><input type="text" name="11" value="'.base64_decode($tableau[11]).'" placeholder="Votre nom" STYLE="width:170px;" /></td>
</tr><tr>';

if (base64_decode($tableau[4])==on) {$paginationOn = 'selected="selected"';}
elseif (base64_decode($tableau[4])==off) {$paginationOff = 'selected="selected"';}
else {$paginationOn = 'selected="selected"';}

if (base64_decode($tableau[1])==en) {$selected3 = 'selected="selected"';}
elseif (base64_decode($tableau[1])==es) {$selected4 = 'selected="selected"';}
elseif (base64_decode($tableau[1])==fr) {$selected5 = 'selected="selected"';}
elseif (base64_decode($tableau[1])==nl) {$selected6 = 'selected="selected"';}
else {$selected5 = 'selected="selected"';}

if (base64_decode($tableau[13])=='*') {$age0b = 'selected="selected"';}
elseif (base64_decode($tableau[13])==0) {$age0 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==1) {$age1 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==2) {$age2 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==3) {$age3 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==4) {$age4 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==5) {$age5 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==6) {$age6 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==7) {$age7 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==8) {$age8 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==9) {$age9 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==10) {$age10 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==11) {$age11 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==12) {$age12 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==13) {$age13 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==14) {$age14 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==15) {$age15 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==16) {$age16 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==17) {$age17 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==18) {$age18 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==19) {$age19 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==20) {$age20 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==21) {$age21 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==22) {$age22 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==23) {$age23 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==24) {$age24 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==25) {$age25 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==26) {$age26 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==27) {$age27 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==28) {$age28 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==29) {$age29 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==30) {$age30 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==31) {$age31 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==32) {$age32 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==33) {$age33 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==34) {$age34 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==35) {$age35 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==36) {$age36 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==37) {$age37 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==38) {$age38 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==39) {$age39 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==40) {$age40 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==41) {$age41 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==42) {$age42 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==43) {$age43 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==44) {$age44 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==45) {$age45 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==46) {$age46 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==47) {$age47 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==48) {$age48 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==49) {$age49 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==50) {$age50 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==51) {$age51 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==52) {$age52 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==53) {$age53 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==54) {$age54 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==55) {$age55 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==56) {$age56 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==57) {$age57 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==58) {$age58 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==59) {$age59 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==60) {$age60 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==61) {$age61 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==62) {$age62 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==63) {$age63 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==64) {$age64 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==65) {$age65 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==66) {$age66 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==67) {$age67 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==68) {$age68 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==69) {$age69 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==70) {$age70 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==71) {$age71 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==72) {$age72 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==73) {$age73 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==74) {$age74 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==75) {$age75 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==76) {$age76 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==77) {$age77 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==78) {$age78 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==79) {$age79 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==80) {$age80 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==81) {$age81 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==82) {$age82 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==83) {$age83 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==84) {$age84 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==85) {$age85 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==86) {$age86 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==87) {$age87 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==88) {$age88 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==89) {$age89 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==90) {$age90 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==91) {$age91 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==92) {$age92 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==93) {$age93 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==94) {$age94 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==95) {$age95 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==96) {$age96 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==97) {$age97 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==98) {$age98 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==99) {$age99 = 'selected="selected"';}
elseif (base64_decode($tableau[13])==100) {$age100 = 'selected="selected"';}
else {$age0b = 'selected="selected"';}

if (base64_decode($tableau[14])=='Monde') {$pays1 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Internet') {$pays2 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Afghanistan') {$pays3 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Afrique du Sud') {$pays4 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Albanie') {$pays5 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Alg&eacute;rie') {$pays6 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Allemagne') {$pays7 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Andorre') {$pays8 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Angola') {$pays9 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Antigua et Barbuda') {$pays10 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Arabie Saoudite') {$pays11 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Argentine') {$pays12 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Arm&eacute;nie') {$pays13 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Australie') {$pays14 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Autriche') {$pays15 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Azerba&iuml;djan') {$pays16 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bahamas') {$pays17 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bahre&iuml;n') {$pays18 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bangladesh') {$pays19 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Barbade') {$pays20 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Belgique') {$pays21 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='B&eacute;lize') {$pays22 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='B&eacute;nin') {$pays23 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bhoutan') {$pays24 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bi&eacute;lorussie') {$pays25 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Birmanie') {$pays26 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bolivie') {$pays27 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bosnie Herz&eacute;govine') {$pays28 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Botswana') {$pays29 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Br&eacute;sil') {$pays30 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Brunei') {$pays31 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Bulgarie') {$pays32 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Burkina Faso') {$pays33 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Burundi') {$pays34 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Cambodge') {$pays35 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Cameroun') {$pays36 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Canada') {$pays37 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Cap Vert') {$pays38 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Centrafrique') {$pays39 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Chili') {$pays40 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Chine') {$pays41 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Chypre') {$pays42 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Colombie') {$pays43 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Comores') {$pays44 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Congo Kinshasa') {$pays45 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Congo Brazzaville') {$pays46 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Cor&eacute;e du Nord') {$pays47 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Cor&eacute;e du Sud') {$pays48 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Costa Rica') {$pays49 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='C&ocirc;te d\'Ivoire') {$pays50 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Croatie') {$pays51 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Cuba') {$pays52 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Danemark') {$pays53 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Djibouti') {$pays54 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='R&eacute;publique dominicaine') {$pays55 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Dominique') {$pays56 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='&eacute;gypte') {$pays57 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='&eacute;mirats arabes unis') {$pays58 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='&eacute;quateur') {$pays59 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='&eacute;rythr&eacute;e') {$pays60 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Espagne') {$pays61 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Estonie') {$pays62 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='&eacute;tats Unis') {$pays63 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='&eacute;thiopie') {$pays64 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Fidji') {$pays65 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Finlande') {$pays66 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='France') {$pays67 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Gabon') {$pays68 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Gambie') {$pays69 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='G&eacute;orgie') {$pays70 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Ghana') {$pays71 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Gr&egrave;ce') {$pays72 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Grenade') {$pays73 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Guatemala') {$pays74 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Guin&eacute;e') {$pays75 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Guin&eacute;e Bissau') {$pays76 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Guin&eacute;e &eacute;quatoriale') {$pays77 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Guyana') {$pays78 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Ha&iuml;ti') {$pays79 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Honduras') {$pays80 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Hongrie') {$pays81 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Inde') {$pays82 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Indon&eacute;sie') {$pays83 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Irak') {$pays84 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Iran') {$pays85 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Irlande') {$pays86 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Islande') {$pays87 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Isra&euml;l') {$pays88 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Italie') {$pays89 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Jama&iuml;que') {$pays90 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Japon') {$pays91 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Jordanie') {$pays92 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Kazakhstan') {$pays93 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Kenya') {$pays94 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Kirghizistan') {$pays95 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Kiribati') {$pays96 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Kowe&iuml;t') {$pays97 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Laos') {$pays98 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Lesotho') {$pays99 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Lettonie') {$age100 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Liban') {$pays101 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Liberia') {$pays102 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Libye') {$pays103 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Liechtenstein') {$pays104 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Lituanie') {$pays105 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Luxembourg') {$pays106 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Mac&eacute;doine') {$pays107 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Madagascar') {$pays108 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Malaisie') {$pays109 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Malawi') {$pays110 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Maldives') {$pays111 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Mali') {$pays112 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Malte') {$pays113 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Maroc') {$pays114 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Marshall') {$pays115 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Maurice') {$pays116 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Mauritanie') {$pays117 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Mexique') {$pays118 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Micron&eacute;sie') {$pays119 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Moldavie') {$pays120 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Monaco') {$pays121 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Mongolie') {$pays122 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Mont&eacute;n&eacute;gro') {$pays123 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Mozambique') {$pays124 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Namibie') {$pays125 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Nauru') {$pays126 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='N&eacute;pal') {$pays127 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Nicaragua') {$pays128 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Niger') {$pays129 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Nigeria') {$pays130 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Norv&egrave;ge') {$pays131 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Nouvelle Z&eacute;lande') {$pays132 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Oman') {$pays133 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Ouganda') {$pays134 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Ouzb&eacute;kistan') {$pays135 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Pakistan') {$pays136 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Palau') {$pays137 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Palestine') {$pays138 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Panama') {$pays139 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Papouasie Nouvelle Guin&eacute;e') {$pays140 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Paraguay') {$pays141 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Pays Bas') {$pays142 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='P&eacute;rou') {$pays143 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Philippines') {$pays144 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Pologne') {$pays145 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Portugal') {$pays146 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Qatar') {$pays147 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Roumanie') {$pays148 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Royaume Uni') {$pays149 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Russie') {$pays150 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Rwanda') {$pays151 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Saint Kitts et Nevis') {$pays152 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Sainte Lucie') {$pays153 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Saint Marin') {$pays154 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Saint Vincent et les Grenadines') {$pays155 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Salomon') {$pays156 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Salvador') {$pays157 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Samoa') {$pays158 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Sao Tom&eacute; et Principe') {$pays159 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='S&eacute;n&eacute;gal') {$pays160 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Serbie') {$pays161 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Seychelles') {$pays162 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Sierra Leone') {$pays163 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Singapour') {$pays164 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Slovaquie') {$pays165 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Slov&eacute;nie') {$pays166 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Somalie') {$pays167 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Soudan') {$pays168 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Soudan du Sud') {$pays169 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Sri Lanka') {$pays170 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Su&egrave;de') {$pays171 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Suisse') {$pays172 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Suriname') {$pays173 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Swaziland') {$pays174 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Syrie') {$pays175 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Tadjikistan') {$pays176 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Tanzanie') {$pays177 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Tchad') {$pays178 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='R&eacute;publique tch&egrave;que') {$pays179 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Tha&iuml;lande') {$pays180 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Timor Leste') {$pays181 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Togo') {$pays182 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Tonga') {$pays183 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Trinit&eacute; et Tobago') {$pays184 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Tunisie') {$pays185 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Turkm&eacute;nistan') {$pays186 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Turquie') {$pays187 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Tuvalu') {$pays188 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Ukraine') {$pays189 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Uruguay') {$pays190 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Vanuatu') {$pays191 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Vatican') {$pays192 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Venezuela') {$pays193 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Vietnam') {$pays194 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Y&eacute;men') {$pays195 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Zambie') {$pays196 = 'selected="selected"';}
elseif (base64_decode($tableau[14])=='Zimbabwe') {$pays197 = 'selected="selected"';}
else {$pays1 = 'selected="selected"';}

echo '<td class="titre"></br>'.Langue.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[1]).'" name="1" STYLE="width:180px;">';

$languages = array(

'en' => $selected3, 
'es' => $selected4,
'fr' => $selected5,
'nl' => $selected6 

);

foreach ($languages as $languages1 => $languages2) { 
echo'<option '.$languages2.'>'.$languages1.'</option>';
 };

echo'</SELECT></td>

<td class="profil"></br>'.Prenom.'  &nbsp;</td><td></br><input type="text" name="12" value="'.base64_decode($tableau[12]).'" placeholder="Votre prenom" STYLE="width:170px;" /></td>

</tr><tr>

<td class="titre"></br>'.Gerant.'  &nbsp;</td><td></br><input type="text" required name="2" value="'.base64_decode($tableau[2]).'" placeholder="Nom affich&eacute; sur le blog" STYLE="width:170px;"/></td>
<td class="profil"></br>'.Age.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[13]).'" name="13" STYLE="width:180px;">';

$old = array(

'*' => $age0b, 
'0' => $age0,
'1' => $age1,
'2' => $age2,
'3' => $age3,
'4' => $age4,
'5' => $age5,
'6' => $age6,
'7' => $age7,
'8' => $age8,
'9' => $age9,
'10' => $age10,
'11' => $age11,
'12' => $age12,
'13' => $age13,
'14' => $age14,
'15' => $age15,
'16' => $age16,
'17' => $age17,
'18' => $age18,
'19' => $age19,
'20' => $age20,
'21' => $age21,
'22' => $age22,
'23' => $age23,
'24' => $age24,
'25' => $age25,
'26' => $age26,
'27' => $age27,
'28' => $age28,
'29' => $age29,
'30' => $age30,
'31' => $age31,
'32' => $age32,
'33' => $age33,
'34' => $age34,
'35' => $age35,
'36' => $age36,
'37' => $age37,
'38' => $age38,
'39' => $age39,
'40' => $age40,
'41' => $age41,
'42' => $age42,
'43' => $age43,
'44' => $age44,
'45' => $age45,
'46' => $age46,
'47' => $age47,
'48' => $age48,
'49' => $age49,
'50' => $age50,
'51' => $age51,
'52' => $age52,
'53' => $age53,
'54' => $age54,
'55' => $age55,
'56' => $age56,
'57' => $age57,
'58' => $age58,
'59' => $age59,
'60' => $age60,
'61' => $age61,
'62' => $age62,
'63' => $age63,
'64' => $age64,
'65' => $age65,
'66' => $age66,
'67' => $age67,
'68' => $age68,
'69' => $age69,
'70' => $age70,
'71' => $age71,
'72' => $age72,
'73' => $age73,
'74' => $age74,
'75' => $age75,
'76' => $age76,
'77' => $age77,
'78' => $age78,
'79' => $age79,
'80' => $age80,
'81' => $age81,
'82' => $age82,
'83' => $age83,
'84' => $age84,
'85' => $age85,
'86' => $age86,
'87' => $age87,
'88' => $age88,
'89' => $age89,
'90' => $age90,
'91' => $age91,
'92' => $age92,
'93' => $age93,
'94' => $age94,
'95' => $age95,
'96' => $age96,
'97' => $age97,
'98' => $age98,
'99' => $age99,
'100' => $age100
);  

foreach ($old as $old1 => $old2) { 
echo'<option '.$old2.'>'.$old1.'</option>';
 } 

echo'
</td>
</tr><tr>
<td class="titre"></br>Disqus  &nbsp;</td><td></br><input type="text" name="3" value="'.base64_decode($tableau[3]).'" placeholder="ID DISQUS" STYLE="width:170px;"/></td>
<td class="profil"></br>Pays  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[14]).'" name="14" STYLE="width:180px;">';

$world = array(

'Monde' => $pays1, 
'Internet' => $pays2,
'Afghanistan' => $pays3,
'Afrique du Sud' => $pays4,
'Albanie' => $pays5,
'Alg&eacute;rie' => $pays6,
'Allemagne' => $pays7,
'Andorre' => $pays8,
'Angola' => $pays9,
'Antigua et Barbuda' => $pays10,
'Arabie Saoudite' => $pays11, 
'Argentine' => $pays12,
'Arm&eacute;nie' => $pays13,
'Australie' => $pays14,
'Autriche' => $pays15,
'Azerba&iuml;djan' => $pays16,
'Bahamas' => $pays17,
'Bahre&iuml;n' => $pays18,
'Bangladesh' => $pays19,
'Barbade' => $pays20,
'Belgique' => $pays21, 
'B&eacute;lize' => $pays22,
'B&eacute;nin' => $pays23,
'Bhoutan' => $pays24,
'Bi&eacute;lorussie' => $pays25,
'Birmanie' => $pays26,
'Bolivie' => $pays27,
'Bosnie Herz&eacute;govine' => $pays28,
'Botswana' => $pays29,
'Br&eacute;sil' => $pays30,
'Brunei' => $pays31, 
'Bulgarie' => $pays32,
'Burkina Faso' => $pays33,
'Burundi' => $pays34,
'Cambodge' => $pays35,
'Cameroun' => $pays36,
'Canada' => $pays37,
'Cap-Vert' => $pays38,
'Centrafrique' => $pays39,
'Chili' => $pays40,
'Chine' => $pays41, 
'Chypre' => $pays42,
'Colombie' => $pays43,
'Comores' => $pays44,
'Congo Kinshasa' => $pays45,
'Congo Brazzaville' => $pays46,
'Cor&eacute;e du Nord' => $pays47,
'Cor&eacute;e du Sud' => $pays48,
'Costa Rica' => $pays49,
'C&ocirc;te d\'Ivoire' => $pays50,
'Croatie' => $pays51,
'Cuba' => $pays52,
'Danemark' => $pays53,
'Djibouti' => $pays54,
'R&eacute;publique dominicaine' => $pays55,
'Dominique' => $pays56,
'&eacute;gypte' => $pays57,
'&eacute;mirats arabes unis' => $pays58,
'&eacute;quateur' => $pays59,
'&eacute;rythr&eacute;e' => $pays60,
'Espagne' => $pays61,
'Estonie' => $pays62,
'&eacute;tats Unis' => $pays63,
'&eacute;thiopie' => $pays64,
'Fidji' => $pays65,
'Finlande' => $pays66,
'France' => $pays67,
'Gabon' => $pays68,
'Gambie' => $pays69,
'G&eacute;orgie' => $pays70,
'Ghana' => $pays71,
'Gr&egrave;ce' => $pays72,
'Grenade' => $pays73,
'Guatemala' => $pays74,
'Guin&eacute;e' => $pays75,
'Guin&eacute;e Bissau' => $pays76,
'Guin&eacute;e &eacute;quatoriale' => $pays77,
'Guyana' => $pays78,
'Ha&iuml;ti' => $pays79,
'Honduras' => $pays80,
'Hongrie' => $pays81,
'Inde' => $pays82,
'Indon&eacute;sie' => $pays83,
'Irak' => $pays84,
'Iran' => $pays85,
'Irlande' => $pays86,
'Islande' => $pays87,
'Isra&euml;l' => $pays88,
'Italie' => $pays89,
'Jama&iuml;que' => $pays90,
'Japon' => $pays91,
'Jordanie' => $pays92,
'Kazakhstan' => $pays93,
'Kenya' => $pays94,
'Kirghizistan' => $pays95,
'Kiribati' => $pays96,
'Kowe&iuml;t' => $pays97,
'Laos' => $pays98,
'Lesotho' => $pays99,
'Lettonie' => $pays100,
'Liban' => $pays101,
'Liberia' => $pays102,
'Libye' => $pays103,
'Liechtenstein' => $pays104,
'Lituanie' => $pays105,
'Luxembourg' => $pays106,
'Mac&eacute;doine' => $pays107,
'Madagascar' => $pays108,
'Malaisie' => $pays109,
'Malawi' => $pays110,
'Maldives' => $pays111,
'Mali' => $pays112,
'Malte' => $pays113,
'Maroc' => $pays114,
'Marshall' => $pays115,
'Maurice' => $pays116,
'Mauritanie' => $pays117,
'Mexique' => $pays118,
'Micron&eacute;sie' => $pays119,
'Moldavie' => $pays120,
'Monaco' => $pays121,
'Mongolie' => $pays122,
'Mont&eacute;n&eacute;gro' => $pays123,
'Mozambique' => $pays124,
'Namibie' => $pays125,
'Nauru' => $pays126,
'N&eacute;pal' => $pays127,
'Nicaragua' => $pays128,
'Niger' => $pays129,
'Nigeria' => $pays130,
'Norv&egrave;ge' => $pays131,
'Nouvelle Z&eacute;lande' => $pays132,
'Oman' => $pays133,
'Ouganda' => $pays134,
'Ouzb&eacute;kistan' => $pays135,
'Pakistan' => $pays136,
'Palau' => $pays137,
'Palestine' => $pays138,
'Panama' => $pays139,
'Papouasie Nouvelle Guin&eacute;e' => $pays140,
'Paraguay' => $pays141,
'$pays Bas' => $pays142,
'P&eacute;rou' => $pays143,
'Philippines' => $pays144,
'Pologne' => $pays145,
'Portugal' => $pays146,
'Qatar' => $pays147,
'Roumanie' => $pays148,
'Royaume Uni' => $pays149,
'Russie' => $pays150,
'Rwanda' => $pays151,
'Saint Kitts et Nevis' => $pays152,
'Sainte Lucie' => $pays153,
'Saint Marin' => $pays154,
'Saint Vincent et les Grenadines' => $pays155,
'Salomon' => $pays156,
'Salvador' => $pays157,
'Samoa' => $pays158,
'Sao Tom&eacute; et Principe' => $pays159,
'S&eacute;n&eacute;gal' => $pays160,
'Serbie' => $pays161,
'Seychelles' => $pays162,
'Sierra Leone' => $pays163,
'Singapour' => $pays164,
'Slovaquie' => $pays165,
'Slov&eacute;nie' => $pays166,
'Somalie' => $pays167,
'Soudan' => $pays168,
'Soudan du Sud' => $pays169,
'Sri Lanka' => $pays170,
'Su&egrave;de' => $pays171,
'Suisse' => $pays172,
'Suriname' => $pays173,
'Swaziland' => $pays174,
'Syrie' => $pays175,
'Tadjikistan' => $pays176,
'Tanzanie' => $pays177,
'Tchad' => $pays178,
'R&eacute;publique tch&egrave;que' => $pays179,
'Tha&iuml;lande' => $pays180,
'Timor Leste' => $pays181,
'Togo' => $pays182,
'Tonga' => $pays183,
'Trinit&eacute; et Tobago' => $pays184,
'Tunisie' => $pays185,
'Turkm&eacute;nistan' => $pays186,
'Turquie' => $pays187,
'Tuvalu' => $pays188,
'Ukraine' => $pays189,
'Uruguay' => $pays190,
'Vanuatu' => $pays191,
'Vatican' => $pays192,
'Venezuela' => $pays193,
'Vietnam' => $pays194,
'Y&eacute;men' => $pays195,
'Zambie' => $pays196,
'Zimbabwe' => $pays197

);  

foreach ($world as $world1 => $world2) { 

echo'<option '.$world2.'>'.$world1.'</option>';
 } 

echo'
</select>
</td>

</tr><tr>

<td class="titre"></br>Pagination  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[4]).'" name="4" STYLE="width:180px;">
<option value="on" '.$paginationOn.'>Nouveau à Ancien</option>
<option value="off" '.$paginationOff.'>Ancien à nouveau</option>
</select></td>
<td class="profil"></br>'.Photo.'  &nbsp;</td><td></br><input type="text" name="15" value="'.base64_decode($tableau[15]).'" placeholder="Une photo de vous" STYLE="width:170px;" /></td>

</tr><tr>
<td class="titre"></br>COULEUR CSS  &nbsp;</td><td></br>'; 

echo '

<input type="color" name="5" value="'.base64_decode($tableau[5]).'" STYLE="width:170px;font-style: bold;color:white;background:';

if (base64_decode($tableau[5])=='') {echo'orange';}

else {echo''.base64_decode($tableau[5]).'';}

echo';"/></td>'; 

echo '

<td class="profil"></br>'.Twitter.'  &nbsp;</td><td></br><input type="text" name="16" value="'.base64_decode($tableau[16]).'" placeholder="Votre Compte Twitter" STYLE="width:170px;" /></td>

</tr><tr>

<td class="titre"></br>'.Login.'  &nbsp;</td><td></br><input type="text" required name="6" value="'.base64_decode($tableau[6]).'" placeholder="Votre pseudo de connexion" STYLE="width:170px;" alt=""/></td>

<td class="profil"></br>'.Facebook.'  &nbsp;</td><td></br><input type="text" name="17" value="'.base64_decode($tableau[17]).'" placeholder="Votre Compte Facebook" STYLE="width:170px;" /></td>

</tr><tr>

<td class="titre"></br>'.Code.'  &nbsp;</td><td></br><input type="password" autocomplete="off" required name="7" value="" placeholder="Mot de passe de connexion" STYLE="width:170px;" alt=""/ ></td>

<td class="profil"></br>Google +  &nbsp;</td><td></br><input type="text" name="18" value="'.base64_decode($tableau[18]).'" placeholder="Votre Compte Google +" STYLE="width:170px;" /></td>

</tr>';

if (base64_decode($tableau[8])==on) {$selectedon = 'selected="selected"';}

elseif (base64_decode($tableau[8])==on2) {$selectedon2 = 'selected="selected"';}

elseif (base64_decode($tableau[8])==off) {$selectedoff = 'selected="selected"';}

echo'<tr><td class="titre"></br>URL Rewriting  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[8]).'" name="8" STYLE="width:180px;">
<OPTION VALUE="on" '.$selectedon.'>Url Sans titre</OPTION>
<OPTION VALUE="on2" '.$selectedon2.'>Url avec Titre</OPTION>
<OPTION VALUE="off" '.$selectedoff.'>Pas de r&eacute;ecriture</OPTION>
</SELECT></td>

<td class="profil"></br>Activit&eacute;</td><td></br><input type="text" name="19" value="'.base64_decode($tableau[19]).'" placeholder="Codeur, Vendeur, etc" STYLE="width:170px;" /></td>
</tr>
';echo "\n";

if (base64_decode($tableau[9])==on) {$selected1 = 'selected="selected"';}

elseif (base64_decode($tableau[9])==off) {$selected2 = 'selected="selected"';}

echo'<tr><td class="titre"></br>Lien Admin  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[9]).'" name="9" STYLE="width:180px;">
<OPTION VALUE="on" '.$selected1.'>Afficher</OPTION>
<OPTION VALUE="off" '.$selected2.'>Cacher</OPTION>
</SELECT></td>

<td class="profil"></br>Biographie</td><td></br><input type="text" name="20" value="'.base64_decode($tableau[20]).'" placeholder="Quelques mots sur vous" STYLE="width:170px;" /></td>

</tr>
';echo "\n";

if (base64_decode($tableau[10])==on) {$selected1 = 'selected="selected"';}

elseif (base64_decode($tableau[10])==off) {$selected2 = 'selected="selected"';}

echo'<tr><td class="titre"></br>'.Date.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[10]).'" name="10" STYLE="width:180px;">
<OPTION VALUE="on" '.$selected1.'>Lettre</OPTION>
<OPTION VALUE="off" '.$selected2.'>Chiffre</OPTION>
</SELECT></td>

<td class="profil"></br>Loisirs</td><td></br><input type="text" name="21" value="'.base64_decode($tableau[21]).'" placeholder="Jeux vid&eacute;os, Mangas, etc" STYLE="width:170px;" /></td>
</tr>

<tr>
<td COLSPAN=4><center><br/><b>Menu</b></center></td>
</tr>

<tr>
<td class="titre"></br>Titre A  &nbsp;</td><td></br><input type="text" name="22" value="'.base64_decode($tableau[22]).'" placeholder="Titre du menu A" STYLE="width:170px;" /></td>
<td class="profil"></br>Lien A  &nbsp;</td><td></br><input type="text" name="23" value="'.base64_decode($tableau[23]).'" placeholder="Lien du menu A" STYLE="width:170px;" /></td>
</tr>

<tr>
<td class="titre"></br>Titre B  &nbsp;</td><td></br><input type="text" name="24" value="'.base64_decode($tableau[24]).'" placeholder="Titre du menu B" STYLE="width:170px;" /></td>
<td class="profil"></br>Lien B  &nbsp;</td><td></br><input type="text" name="25" value="'.base64_decode($tableau[25]).'" placeholder="Lien du menu B" STYLE="width:170px;" /></td>
</tr>

<tr>
<td COLSPAN=4><center><br/><b>Banniere</b></center></td>
</tr>

<tr>
<td class="titre"></br>Lien  &nbsp;</td><td></br><input type="text" name="26" value="'.base64_decode($tableau[26]).'" placeholder="Lien Banniere" STYLE="width:170px;" /></td>
<td class="profil"></br>Titre  &nbsp;</td><td></br><input type="text" name="27" value="'.base64_decode($tableau[27]).'" placeholder="Titre Banniere" STYLE="width:170px;" /></td>
</tr>

';echo "\n";

echo '</table><br/>';echo "\n";

echo '<center><input class="submit" type="submit" value="'.Ok.'" name="submit"/>
</center></form>'; 

}
}

/* La liste des News dans l'administration */

function liste_news() {

$fichier='configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

echo'<table class="data" style="border-collapse: collapse;"><thead><tr>
<th style="width:300px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Titre.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Date.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Auteur.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Supprimer.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Editer.'</center></th></tr></thead></table>';
 
$liste_news = unserialize(base64_decode(file_get_contents('../news.php')));
if(!empty($liste_news)) {
	foreach($liste_news as $id => $news) {

echo'<table class="data" style="border-collapse: collapse;">
<thead><tr >
<td style="width:300px;border:1px solid #CCCCCC;background-color:#FFF9F4;">';
echo $news['titre'];
echo'</td>
<td style="width:100px;border:1px solid #CCCCCC;background-color:#FFF9F4;text-align:center;">';
if (base64_decode($tableau[1])=='fr') { echo' '.$news['jour'].'-'.$news['mois'].'-'.$news['annee'].' '; }
else { echo' '.$news['annee'].'-'.$news['mois'].'-'.$news['jour'].' '; }
echo'</td>
<td style="width:100px;border:1px solid #CCCCCC;background-color:#FFF9F4;"><center>';
echo base64_decode($tableau[2]);
echo'</center></td><td style="width:100px;border:1px solid #CCCCCC;background-color:#FFF9F4;"><center><a href="index.php?page=supprimer&id='.$id.'");"><img src="images/supprimer.png" alt="Supprimer" width="16px"></a></center></td><td style="width:100px;border:1px solid #CCCCCC;background-color:#FFF9F4;"><center><a href="index.php?page=editer&id='.$id.'"><img src="images/edition.png" alt="Editer" width="16px"></a></center></td></tr></thead></table>';
}
}
} 

/* Le Formulaire pour envoyer les Images */

function formulaire_images() {

echo'<form method="POST" action="index.php?page=upload" enctype="multipart/form-data">
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
     '.Fichier.' : <input type="file" name="avatar">
     <input type="submit" name="envoyer" value="'.Ok.'">
</form>';

}

/* Affichage des images, Le lien de l'image et lien pour la supprimer */

function images() {

$dir = '../images/';
$valide_extensions = array('jpg', 'jpeg', 'gif', 'png', 'svg', 'bmp', 'JPG', 'JPEG', 'GIF', 'PNG', 'SVG', 'BMP');

$Ressource = opendir($dir);
while($fichier = readdir($Ressource))
{
     $berk = array('.', '..');

     $test_Fichier = $dir.$fichier;
     $test_Fichier2 = $fichier;


     if(!in_array($fichier, $berk) && !is_dir($test_Fichier))
     {
 	 $ext = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));

         if(in_array($ext, $valide_extensions))
         {
echo '<div style="float:left; margin:7px;"><img src="'.$test_Fichier.'" style="border:1px; border-color:black;border-style: solid ;height:100px; width:100px; background-color:white;padding:6px"/><div style="text-align:center;" /><a href="'.$test_Fichier.'"><img src="images/liens.png" alt="Liens" width="16px">';

echo '</a> - <a href="index.php?page=delete&id='.$test_Fichier2.'"><img src="images/supprimer.png" alt="Supprimer" width="16px">';

echo'</a></div>
                 </div>';
}
}
}
}

/* Script pour &eacute;viter les slash dans les articles */
function anti_slash() {

if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

}
/* Script pour ajouter une news via l'administration */

function ajout_news() {

$fichier='configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['chapo']) && isset($_POST['jour']) && isset($_POST['mois']) && isset($_POST['annee'])) {
     //On d&eacute;finit les variables
$titre = htmlentities($_POST['titre'],null,'UTF-8');
$contenu = htmlentities($_POST['contenu'],ENT_QUOTES,'UTF-8');

$in = '(&lt;(/?(?:strong|p|em|a|ol|ul|li|img|iframe)\b.*?)&gt;)ie';
$contenu = preg_replace($in, "'<'.html_entity_decode('$1',ENT_QUOTES,'UTF-8').'>'", $contenu);

$contenu = str_replace(array(

':)'
,':('
,'XD'
,':D'
,':p'
,':o'
,'&lt;br&gt;'
,'&lt;br /&gt;'
,'&amp;nbsp;'
,'&amp;lt;3'

), 

array(

'<img src="admin/images/smileys/Content.png" alt=":)" class="" />'
,'<img src="admin/images/smileys/Embarrassed.png" alt=":(" class="" />'
,'<img src="admin/images/smileys/Grin.png" alt="XD" class="" />'
,'<img src="admin/images/smileys/Laughing.png" alt=":D" class="" />'
,'<img src="admin/images/smileys/Yuck.png" alt=":p" class="" />'
,'<img src="admin/images/smileys/Gasp.png" alt=":o" class="" />'
,'<br />'
,'<br />'
,' '
,'<img src="admin/images/smileys/HeartEyes.png" alt="<3" class="" />'

), $contenu);

     $chapo = htmlentities($_POST['chapo'],null,'UTF-8');
     $jour = htmlentities($_POST['jour'],null,'UTF-8');
     $mois = htmlentities($_POST['mois'],null,'UTF-8');
     $annee = htmlentities($_POST['annee'],null,'UTF-8');
	 $note = htmlentities($_POST['note'],null,'UTF-8');
	//On r&eacute;cup&egrave;re les donn&eacute;es d&eacute;jà existantes
	$news = unserialize(base64_decode(file_get_contents('../news.php')));
	$news[] = array('titre' => $titre, 'jour' => $jour, 'mois' => $mois, 'annee' => $annee,'contenu' => $contenu, 'chapo' => $chapo, 'note' => $note);
	file_put_contents('../news.php', base64_encode(serialize($news)));
	
      echo '<div id="valide"><p>La news a bien &eacute;t&eacute; ajout&eacute;e !</p></div>';
      echo '<br />';
      echo '<center><a href="index.php?page=liste">Retour</a></center>';
}
else {
	 echo'<form action="" method="post">
<label for="pseudo">'.Auteur.'</label> :<strong> '.base64_decode($tableau[2]).'</strong> -  <label for="titre">'.Titre.' : </label> <input type="text" required name="titre" id="titre" placeholder="Titre de votre article" /> -  

<label for="jour">Jour</label> : <SELECT name="jour" id="jour" STYLE="width:70px;">';

$days = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');  

foreach ($days as $d) { 
echo'<OPTION>'.$d.'</OPTION>';
 } 

echo'</SELECT>
-
<label for="mois">Mois</label> : <SELECT name="mois" id="mois" STYLE="width:70px;">';

$month = array('01','02','03','04','05','06','07','08','09','10','11','12');  

foreach ($month as $m) { 
echo'<OPTION>'.$m.'</OPTION>';
 } 
 
echo'</SELECT>
-
<label for="annee">Ann&eacute;e</label> : <SELECT name="annee" id="annee" STYLE="width:70px;">
<OPTION>'.(date('Y')+0).'</OPTION>
</SELECT>

<br /><br /><label for="chapo"> '.Chapo.' : </label><input type="text" required name="chapo" id="chapo" rows="" cols="" placeholder="R&eacute;sum&eacute; de l\'article pour les moteurs de recherches. " style="width: 82%;"/><br /><br />

<script>
_.control[\':)\']=_.btn(\':)\',\'InsertHTML\',\'<img src="./images/smileys/Content.png">\',\':)\'); 
_.control[\':(\']=_.btn(\':(\',\'InsertHTML\',\'<img src="./images/smileys/Embarrassed.png">\',\':(\'); 
_.control[\'XD\']=_.btn(\'XD\',\'InsertHTML\',\'<img src="./images/smileys/Grin.png">\',\'XD\'); 
_.control[\':D\']=_.btn(\':D\',\'InsertHTML\',\'<img src="./images/smileys/Laughing.png">\',\':D\'); 
_.control[\':p\']=_.btn(\':p\',\'InsertHTML\',\'<img src="./images/smileys/Yuck.png">\',\':p\'); 
_.control[\':o\']=_.btn(\':o\',\'InsertHTML\',\'<img src="./images/smileys/Gasp.png">\',\':o\'); 
</script> 

<textarea name="contenu" id="contenu" rows="" cols="" style="width: 100%;height: 400px;"></textarea>
<br/><label for="note">Note</label> : <SELECT name="note" id="note" STYLE="width:70px;">';

$notes = array( 'Off','1','2','3','4','5');

foreach ($notes as $notesA) { echo'<option>'.$notesA.'</option>'; };

echo'</SELECT>&nbsp; &nbsp;<b>( Si vous voulez ajouter une note avec votre article sur des jeux vidéos, mangas, films ou autre ... )</b> .<br/><br/><center><input type="submit" value="'.Ok.'" /></center></form>';
}
}

/* Script pour editer une news via l'administration */

function editer_news() {

$fichier='configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);    

if(!isset($_GET['id'])) {
	header('Location: index.php?page=liste');
	exit();
}

$news = unserialize(base64_decode(file_get_contents('../news.php')));
$newsAmodifier = (int) $_GET['id'];
if(isset($_POST['titre']) && isset($_POST['contenu'])) {
$news[$newsAmodifier]['titre'] = htmlentities($_POST['titre'],null,'UTF-8');
$news[$newsAmodifier]['jour'] = htmlentities($_POST['jour'],null,'UTF-8');
$news[$newsAmodifier]['mois'] = htmlentities($_POST['mois'],null,'UTF-8');
$news[$newsAmodifier]['annee'] = htmlentities($_POST['annee'],null,'UTF-8');

$news[$newsAmodifier]['contenu'] = htmlentities($_POST['contenu'], ENT_QUOTES,'UTF-8');
$in = '(&lt;(/?(?:strong|p|em|a|ol|ul|li|img|iframe)\b.*?)&gt;)ie';
$news[$newsAmodifier]['contenu'] = preg_replace($in, "'<'.html_entity_decode('$1',ENT_QUOTES,'UTF-8').'>'", $news[$newsAmodifier]['contenu']);

$news[$newsAmodifier]['contenu'] = str_replace(array(

':)'
,':('
,'XD'
,':D'
,':p'
,':o'
,'&lt;br&gt;'
,'&lt;br /&gt;'
,'&amp;nbsp;'
,'&amp;lt;3'

), 

array(

'<img src="admin/images/smileys/Content.png" alt=":)" class="" />'
,'<img src="admin/images/smileys/Embarrassed.png" alt=":(" class="" />'
,'<img src="admin/images/smileys/Grin.png" alt="XD" class="" />'
,'<img src="admin/images/smileys/Laughing.png" alt=":D" class="" />'
,'<img src="admin/images/smileys/Yuck.png" alt=":p" class="" />'
,'<img src="admin/images/smileys/Gasp.png" alt=":o" class="" />'
,'<br />'
,'<br />'
,' '
,'<img src="admin/images/smileys/HeartEyes.png" alt="<3" class="" />'

), $news[$newsAmodifier]['contenu']);

	$news[$newsAmodifier]['chapo'] = htmlentities($_POST['chapo'],null,'UTF-8');
	$news[$newsAmodifier]['note'] = htmlentities($_POST['note'],null,'UTF-8');
	file_put_contents('../news.php', base64_encode(serialize($news)));
	echo '<div id="valide"><p>La news a bien &eacute;t&eacute; edit&eacute;e.</p></div>';
	echo '<br />';
	echo '<center><a href="index.php?page=liste">Retour</a></center>';
} else {

	echo'<form action="" method="POST">
	'.Auteur.' : <strong>'.base64_decode($tableau[2]).'</strong> - <label for="titre">'.Titre.' : </label> <input type="text" required name="titre" id="titre"  placeholder="Titre de votre article" value="'.$news[$newsAmodifier]['titre'].'" /> -  
<label for="jour">Jour : </label> <input type="text" name="jour" id="jour" value="'.$news[$newsAmodifier]['jour'].'" STYLE="width:70px;" readonly="readonly"/ > 
- <label for="mois">Mois : </label> <input type="text" name="mois" id="mois" value="'.$news[$newsAmodifier]['mois'].'" STYLE="width:70px;" readonly="readonly" /> 
- <label for="annee">Ann&eacute;e : </label> <input type="text" name="annee" id="annee" value="'.$news[$newsAmodifier]['annee'].'" STYLE="width:70px;" readonly="readonly" /> 
<br /><br /><label for="chapo">'.Chapo.' : </label><input type="text" required placeholder="R&eacute;sum&eacute; de l\'article pour les moteurs de recherches. " name="chapo" id="chapo" rows="" cols="" value="'.$news[$newsAmodifier]['chapo'].'" style="width: 82%;"/><br /><br />
	
<script>
_.control[\':)\']=_.btn(\':)\',\'InsertHTML\',\'<img src="./images/smileys/Content.png">\',\':)\'); 
_.control[\':(\']=_.btn(\':(\',\'InsertHTML\',\'<img src="./images/smileys/Embarrassed.png">\',\':(\'); 
_.control[\'XD\']=_.btn(\'XD\',\'InsertHTML\',\'<img src="./images/smileys/Grin.png">\',\'XD\'); 
_.control[\':D\']=_.btn(\':D\',\'InsertHTML\',\'<img src="./images/smileys/Laughing.png">\',\':D\'); 
_.control[\':p\']=_.btn(\':p\',\'InsertHTML\',\'<img src="./images/smileys/Yuck.png">\',\':p\'); 
_.control[\':o\']=_.btn(\':o\',\'InsertHTML\',\'<img src="./images/smileys/Gasp.png">\',\':o\'); 
</script> 	

<textarea name="contenu" id="contenu" rows="" cols="" style="width: 100%;height: 400px;">'.$news[$newsAmodifier]['contenu'].'</textarea>
	
<br/><label for="note">Note</label> : <SELECT name="note" id="note" STYLE="width:70px;">';

if ($news[$newsAmodifier]['note']=='Off') {$notesoff = 'selected="selected"';}
elseif ($news[$newsAmodifier]['note']==1) {$notes1 = 'selected="selected"';}
elseif ($news[$newsAmodifier]['note']==2) {$notes2 = 'selected="selected"';}
elseif ($news[$newsAmodifier]['note']==3) {$notes3 = 'selected="selected"';}
elseif ($news[$newsAmodifier]['note']==4) {$notes4 = 'selected="selected"';}
elseif ($news[$newsAmodifier]['note']==5) {$notes5 = 'selected="selected"';}
else {$notesoff = 'selected="selected"';}

$notes = array(

'Off' => $notesoff, 
'1' => $notes1,
'2' => $notes2,
'3' => $notes3,
'4' => $notes4,
'5' => $notes5

);

foreach ($notes as $notesA => $notesB) { 
echo'<option '.$notesB.'>'.$notesA.'</option>';
 };

echo'</SELECT>&nbsp; &nbsp;<b>( Si vous voulez ajouter une note avec votre article sur des jeux vidéos, mangas, films ou autre ... )</b> .<br/>
		<br/>
<center><input type="submit" value="'.Ok.'" /></center>
	</form>';
	
}
}

/* Cette partie sert pour la connexion au Blog */

function connexion_blog() {

session_start();

$token = uniqid(rand(), true);

$_SESSION['token'] = $token;

$_SESSION['token_time'] = time();

echo'<style type="text/css">body {margin: 0; } #titre2 {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 24px 24px 24px;text-align:center;color: red;font-size: 12px;width:250px;} #titre {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 24px 24px 24px;text-align:center;color: #777777;font-size: 25px;width:250px;} #retour a:hover {font-weight: bold;} #retour a {color: #777777;text-decoration: none;} #retour {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 24px 24px 24px;text-align:center;color: #777777;font-size: 12px;width:250px;} #page { margin: auto; width: 200px;} #UAG{text-align:center;font-size: 9px;color: #666666;}#Ok input{color: #FFFFFF;font-weight: 700;background: #A0A0A0 !important;border:1px solid #2E83D9;font-size: 14px;} #login form {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 24px 24px 24px;text-align:center;color: #777777;font-size: 14px;width:250px;} #login input { box-shadow: inset 1px 1px 2px rgba(200, 200, 200, 0.196);border:1px solid #BBBBBB;background: #F5F5F5; }</style><div id="page"><br/><div id="titre">UAG CMS</div><br/><div id="login"><form action="identification.php" method="post"><b>'.Connexion.'</b><br/><br/>
     '.Login.' <br/><input type="text" name="login" value="" /><br /><br />
     '.Code.' <br/><input type="password" name="mdp" value="" /><br /><br />

  <input type="hidden" name="token" id="token" value="'.$token.'"/>

     <div id="Ok"><input type="submit" value="'.Ok.'"></div></form><div id="retour"><a href="../index.php">'.Accueil.'</a></div></div></div>';

}

/* Supprimer des images en cliquant sur un lien */

function supprimer_images() {

$id = basename($_GET['id']);
$fichier = "../images/".$id;
unlink ($fichier);
echo '<meta http-equiv="Refresh" content="2; url=index.php?page=images" />';
echo '<div id="valide"><p>Suppression effectu&eacute; avec succ&egrave;s ! Vous allez être rediriger :) </p></div>';

}

/* Supprimer des news en cliquant sur un lien */

function supprimer_news() {

//Si l'id pass&eacute; en param&egrave;tre dans l'url n'existe pas, c'est que le visiteur a &eacute;t&eacute; amenen&eacute; ici par hasard
if(!isset($_GET['id'])) {
	//Donc on redirige vers index.php
	header('Location: index.php?page=liste');
	//Puis on stoppe l'ex&eacute;cution du script
	exit();
}
//On r&eacute;cup&egrave;re l'array des news
$news = unserialize(base64_decode(file_get_contents('../news.php')));
//Puis l'id pass&eacute; en param&egrave;tre
$id = (int) $_GET['id'];

//Si la news existe
if(isset($news[$id])) {
	//On efface l'index correspondant à l'id de la news
	unset($news[$id]);
	
	//Puis on sauvegarde le tout
	file_put_contents('../news.php',  base64_encode(serialize($news)));

echo '<div id="valide"><p>La news a bien &eacute;t&eacute; supprim&eacute;e !</p></div>';
}
else {
echo '<div id="erreur"><p>La news n\'existe pas.</p></div>';
}
echo '<br />';
echo '<center><a href="index.php?page=liste">Retour</a></center>';

}

/* Envoyer des images via un formulaire */

function envoyer_images() {

$dossier = '../images/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 1048576;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.bmp', '.svg', '.jpeg', '.PNG', '.GIF', '.JPG', '.BMP', '.SVG', '.JPEG');
$extension = strrchr($_FILES['avatar']['name'], '.'); 
if(!in_array($extension, $extensions)) 
{
     echo '<meta http-equiv="Refresh" content="2; url=index.php?page=images" />';
     $erreur = '<div id="erreur"><p>Vous devez uploader une image, vous allez être rediriger :)</p></div>';
}
if($taille>$taille_maxi)
{
     echo '<meta http-equiv="Refresh" content="2; url=index.php?page=images" />';
     $erreur = '<div id="erreur"><p>Le fichier est trop gros... Vous allez être rediriger :)</p></div>';
}
if(!isset($erreur)) 
{
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇ&egrave;&eacute;Ê&euml;ÌÍÎ&iuml;ÒÓ&ocirc;ÕÖÙÚÛÜÝàáâãäåç&egrave;&eacute;ê&euml;ìíî&iuml;ðòó&ocirc;õöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . uniqid()  . $extension)) 
     {
	  echo '<meta http-equiv="Refresh" content="2; url=index.php?page=images" />';
          echo '<div id="valide"><p>Upload effectu&eacute; avec succ&egrave;s ! Vous allez être rediriger :) </p></div>';
     }
     else 
     {
	  echo '<meta http-equiv="Refresh" content="2; url=index.php?page=images" />';
          echo '<div id="erreur"><p>Echec de l\'upload ! Vous allez être rediriger :)</p></div>';
     }
}
else
{
     echo '<meta http-equiv="Refresh" content="2; url=index.php?page=images" />';
     echo $erreur;
}
}
?>