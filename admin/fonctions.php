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

include ('admin/includes/config1.php');

echo'<title>'.base64_decode($tableau[0]).' - 404</title>';

}

function erreurs()   {

include ('admin/includes/config1.php');

echo'<h2>404</h2><center><img src="'.base64_decode($tableau[5]).'/404.gif" alt="404" width="180px"></center><div id="article" style="padding-left:10px"><br/><h1>'.error.'</h1>';

}

/* Articles */

function tarticles()  {

include ('admin/includes/config1.php');

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

include ('admin/includes/config1.php');

ob_start('ob_gzhandler'); register_shutdown_function('ob_end_flush');

$allnews = unserialize(base64_decode(file_get_contents('news.php')));

$nb_messagetotal = count($allnews);

$nbPages = ceil($nb_messagetotal / 1);

if(isset($_GET['page']) && (intval($_GET['page']) <= $nbPages)) {

$page = intval($_GET['page']) - 1; }

$liste_news = array_slice($allnews, $page, 1); 


if(!empty($liste_news)) { foreach($liste_news as $id => $news) {

echo'<h2><a href=""><strong>'.$news['titre'].' '.Par.' '.base64_decode($tableau[2]).' - ';

if (base64_decode($tableau[1])=='fr') { 

if (base64_decode($tableau[10])=='on') { 

echo ''.$news['jour'].' ';

if     ($news['mois']=='01') {echo ''.Janvier.'' ;}
elseif ($news['mois']=='02') {echo ''.Fevrier.'' ;}
elseif ($news['mois']=='03') {echo ''.Mars.'' ;}
elseif ($news['mois']=='04') {echo ''.Avril.'' ;}
elseif ($news['mois']=='05') {echo ''.Mai.'' ;}
elseif ($news['mois']=='06') {echo ''.Juin.'' ;}
elseif ($news['mois']=='07') {echo ''.Juillet.'' ;}
elseif ($news['mois']=='08') {echo ''.Aout.'' ;}
elseif ($news['mois']=='09') {echo ''.Septembre.'' ;}
elseif ($news['mois']=='10') {echo ''.Octobre.'' ;}
elseif ($news['mois']=='11') {echo ''.Novembre.'' ;}
elseif ($news['mois']=='12') {echo ''.Decembre.'' ;}

echo ' '.$news['annee'].' ';

 }

elseif (base64_decode($tableau[10])=='off') { echo' '.$news['jour'].'-'.$news['mois'].'-'.$news['annee'].' '; } }

else { 

if (base64_decode($tableau[10])=='on') { 

echo ''.$news['annee'].' ';

if     ($news['mois']=='01') {echo ''.Janvier.'' ;}
elseif ($news['mois']=='02') {echo ''.Fevrier.'' ;}
elseif ($news['mois']=='03') {echo ''.Mars.'' ;}
elseif ($news['mois']=='04') {echo ''.Avril.'' ;}
elseif ($news['mois']=='05') {echo ''.Mai.'' ;}
elseif ($news['mois']=='06') {echo ''.Juin.'' ;}
elseif ($news['mois']=='07') {echo ''.Juillet.'' ;}
elseif ($news['mois']=='08') {echo ''.Aout.'' ;}
elseif ($news['mois']=='09') {echo ''.Septembre.'' ;}
elseif ($news['mois']=='10') {echo ''.Octobre.'' ;}
elseif ($news['mois']=='11') {echo ''.Novembre.'' ;}
elseif ($news['mois']=='12') {echo ''.Decembre.'' ;}

echo ' '.$news['jour'].' ';

 }

elseif (base64_decode($tableau[10])=='off') { echo' '.$news['annee'].'-'.$news['mois'].'-'.$news['jour'].' '; } }

echo'</strong></a></h2><div id="article" style="padding-left:10px">'.$news['contenu'].'</div>';		

}
}

else { header('Location: erreur.php'); }

echo'</article><article style="min-height:0px;font-weight:bold;text-align:center;">'.Note.' :';

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
Off
';
}

else {

echo'
Off
';
}

if (base64_decode($tableau[3])=='') {echo'</article><article style="min-height:0px;font-weight:bold;text-align:center;">Les commentaires ne sont pas activés.';}

