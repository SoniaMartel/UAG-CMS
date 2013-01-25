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

echo'<h2 style="color:'.base64_decode($tableau[5]).' !important">404</h2><center><img src="404.gif" alt="404" width="180px"></center><div id="article" style="padding-left:10px"><br/><h1 style="color:'.base64_decode($tableau[5]).' !important">La réponse à la page disparue, détruite, déplacée ou autre.</h1>';

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

echo'<h2 style="color:'.base64_decode($tableau[5]).' !important"><strong>'.$news['titre'].' '.Par.' '.base64_decode($tableau[2]).' - ';

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

echo'</strong></h2><div id="article" style="padding-left:10px">'.$news['contenu'].'</div>';		

}
}

else { echo'<h2 style="color:'.base64_decode($tableau[5]).' !important"">'.Informations.'</h2><div id="article" style="padding-left:10px">'.PasdeNews.'</div>'; }

}

/* Profil */

function tprofil()  {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo'<title>'.base64_decode($tableau[0]).' - Non-renseigné</title>';}

else {echo'<title>'.base64_decode($tableau[0]).' - '.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'</title>';};	

}

function profil()  {

$fichier='admin/configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

echo'<h2 style="color:'.base64_decode($tableau[5]).' !important">'.Profil.'</h2><div id="article" style="padding-left:10px">

<h1 style="color:'.base64_decode($tableau[5]).' !important">';
if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo 'Non-renseigné';}

else {echo''.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'';};

if ((base64_decode($tableau[13])=='') && (base64_decode($tableau[14])=='')) {echo '</h1>';}

else {echo' ('.base64_decode($tableau[13]).' ans '.base64_decode($tableau[14]).')</h1>';};

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


echo'<td>
<p><a href="https://fr-fr.facebook.com/'.base64_decode($tableau[17]).'" style="text-decoration:none; color:'.base64_decode($tableau[5]).' !important;">Facebook</a><br/></p>
<p><a href="https://plus.google.com/'.base64_decode($tableau[18]).'" style="text-decoration:none; color:'.base64_decode($tableau[5]).' !important;">Google+</a><br/></p>
<p><a href="https://twitter.com/'.base64_decode($tableau[16]).'" style="text-decoration:none; color:'.base64_decode($tableau[5]).' !important;">Twitter</a></p>
</td>
</tr></table>'; 

}

/* ADMINISTRATION */

/* Index de l'administration */

function accueil() {

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

echo'<div id="pays"><p>'.Pays.'</p></div>';

$file = 'http://julien-et-nel.be/UAG/1-94.txt';
 $file_headers = @get_headers($file);
 if($file_headers[0] == 'HTTP/1.1 404 Not Found') {

echo'<div id="erreur"><a href="http://julien-et-nel.be/UAG/" style="color:black;"><p>'.MauvaiseVersion.'</p></a></div>';
 }
 else {

if($file_headers[0] == 'HTTP/1.1 503 Service Unavailable') { }
elseif($file_headers[0] == 'HTTP/1.1 502 Not Implemented') { } 
else {echo'<div id="valide"><p>'.BonneVersion.'</p></div>';}
 }

}

/* Configuration du blog */ 