else {

echo'</article>';

$connect2 = TRUE; $ip_internet2 = 'www.disqus.com'; $port_internet2 = 80; 

if (! $sock2 = @fsockopen($ip_internet2, $port_internet2, $num2, $error2, 5)) { 

echo '<article style="min-height:0px;font-weight:bold;text-align:center;">

<div id="disqus_thread" style="text-align:center;">Disqus : Off'; }

else { echo'<article><div id="disqus_thread"><script type="text/javascript">';

if (base64_decode($tableau[1])=='fr') {echo'var disqus_config = function () { this.language = "fr";};';}

else {echo'var disqus_config = function () { this.language = "en";};';} 

echo'
var disqus_shortname = \''.base64_decode($tableau[3]).'\'; // required: replace example with your forum shortname
(function() {
var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
dsq.src = \'http://\' + disqus_shortname + \'.disqus.com/embed.js\';
(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
})();
 </script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
';

};
echo'</div>';
}
}

/* Profil */

function tprofil()  {

include ('admin/includes/config1.php');

if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo'<title>'.base64_decode($tableau[0]).' - '.Nonrenseigne.'</title>';}

else {echo'<title>'.base64_decode($tableau[0]).' - '.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'</title>';};	

}

function profil()  {

include ('admin/includes/config1.php');

echo'<h2>'.Profil.'</h2><div id="article" style="padding-left:10px">

<h1>';
if ((base64_decode($tableau[11])=='') && (base64_decode($tableau[12])=='')) {echo Nonrenseigne;}

else {echo''.base64_decode($tableau[11]).' '.base64_decode($tableau[12]).'';};

if ((base64_decode($tableau[13])=='') && (base64_decode($tableau[14])=='')) {echo '</h1>';}

else {

echo' ( ';

function age($naiss)  {
  list($annee, $mois, $jour) = preg_split('[/.]', $naiss);
  $today['mois'] = date('n');
  $today['jour'] = date('j');
  $today['annee'] = date('Y');
  $annees = $today['annee'] - $annee;
  if ($today['mois'] <= $mois) {
    if ($mois == $today['mois']) {
      if ($jour > $today['jour'])
        $annees--;
      }
    else
      $annees--;
    }
	
if ((base64_decode($tableau[13])=='') && (base64_decode($tableau[28])=='') && (base64_decode($tableau[29])=='')) {echo '';}

else {
  echo $annees; echo' ans ';
  
  }  }
age(''.base64_decode($tableau[13]).'/'.base64_decode($tableau[28]).'/'.base64_decode($tableau[29]).'');  

if (base64_decode($tableau[14])=='Monde') {echo Monde;}

else {echo''.base64_decode($tableau[14]).'';};

echo' <img src="'.base64_decode($tableau[5]).'/admin/images/pays/'.base64_decode($tableau[14]).'.png" alt="'.base64_decode($tableau[14]).'" style="border: black 1px solid;"> )</h1>';};

echo'<table>
<tr>
<td><img src="';

if (base64_decode($tableau[15])=='') {echo ''.base64_decode($tableau[5]).'/photo.png';}

else {echo''.base64_decode($tableau[15]).'';};

echo'" alt="" style="border: solid #DDDDDD;
border-radius: 4px;
display: block;
height:200px;width:200px;
margin-right:10px;"/></td>

<td style="padding:30px;">
<h2 style="
font-family:sans-serif;
font-size: 22px;
font-weight: 700;
line-height: 24px;
margin-bottom: 20px;
">';

if (base64_decode($tableau[19])=='') {echo Defaut;}
else {echo''.base64_decode($tableau[19]).'';};

echo'</h2>';

if ((base64_decode($tableau[20])=='') && (base64_decode($tableau[21])=='')) {echo '<p>'.Loisirs.' </td>';}

else {echo'<p>'.base64_decode($tableau[20]).'</p><p><b>Loisirs  :</b> '.base64_decode($tableau[21]).'</p></td>';};


echo'<td>';

if (base64_decode($tableau[17])=='') {echo '';}
else { echo'<p><a href="https://fr-fr.facebook.com/'.base64_decode($tableau[17]).'" style="text-decoration:none;">Facebook</a><br/></p>'; };

if (base64_decode($tableau[18])=='') {echo '';}
else { echo'<p><a href="https://plus.google.com/'.base64_decode($tableau[18]).'" style="text-decoration:none;">Google+</a><br/></p>'; };

if (base64_decode($tableau[16])=='') {echo '';}
else { echo'<p><a href="https://twitter.com/'.base64_decode($tableau[16]).'" style="text-decoration:none;">Twitter</a></p>'; };

echo'</td></tr></table></div>'; 

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

$file = 'http://julien-et-nel.be/UAG/UAG-1-97.txt';
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

$valideforma = array( '0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');

foreach ($valideforma as $valideforma1) { $_POST[$valideforma1] = str_replace(array('-','php'),array('-',''), $_POST[$valideforma1]); };

$valideformb = array( '0','1','2','3','4','5','6');

foreach ($valideformb as $valideformb1) { ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[$valideformb1],null,'UTF-8')))))); };

ajout($fichier,trim(base64_encode(stripslashes((sha1($_POST[7].$salt))))));	

$valideformc = array( '8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');

foreach ($valideformc as $valideformc1) { ajout($fichier,trim(base64_encode(stripslashes((htmlentities($_POST[$valideformc1],null,'UTF-8')))))); };

}

else {
  
error_reporting(0);

echo'<form action="index.php?page=configuration&id=2" method="post">
	
<div class="coda-slider"  id="main-slider">
<div>
<div class="coda-slider"  id="showcase">';
 
if (base64_decode($tableau[4])==on) {$paginationOn = 'selected="selected"';}
elseif (base64_decode($tableau[4])==off) {$paginationOff = 'selected="selected"';}
else {$paginationOn = 'selected="selected"';}

echo'<div>
<h2 class="title" style="display:none;">'.Accueil.'</h2>
<table style="margin:auto;padding-right:60px;">
<p><b>'.BienvenueConfig.'</b></p><br/>
<tr><td style="padding-left:10px;padding-top:10px;">'.General.'</td><td style="padding-left:20px;padding-top:10px;">'.Generala.'</td> </tr>
<tr><td style="padding-left:10px;padding-top:10px;">'.Profil.'</td><td style="padding-left:20px;padding-top:10px;">'.Profila.'</td> </tr>
<tr><td style="padding-left:10px;padding-top:10px;">'.Theme.'</td><td style="padding-left:20px;padding-top:10px;">'.Themea.'</td> </tr>
<tr><td style="padding-left:10px;padding-top:10px;">'.Menu.'</td><td style="padding-left:20px;padding-top:10px;">'.Menua.'</td> </tr>
</table>
</div>
<div>
<h2 class="title" style="display:none;">Général</h2>
<table style="margin:auto;padding-right:60px;">
<tr>
<td class="titre"></br>'.Titre.'  &nbsp;</td><td></br><input type="text" name="0" value="'.base64_decode($tableau[0]).'" placeholder="'.Titreb.'" STYLE="width:170px;" /></td></tr>
';

echo '<tr><td class="titre"></br>'.Langue.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[1]).'" name="1" STYLE="width:180px;">';

$languages = array(

'en' => $selected3, 
'es' => $selected4,
'fr' => $selected5,
'nl' => $selected6 

);

foreach ($languages as $languages1 => $languages2) { 

if (base64_decode($tableau[1])==$languages1) {$languages2 = 'selected="selected"';}

echo'<option '.$languages2.'>'.$languages1.'</option>';
 
 };

echo'</SELECT></td></tr>

<tr><td class="titre"></br>'.Gerant.'  &nbsp;</td><td></br><input type="text" required name="2" value="'.base64_decode($tableau[2]).'" placeholder="'.Webmasterb.'" STYLE="width:170px;"/></td>
</tr><tr>
<td class="titre"></br>Disqus  &nbsp;</td><td></br><input type="text" name="3" value="'.base64_decode($tableau[3]).'" placeholder="ID DISQUS" STYLE="width:170px;"/></td></tr>
<tr>
<td class="titre"></br>'.Pagination.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[4]).'" name="4" STYLE="width:180px;">
<option value="on" '.$paginationOn.'>Nouveau à Ancien</option>
<option value="off" '.$paginationOff.'>Ancien à nouveau</option>
</select></td>
</tr><tr><td class="titre"></br>'.AdresseSite.'  &nbsp;</td><td></br>