function configuration() {

$fichier='configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

if ($_GET['id']=='2') {  

echo'<meta http-equiv="refresh" content="1; URL=index.php?page=configuration">
<p style="color:green">Modification effectuée ! Redirection en cours ... </p>';
 
// Fichier de transition pour écupérer les données du formulaire

 	 $f=fopen($fichier,"w");fclose($f); // on efface le fichier, on le crée à nouveau (vide)

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

if (base64_decode($tableau[1])==en) {$selected3 = 'selected="selected"';}
elseif (base64_decode($tableau[1])==es) {$selected4 = 'selected="selected"';}
elseif (base64_decode($tableau[1])==fr) {$selected5 = 'selected="selected"';}
elseif (base64_decode($tableau[1])==nl) {$selected6 = 'selected="selected"';}

echo '<td class="titre"></br>'.Langue.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[1]).'" name="1" STYLE="width:180px;">
<OPTION VALUE="en" '.$selected3.'>English</OPTION>
<OPTION VALUE="es" '.$selected4.'>Español</OPTION>
<OPTION VALUE="fr" '.$selected5.'>Français</OPTION>
<OPTION VALUE="nl" '.$selected6.'>Nederlands</OPTION>
</SELECT></td>

<td class="profil"></br>'.Prenom.'  &nbsp;</td><td></br><input type="text" name="12" value="'.base64_decode($tableau[12]).'" placeholder="Votre prenom" STYLE="width:170px;" /></td>

</tr><tr>

<td class="titre"></br>'.Gerant.'  &nbsp;</td><td></br><input type="text" required name="2" value="'.base64_decode($tableau[2]).'" placeholder="Nom affiché sur le blog" STYLE="width:170px;"/></td>
<td class="profil"></br>'.Age.'  &nbsp;</td><td></br><input type="text" name="13" value="'.base64_decode($tableau[13]).'" placeholder="Votre age" STYLE="width:170px;" /></td>

</tr><tr>

<td class="titre"></br>Favicon  &nbsp;</td><td></br><input type="text" name="3" value="'.base64_decode($tableau[3]).'" placeholder="Lien de votre Favicon" STYLE="width:170px;"/></td>
<td class="profil"></br>'.Localisation.'  &nbsp;</td><td></br><input type="text" name="14" value="'.base64_decode($tableau[14]).'" placeholder="Pays, region ou autre " STYLE="width:170px;" /></td>


</tr><tr>

<td class="titre"></br>Logo  &nbsp;</td><td></br><input type="text" name="4" value="'.base64_decode($tableau[4]).'" placeholder="Lien pour Opera & Facebook" STYLE="width:170px;"/></td>
<td class="profil"></br>'.Photo.'  &nbsp;</td><td></br><input type="text" name="15" value="'.base64_decode($tableau[15]).'" placeholder="Une photo de vous" STYLE="width:170px;" /></td>

</tr><tr>
<td class="titre"></br>COULEUR CSS  &nbsp;</td><td></br>'; 

echo '

<input type="color" name="5" value="'.base64_decode($tableau[5]).'" placeholder="Couleur pour le css" STYLE="width:170px;"/>

</td>'; 

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

elseif (base64_decode($tableau[8])==on2) {$selectedoff2 = 'selected="selected"';}

elseif (base64_decode($tableau[8])==off) {$selectedoff = 'selected="selected"';}

echo'<tr><td class="titre"></br>URL Rewriting  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[8]).'" name="8" STYLE="width:180px;">
<OPTION VALUE="on" '.$selectedon.'>Url Sans titre</OPTION>
<OPTION VALUE="on2" '.$selectedon2.'>Url avec Titre</OPTION>
<OPTION VALUE="off" '.$selectedoff.'>Pas de réecriture</OPTION>
</SELECT></td>

<td class="profil"></br>Activité</td><td></br><input type="text" name="19" value="'.base64_decode($tableau[19]).'" placeholder="Codeur, Vendeur, etc" STYLE="width:170px;" /></td>
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

<td class="profil"></br>Loisirs</td><td></br><input type="text" name="21" value="'.base64_decode($tableau[21]).'" placeholder="Jeux vidéos, Mangas, etc" STYLE="width:170px;" /></td>
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

/* Script pour éviter les slash dans les articles */
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
     //On définit les variables
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
	//On récupère les données déjà existantes
	$news = unserialize(base64_decode(file_get_contents('../news.php')));
	$news[] = array('titre' => $titre, 'jour' => $jour, 'mois' => $mois, 'annee' => $annee,'contenu' => $contenu, 'chapo' => $chapo);
	file_put_contents('../news.php', base64_encode(serialize($news)));
	
      echo '<div id="valide"><p>La news a bien &eacute;t&eacute; ajout&eacute;e !</p></div>';
      echo '<br />';
      echo '<center><a href="index.php?page=liste">Retour</a></center>';
}
else {
	 echo'<form action="" method="post">
<label for="pseudo">'.Auteur.'</label> :<strong> '.base64_decode($tableau[2]).'</strong> -  <label for="titre">'.Titre.' : </label> <input type="text" required name="titre" id="titre" placeholder="Titre de votre article" /> -  

<label for="jour">Jour</label> : <SELECT name="jour" id="jour" STYLE="width:70px;">
<OPTION>01</OPTION>
<OPTION>02</OPTION>
<OPTION>03</OPTION>
<OPTION>04</OPTION>
<OPTION>05</OPTION>
<OPTION>06</OPTION>
<OPTION>07</OPTION>
<OPTION>08</OPTION>
<OPTION>09</OPTION>
<OPTION>10</OPTION>
<OPTION>11</OPTION>
<OPTION>12</OPTION>
<OPTION>13</OPTION>
<OPTION>14</OPTION>
<OPTION>15</OPTION>
<OPTION>16</OPTION>
<OPTION>17</OPTION>
<OPTION>18</OPTION>
<OPTION>19</OPTION>
<OPTION>20</OPTION>
<OPTION>21</OPTION>
<OPTION>22</OPTION>
<OPTION>23</OPTION>
<OPTION>24</OPTION>
<OPTION>25</OPTION>
<OPTION>26</OPTION>
<OPTION>27</OPTION>
<OPTION>28</OPTION>
<OPTION>29</OPTION>
<OPTION>30</OPTION>
<OPTION>31</OPTION>
</SELECT>
-
<label for="mois">Mois</label> : <SELECT name="mois" id="mois" STYLE="width:70px;">
<OPTION>01</OPTION>
<OPTION>02</OPTION>
<OPTION>03</OPTION>
<OPTION>04</OPTION>
<OPTION>05</OPTION>
<OPTION>06</OPTION>
<OPTION>07</OPTION>
<OPTION>08</OPTION>
<OPTION>09</OPTION>
<OPTION>10</OPTION>
<OPTION>11</OPTION>
<OPTION>12</OPTION>
</SELECT>
-
<label for="annee">Année</label> : <SELECT name="annee" id="annee" STYLE="width:70px;">
<OPTION>'.(date('Y')+0).'</OPTION>
</SELECT>

<br /><br /><label for="chapo"> '.Chapo.' : </label><input type="text" required name="chapo" id="chapo" rows="" cols="" placeholder="Résumé de l\'article pour les moteurs de recherches. " style="width: 82%;"/><br /><br />
<textarea name="contenu" id="contenu" rows="" cols="" style="width: 100%;height: 400px;"></textarea><br/>
		<center><input type="submit" value="'.Ok.'" /></center>
	</form>';
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
	file_put_contents('../news.php', base64_encode(serialize($news)));
	echo '<div id="valide"><p>La news a bien &eacute;t&eacute; edit&eacute;e.</p></div>';
	echo '<br />';
	echo '<center><a href="index.php?page=liste">Retour</a></center>';
} else {

	echo'<form action="" method="POST">
	'.Auteur.' : <strong>'.base64_decode($tableau[2]).'</strong> - <label for="titre">'.Titre.' : </label> <input type="text" required name="titre" id="titre"  placeholder="Titre de votre article" value="'.$news[$newsAmodifier]['titre'].'" /> -  
<label for="jour">Jour : </label> <input type="text" name="jour" id="jour" value="'.$news[$newsAmodifier]['jour'].'" STYLE="width:70px;" readonly="readonly"/ > 
- <label for="mois">Mois : </label> <input type="text" name="mois" id="mois" value="'.$news[$newsAmodifier]['mois'].'" STYLE="width:70px;" readonly="readonly" /> 
- <label for="annee">Année : </label> <input type="text" name="annee" id="annee" value="'.$news[$newsAmodifier]['annee'].'" STYLE="width:70px;" readonly="readonly" /> 
<br /><br /><label for="chapo">'.Chapo.' : </label><input type="text" required placeholder="Résumé de l\'article pour les moteurs de recherches. " name="chapo" id="chapo" rows="" cols="" value="'.$news[$newsAmodifier]['chapo'].'" style="width: 82%;"/><br /><br />
	<textarea name="contenu" id="contenu" rows="" cols="" style="width: 100%;height: 400px;">'.$news[$newsAmodifier]['contenu'].'</textarea>
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
echo '<div id="valide"><p>Suppression effectué avec succès ! Vous allez être rediriger :) </p></div>';

}

/* Supprimer des news en cliquant sur un lien */

function supprimer_news() {

//Si l'id passé en paramètre dans l'url n'existe pas, c'est que le visiteur a été amenené ici par hasard
if(!isset($_GET['id'])) {
	//Donc on redirige vers index.php
	header('Location: index.php?page=liste');
	//Puis on stoppe l'exécution du script
	exit();
}
//On récupère l'array des news
$news = unserialize(base64_decode(file_get_contents('../news.php')));
//Puis l'id passé en paramètre
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
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . uniqid()  . $extension)) 
     {
	  echo '<meta http-equiv="Refresh" content="2; url=index.php?page=images" />';
          echo '<div id="valide"><p>Upload effectué avec succès ! Vous allez être rediriger :) </p></div>';
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