<input type="text" name="5"  required value="'.base64_decode($tableau[5]).'" placeholder="'.Urlb.'" STYLE="width:170px;"/></td></tr>

<tr>
<td class="titre"></br>'.Login.'  &nbsp;</td><td></br><input type="text" required name="6" value="'.base64_decode($tableau[6]).'" placeholder="'.Loginb.'" STYLE="width:170px;" alt=""/></td>
</tr>';

if (base64_decode($tableau[8])==on) {$selectedon = 'selected="selected"';}

elseif (base64_decode($tableau[8])==on2) {$selectedon2 = 'selected="selected"';}

elseif (base64_decode($tableau[8])==off) {$selectedoff = 'selected="selected"';}

echo'<tr><td class="titre"></br>URL Rewriting  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[8]).'" name="8" STYLE="width:180px;">
<OPTION VALUE="on" '.$selectedon.'>Url Sans titre</OPTION>
<OPTION VALUE="on2" '.$selectedon2.'>Url avec Titre</OPTION>
<OPTION VALUE="off" '.$selectedoff.'>Pas de r&eacute;ecriture</OPTION>
</SELECT></td></tr>';

if (base64_decode($tableau[9])==on) {$selected1 = 'selected="selected"';}

elseif (base64_decode($tableau[9])==off) {$selected2 = 'selected="selected"';}

echo'<tr><td class="titre"></br>'.LienAdmin.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[9]).'" name="9" STYLE="width:180px;">
<OPTION VALUE="on" '.$selected1.'>Afficher</OPTION>
<OPTION VALUE="off" '.$selected2.'>Cacher</OPTION>
</SELECT></td></tr>';

if (base64_decode($tableau[10])==on) {$selecteddate1 = 'selected="selected"';}

elseif (base64_decode($tableau[10])==off) {$selecteddate2 = 'selected="selected"';}

echo'<tr><td class="titre"></br>'.Date.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[10]).'" name="10" STYLE="width:180px;">
<OPTION VALUE="on" '.$selecteddate1.'>Lettre</OPTION>
<OPTION VALUE="off" '.$selecteddate2.'>Chiffre</OPTION>
</SELECT></td></tr>

</table>
</div>

<div>
<h2 class="title" style="display:none;">'.Profil.'</h2>
<table style="margin:auto;padding-right:60px;">
<tr>
<td class="profil"></br>'.Prenom.'  &nbsp;</td><td></br><input type="text" name="11" value="'.base64_decode($tableau[11]).'" placeholder="'.Prenoma.'" STYLE="width:170px;" /></td>
</tr><tr>
<td class="profil"></br>'.Nom.'  &nbsp;</td><td></br><input type="text" name="12" value="'.base64_decode($tableau[12]).'" placeholder="'.Noma.'" STYLE="width:170px;" /></td>
</tr>
<tr>
<td class="profil"></br>'.Datedenaissance.'  &nbsp;</td><td></br>
<SELECT value="'.base64_decode($tableau[13]).'" name="13" STYLE="width:62px;">';

$year = array(

''.Annee.'' => $an0a,
(date('Y')+0) => $an0b, 
(date('Y')-1) => $an1,
(date('Y')-2) => $an2, 
(date('Y')-3) => $an3, 
(date('Y')-4) => $an4,
(date('Y')-5) => $an5, 
(date('Y')-6) => $an6,
(date('Y')-7) => $an7, 
(date('Y')-8) => $an8, 
(date('Y')-9) => $an9,
(date('Y')-10) => $an10, 
(date('Y')-11) => $an11,
(date('Y')-12) => $an12, 
(date('Y')-13) => $an13, 
(date('Y')-14) => $an14,
(date('Y')-15) => $an15, 
(date('Y')-16) => $an16,
(date('Y')-17) => $an17, 
(date('Y')-18) => $an18, 
(date('Y')-19) => $an19,
(date('Y')-20) => $an20, 
(date('Y')-21) => $an21,
(date('Y')-22) => $an22, 
(date('Y')-23) => $an23, 
(date('Y')-24) => $an24,
(date('Y')-25) => $an25, 
(date('Y')-26) => $an26,
(date('Y')-27) => $an27, 
(date('Y')-28) => $an28, 
(date('Y')-29) => $an29,
(date('Y')-30) => $an30, 
(date('Y')-31) => $an31,
(date('Y')-32) => $an32, 
(date('Y')-33) => $an33, 
(date('Y')-34) => $an34,
(date('Y')-35) => $an35, 
(date('Y')-36) => $an36,
(date('Y')-37) => $an37, 
(date('Y')-38) => $an38, 
(date('Y')-39) => $an39,
(date('Y')-40) => $an40, 
(date('Y')-41) => $an41,
(date('Y')-42) => $an42, 
(date('Y')-43) => $an43, 
(date('Y')-44) => $an44,
(date('Y')-45) => $an45, 
(date('Y')-46) => $an46,
(date('Y')-47) => $an47, 
(date('Y')-48) => $an48, 
(date('Y')-49) => $an49,
(date('Y')-50) => $an50, 
(date('Y')-51) => $an51,
(date('Y')-52) => $an52, 
(date('Y')-53) => $an53, 
(date('Y')-54) => $an54,
(date('Y')-55) => $an55, 
(date('Y')-56) => $an56,
(date('Y')-57) => $an57, 
(date('Y')-58) => $an58, 
(date('Y')-59) => $an59,
(date('Y')-60) => $an60, 
(date('Y')-61) => $an61,
(date('Y')-62) => $an62, 
(date('Y')-63) => $an63, 
(date('Y')-64) => $an64,
(date('Y')-65) => $an65, 
(date('Y')-66) => $an66,
(date('Y')-67) => $an67, 
(date('Y')-68) => $an68, 
(date('Y')-69) => $an69,
(date('Y')-70) => $an70, 
(date('Y')-71) => $an71,
(date('Y')-72) => $an72, 
(date('Y')-73) => $an73, 
(date('Y')-74) => $an74,
(date('Y')-75) => $an75, 
(date('Y')-76) => $an76,
(date('Y')-77) => $an77, 
(date('Y')-78) => $an78, 
(date('Y')-79) => $an79,
(date('Y')-80) => $an80, 
(date('Y')-81) => $an81,
(date('Y')-82) => $an82, 
(date('Y')-83) => $an83, 
(date('Y')-84) => $an84,
(date('Y')-85) => $an85, 
(date('Y')-86) => $an86,
(date('Y')-87) => $an87, 
(date('Y')-88) => $an88, 
(date('Y')-89) => $an89,
(date('Y')-90) => $an90, 
(date('Y')-91) => $an91,
(date('Y')-92) => $an92, 
(date('Y')-93) => $an93, 
(date('Y')-94) => $an94,
(date('Y')-95) => $an95, 
(date('Y')-96) => $an96,
(date('Y')-97) => $an97, 
(date('Y')-98) => $an98, 
(date('Y')-99) => $an99,
(date('Y')-100) => $an100, 
(date('Y')-101) => $an101,
(date('Y')-102) => $an102, 
(date('Y')-103) => $an103, 
(date('Y')-104) => $an104,
(date('Y')-105) => $an105, 
(date('Y')-106) => $an106,
(date('Y')-107) => $an107, 
(date('Y')-108) => $an108, 
(date('Y')-109) => $an109,
(date('Y')-110) => $an110, 
(date('Y')-111) => $an111,
(date('Y')-112) => $an112, 
(date('Y')-113) => $an113, 
(date('Y')-114) => $an114,
(date('Y')-115) => $an115, 
(date('Y')-116) => $an116,
(date('Y')-117) => $an117, 
(date('Y')-118) => $an118, 
(date('Y')-119) => $an119,
(date('Y')-120) => $an120,
(date('Y')-121) => $an121,
(date('Y')-122) => $an122  

);

foreach ($year as $year1 => $year2) { 
if (base64_decode($tableau[13])==$year1) {$year2 = 'selected="selected"';};
echo'<option '.$year2.'>'.$year1.'</option>';
 };

echo'

</SELECT>
 
<SELECT value="'.base64_decode($tableau[28]).'" name="28" STYLE="width:55px;">';

$month = array(

''.Mois.'' => $mois0,
'01' => $mois1, 
'02' => $mois2,
'03' => $mois3,
'04' => $mois4,
'05' => $mois5, 
'06' => $mois6,
'07' => $mois7,
'08' => $mois8,
'09' => $mois9, 
'10' => $mois10,
'11' => $mois11,
'12' => $mois12 

);

foreach ($month as $month1 => $month2) { 
if (base64_decode($tableau[28])==$month1) {$month2 = 'selected="selected"';}
echo'<option '.$month2.'>'.$month1.'</option>';
 };
 
echo'</SELECT>
<SELECT value="'.base64_decode($tableau[29]).'" name="29" STYLE="width:55px;">';

$day = array(

''.Jour.'' => $jour0,
'01' => $jour1, 
'02' => $jour2,
'03' => $jour3,
'04' => $jour4,
'05' => $jour5, 
'06' => $jour6,
'07' => $jour7,
'08' => $jour8,
'09' => $jour9, 
'10' => $jour10,
'11' => $jour11,
'12' => $jour12,
'13' => $jour13,
'14' => $jour14,
'15' => $jour15, 
'16' => $jour16,
'17' => $jour17,
'18' => $jour18,
'19' => $jour19, 
'20' => $jour20,
'21' => $jour21,
'22' => $jour22,
'23' => $jour23,
'24' => $jour24,
'25' => $jour25, 
'26' => $jour26,
'27' => $jour27,
'28' => $jour28,
'29' => $jour29, 
'30' => $jour30,
'31' => $jour31

);

foreach ($day as $day1 => $day2) { 
if (base64_decode($tableau[29])==$day1) {$day2 = 'selected="selected"';}
echo'<option '.$day2.'>'.$day1.'</option>';
 };

echo'</SELECT></td></tr><tr>
<td class="profil"></br>'.Paysa.' &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[14]).'" name="14" STYLE="width:180px;">';

$world = array(

''.Monde.'' => $pays1, 
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
if (base64_decode($tableau[14])==$world1) {$world2 = 'selected="selected"';};
echo'<option '.$world2.'>'.$world1.'</option>';
 } 

echo'
</select>
</td></tr><tr>
<td class="profil"></br>'.Photo.'  &nbsp;</td><td></br><input type="text" name="15" value="'.base64_decode($tableau[15]).'" placeholder="'.Photoa.'" STYLE="width:170px;" /></td>
</tr>
<tr>
<td class="profil"></br>'.Twitter.'  &nbsp;</td><td></br><input type="text" name="16" value="'.base64_decode($tableau[16]).'" placeholder="'.Twittera.'" STYLE="width:170px;" /></td>
</tr>
<tr>
<td class="profil"></br>'.Facebook.'  &nbsp;</td><td></br><input type="text" name="17" value="'.base64_decode($tableau[17]).'" placeholder="'.Facebooka.'" STYLE="width:170px;" /></td>
</tr>
<tr>
<td class="profil"></br>'.Googleplus.'  &nbsp;</td><td></br><input type="text" name="18" value="'.base64_decode($tableau[18]).'" placeholder="'.Googleplusa.'" STYLE="width:170px;" /></td>
</tr>
<tr>
<td class="profil"></br>'.Activite.'</td><td></br><input type="text" name="19" value="'.base64_decode($tableau[19]).'" placeholder="'.Activitea.'" STYLE="width:170px;" /></td>
</tr>
<tr>
<td class="profil"></br>'.Biographie.'</td><td></br><input type="text" name="20" value="'.base64_decode($tableau[20]).'" placeholder="'.Biographiea.'" STYLE="width:170px;" /></td>
</tr>
<tr>
<td class="profil"></br>'.Loisirsa.'</td><td></br><input type="text" name="21" value="'.base64_decode($tableau[21]).'" placeholder="'.Loisirsaa.'" STYLE="width:170px;" /></td>
</tr>
</table>
</div>

<div>
<h2 class="title" style="display:none;">Theme</h2>
<table style="margin:auto;padding-right:60px;">
<tr>
<td COLSPAN=4><center><br/><b>'.Banniere.'</b></center></td>
</tr>

<tr>
<td class="titre"></br>'.Lienc.' &nbsp;</td><td></br><input type="text" name="26" value="'.base64_decode($tableau[26]).'" placeholder="'.LienBanniere.'" STYLE="width:170px;" /></td>
</tr><tr>
<td class="profil"></br>'.Titrec.' &nbsp;</td><td></br><input type="text" name="27" value="'.base64_decode($tableau[27]).'" placeholder="'.TitreBanniere.'" STYLE="width:170px;" /></td>
</tr>

<tr>
<td COLSPAN=4><center><br/><b>Background & Favicon</b></center></td>
</tr>

<tr>
<td class="titre"></br>Background &nbsp;</td><td></br><input type="text" name="30" value="'.base64_decode($tableau[30]).'" placeholder="'.LienBackground.'" STYLE="width:170px;" /></td>
</tr><tr>
<td class="profil"></br>Favicon &nbsp;</td><td></br><input type="text" name="31" value="'.base64_decode($tableau[31]).'" placeholder="'.LienFavicon.'" STYLE="width:170px;" /></td>
</tr>
</table>
</div>
  
<div>
<h2 class="title" style="display:none;">Menu</h2>
<table style="margin:auto;padding-right:60px;">
<tr>
<td COLSPAN=4><center><br/><b>'.Menu.'</b></center></td>
</tr>

<tr>
<td class="titre"></br>'.Titrec.' A  &nbsp;</td><td></br><input type="text" name="22" value="'.base64_decode($tableau[22]).'" placeholder="'.Titred.' A" STYLE="width:170px;" /></td>
</tr><tr>
<td class="profil"></br>'.Lienc.' A  &nbsp;</td><td></br><input type="text" name="23" value="'.base64_decode($tableau[23]).'" placeholder="'.Liend.' A" STYLE="width:170px;" /></td>
</tr>

<tr>
<td class="titre"></br>'.Titrec.' B  &nbsp;</td><td></br><input type="text" name="24" value="'.base64_decode($tableau[24]).'" placeholder="'.Titred.' B" STYLE="width:170px;" /></td>
</tr><tr>
<td class="profil"></br>'.Lienc.' B  &nbsp;</td><td></br><input type="text" name="25" value="'.base64_decode($tableau[25]).'" placeholder="'.Liend.' B" STYLE="width:170px;" /></td>
</tr>
</table>
</div>
</div>

<table style="margin:auto;padding-right:0px;">
<tr>
<td class="titre"></br>'.Code.'  &nbsp;</td><td></br><input type="password" autocomplete="off" required name="7" value="" placeholder="'.Codea.'" STYLE="width:170px;" alt=""/ ></td>
</tr>  
</table>
		
<br/> 

<center>
<input class="submit" type="submit" value="'.Ok.'" name="submit" />
</center>
</form>
';

};

echo'
</div>
</div>
';
echo'</body>';
}

/* La liste des News dans l'administration */

function liste_news() {

$fichier='configuration.txt';
$tableau=array();
$tableau=lire_array($fichier);

echo'<table class="data" style="border-collapse: collapse !important ;"><thead><tr>
<th style="width:300px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Titre.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Date.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Auteur.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Supprimer.'</center></th><th style="width:100px;border:1px solid #CCCCCC; text-transform: uppercase; background-color:#E2E2E2;"><center>'.Editer.'</center></th></tr></thead></table>';
 
$liste_news = unserialize(base64_decode(file_get_contents('../news.php')));
if(!empty($liste_news)) {
	foreach($liste_news as $id => $news) {

echo'<table class="data" style="border-collapse: collapse !important ;">
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

'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Content.png" alt=":)" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Embarrassed.png" alt=":(" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Grin.png" alt="XD" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Laughing.png" alt=":D" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Yuck.png" alt=":p" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Gasp.png" alt=":o" class="" />'
,'<br />'
,'<br />'
,' '
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/HeartEyes.png" alt="<3" class="" />'

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
<label for="pseudo">'.Auteur.'</label> :<strong> '.base64_decode($tableau[2]).'</strong> -  <label for="titre">'.Titre.' : </label> <input type="text" required name="titre" id="titre" placeholder="'.Articla.'" /> -  

<label for="jour">'.Jour.'</label> : <SELECT name="jour" id="jour" STYLE="width:70px;">';

$days = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');  

foreach ($days as $d) { 
echo'<OPTION>'.$d.'</OPTION>';
 } 

echo'</SELECT>
-
<label for="mois">'.Mois.'</label> : <SELECT name="mois" id="mois" STYLE="width:70px;">';

$month = array('01','02','03','04','05','06','07','08','09','10','11','12');  

foreach ($month as $m) { 
echo'<OPTION>'.$m.'</OPTION>';
 } 
 
echo'</SELECT>
-
<label for="annee">'.Annee.'</label> : <SELECT name="annee" id="annee" STYLE="width:70px;">
<OPTION>'.(date('Y')+0).'</OPTION>
<OPTION>'.(date('Y')-1).'</OPTION>
<OPTION>'.(date('Y')-2).'</OPTION>
<OPTION>'.(date('Y')-3).'</OPTION>
<OPTION>'.(date('Y')-4).'</OPTION>
</SELECT>

<br /><br /><label for="chapo"> '.Chapo.' : </label><input type="text" required name="chapo" id="chapo" rows="" cols="" placeholder="'.Articlb.'" style="width: 82%;"/><br /><br />';

include ('includes/smiley.php');

echo'<textarea name="contenu" id="contenu" rows="" cols="" style="width: 100%;height: 400px;"></textarea>
<br/><label for="note">'.Note.'</label> : <SELECT name="note" id="note" STYLE="width:70px;">';

$notes = array( 'Off','1','2','3','4','5');

foreach ($notes as $notesA) { echo'<option>'.$notesA.'</option>'; };

echo'</SELECT>&nbsp; &nbsp;<b>'.Nota.'</b> .<br/><br/><center><input type="submit" value="'.Ok.'" /></center></form>';
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

'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Content.png" alt=":)" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Embarrassed.png" alt=":(" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Grin.png" alt="XD" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Laughing.png" alt=":D" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Yuck.png" alt=":p" class="" />'
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/Gasp.png" alt=":o" class="" />'
,'<br />'
,'<br />'
,' '
,'<img src="'.base64_decode($tableau[5]).'/admin/images/smileys/HeartEyes.png" alt="<3" class="" />'

), $news[$newsAmodifier]['contenu']);

	$news[$newsAmodifier]['chapo'] = htmlentities($_POST['chapo'],null,'UTF-8');
	$news[$newsAmodifier]['note'] = htmlentities($_POST['note'],null,'UTF-8');
	file_put_contents('../news.php', base64_encode(serialize($news)));
	echo '<div id="valide"><p>La news a bien &eacute;t&eacute; edit&eacute;e.</p></div>';
	echo '<br />';
	echo '<center><a href="index.php?page=liste">Retour</a></center>';
} else {

	echo'<form action="" method="POST">
	'.Auteur.' : <strong>'.base64_decode($tableau[2]).'</strong> - <label for="titre">'.Titre.' : </label> <input type="text" required name="titre" id="titre"  placeholder="'.Articla.'" value="'.$news[$newsAmodifier]['titre'].'" /> -  
<label for="jour">'.Jour.' : </label> <input type="text" name="jour" id="jour" value="'.$news[$newsAmodifier]['jour'].'" STYLE="width:70px;" readonly="readonly"/ > 
- <label for="mois">'.Mois.' : </label> <input type="text" name="mois" id="mois" value="'.$news[$newsAmodifier]['mois'].'" STYLE="width:70px;" readonly="readonly" /> 
- <label for="annee">'.Annee.' : </label> <input type="text" name="annee" id="annee" value="'.$news[$newsAmodifier]['annee'].'" STYLE="width:70px;" readonly="readonly" /> 
<br /><br /><label for="chapo">'.Chapo.' : </label><input type="text" required placeholder="'.Articlb.'" name="chapo" id="chapo" rows="" cols="" value="'.$news[$newsAmodifier]['chapo'].'" style="width: 82%;"/><br /><br />';

include ('includes/smiley.php');

echo'<textarea name="contenu" id="contenu" rows="" cols="" style="width: 100%;height: 400px;">'.$news[$newsAmodifier]['contenu'].'</textarea>
	
<br/><label for="note">'.Note.'</label> : <SELECT name="note" id="note" STYLE="width:70px;">';

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

echo'</SELECT>&nbsp; &nbsp;<b>'.Nota.'</b> .<br/>
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