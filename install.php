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

?>

<title>UAG CMS : Installation du CMS</title>

<style type="text/css">body {margin: 0; } #titre {font-weight: 400;text-align:center;color: #777777;font-size: 20px;width:600px;} #retour a:hover {font-weight: bold;} a {color: #777777;text-decoration: none;} #retour {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 24px 24px 24px;text-align:center;color: #777777;font-size: 12px;width:600px;} #page { margin: auto; width: 600px;} #UAG{text-align:center;font-size: 9px;color: #666666;}#Ok input{color: black;font-weight: 700;background: #DDDDDD !important;border:1px solid #2E83D9;font-size: 14px;} #login form {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 0px 24px 24px;text-align:center;color: #777777;font-size: 14px;width:600px;} #login input { box-shadow: inset 1px 1px 2px rgba(200, 200, 200, 0.196);border:1px solid #BBBBBB;background: #F5F5F5; }</style>

<?php
error_reporting(0); 
require 'admin/fonctions.php';

function lire_array($fichier)
{
if (file_exists($fichier))
{
$contents = file_get_contents('admin/configuration.txt');
$tableau=array();
$tableau=explode("-",$contents);// transformation des données en array
return $tableau;
}
else echo 'Fichier  '.$fichier.' non trouvé (lecture)';
}

if ($_GET['page']=='2') {  

/******************************************/
function ajout($fichier,$ajout)
{
			$fichier;
	// Ouvrir le fichier en écriture
	if (file_exists($fichier)) { 
 		 $inF = fopen('admin/configuration.txt',"a"); //Mode Append	=> ajout	 
 	}else{
 		 $inF = fopen('admin/configuration.txt',"w"); // Le créer si introuvable
 	}
  fputs($inF,$ajout."-");
  fclose($inF);
}

	 if ($_GET['lang']=='fr') {   
 	 include('lang/fr-lang.php'); 
  	 }  
  	  
  	 else if ($_GET['lang']=='en') {   
 	 include('lang/en-lang.php'); 
  	 } 

	 else if ($_GET['lang']=='es') {   
 	 include('lang/es-lang.php'); 
  	 } 

	 else if ($_GET['lang']=='nl') {   
 	 include('lang/nl-lang.php'); 
  	 } 
  	  
  	 else {                       
  	 include('lang/fr-lang.php') ;
	 }

echo '<div id="page"><br/><div id="login"><form action="install.php?page=3&" method="post">';

$test01=substr(decoct(fileperms("admin/configuration.txt")),3);
$test02=substr(decoct(fileperms("images")),2);
$test03=substr(decoct(fileperms("news.php")),3);

echo '<div id="titre"><p>Installation de UAG CMS</p></div><p>'.CHMODCORRECT2.'</p>'.CHMODCORRECT.' :   <b>admin/configuration.txt [ ';

if ($test01=='666') { echo ''.OUI.''; } else {echo''.NON.'';};

echo' ]</b> - <b>Images [ ';

if ($test02=='777') { echo ''.OUI.''; } else {echo''.NON.'';};

echo' ] </b> - <b>News.php [ ';

if ($test03=='666') { echo ''.OUI.''; } else {echo''.NON.'';};

echo' ] </b><br/><center><table>';

echo '<tr><td class="titre"></br>'.Titre.'  &nbsp;</td><td></br><input type="text" name="0" value="'.$tableau[0].'" STYLE="width:180px;" /></td></tr><tr>';

if ($_GET['lang']=='') {   
echo'<td class="titre"></br>'.Langue.'  &nbsp;</td><td></br><input type="text" name="1" value="fr" STYLE="width:180px;" readonly="readonly" /></td></tr><tr>'; 	 
  	 }

else {
echo'<td class="titre"></br>'.Langue.'  &nbsp;</td><td></br><input type="text" name="1" value="'.$_GET['lang'].'" STYLE="width:180px;" readonly="readonly" /></td></tr><tr>';

	 }


echo '
<td class="titre"></br>'.Gerant.'  &nbsp;</td><td></br><input type="text" required name="2" value="'.$tableau[2].'" STYLE="width:180px;"/></td></tr><tr>

<td class="titre"></br>DISQUS  &nbsp;</td><td></br><input type="text" name="3" value="'.$tableau[3].'" STYLE="width:180px;"/></td></tr><tr>

<td class="titre"></br>'.Pagination.'  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[4]).'" name="4" STYLE="width:180px;">
<option value="on" '.$paginationOn.'>'.Pagingi.'</option>
<option value="off" '.$paginationOff.'>'.Pagingii.'</option>
</select></td></tr><tr>

<td class="titre"></br>Adresse site  &nbsp;</td><td></br>'; 

$lien = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$lien = str_replace('/install.php', '', $lien);

$filehtaccess = '.htaccess';
$current = file_get_contents($filehtaccess);
$current = "ErrorDocument 404 $lien/index.php?module=erreurs
ErrorDocument 403 $lien/index.php?module=erreurs

Options +FollowSymlinks
RewriteEngine on

RewriteRule ^article-([0-9]+)\.php$   index.php?module=articles&page=$1 [L]
RewriteRule ^([0-9]+)-([a-z0-9\-]+)\.php$   index.php?module=articles&page=$1 [L]

RewriteRule ^article-([0-9]+)\.php$   index2.php?module=articles&page=$1 [L]
RewriteRule ^([0-9]+)-([a-z0-9\-]+)\.php$   index2.php?module=articles&page=$1 [L]

RewriteRule ^feed$   rss.php [L]

<files .htaccess>
order allow,deny
deny from all
 </files>

 Options -Indexes

 AddDefaultCharset UTF-8
 
 ";
// Écrit le résultat dans le fichier
file_put_contents($filehtaccess, $current);

echo '

<input type="text" required name="5" readonly="readonly" value="'.$lien.'" placeholder="Adresse de votre site" STYLE="width:180px;"/>

</td>'; 

echo '</tr><tr>

<td class="titre"></br>'.Login.'  &nbsp;</td><td></br><input type="text" required name="6" value="'.$tableau[6].'" STYLE="width:180px;"/></td></tr><tr>

<td class="titre"></br>'.Code.'  &nbsp;</td><td></br><input type="password" required name="7" value="'.$tableau[7].'" STYLE="width:180px;"/></td></tr>

<tr>
<td class="titre"></br>URL Rewriting  &nbsp;</td><td></br><SELECT value="'.$tableau[8].'" name="8" STYLE="width:180px;">
<OPTION VALUE="on">'.urli.'</OPTION>
<OPTION VALUE="on2" selected="selected">'.urlii.'</OPTION>
<OPTION VALUE="off">'.urliii.'</OPTION>
</SELECT></td></tr>';echo "\n";

echo '<tr>
<td class="titre"></br>'.LienAdmin.'  &nbsp;</td><td></br><SELECT value="'.$tableau[9].'" name="9" STYLE="width:180px;">
		<OPTION VALUE="on">'.urliiii.'</OPTION>
		<OPTION VALUE="off" selected="selected">'.urliiiii.'</OPTION>
	</SELECT></td></tr>';echo "\n";

echo '<tr>
<td class="titre"></br>Date  &nbsp;</td><td></br><SELECT value="'.$tableau[10].'" name="10" STYLE="width:180px;">
		<OPTION VALUE="on">'.Lettre.'</OPTION>
		<OPTION VALUE="off">'.Chiffre.'</OPTION>
	</SELECT></td></tr>';echo "\n";

echo '</table></center></br>';echo "\n";
echo'<div id="Ok"><input class="submit" type="submit" value="'.Ok.'" name="submit"/></div></form></div></div>';  

  	 } 


if ($_GET['page']=='3') { 

/******************************************/
function ajout($fichier,$ajout)
{
			$fichier;
	// Ouvrir le fichier en écriture
	if (file_exists($fichier)) { 
 		 $inF = fopen('admin/configuration.txt',"a"); //Mode Append	=> ajout	 
 	}else{
 		 $inF = fopen('admin/configuration.txt',"w"); // Le créer si introuvable
 	}
  fputs($inF,$ajout."-");
  fclose($inF);
}

include('lang/'.$_GET['lang'].'-lang.php');

echo'<meta http-equiv="refresh" content="1; URL=index.php">
<p style="color:green">'.Install.'</p>';

// Fichier de transition pour écupérer les données du formulaire

 	 $f=fopen('admin/configuration.txt',"w");fclose($f); // on efface le fichier, on le crée à nouveau (vide)
	 
$salt = 'BwGk15l8WX'; 

$valideforma = array( '0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');

foreach ($valideforma as $valideforma1) { $_POST[$valideforma1] = str_replace(array('-','php'),array('-',''), $_POST[$valideforma1]); };

$valideformb = array( '0','1','2','3','4','5','6');

foreach ($valideformb as $valideformb1) { ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[$valideformb1],null,'UTF-8')))))); };

ajout('admin/configuration.txt',trim(base64_encode(stripslashes((sha1($_POST[7].$salt))))));	

$valideformc = array( '8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');

foreach ($valideformc as $valideformc1) { ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[$valideformc1],null,'UTF-8')))))); };

  	 } 


else {

/******************************************/
function ajout($fichier,$ajout)
{
			$fichier;
	// Ouvrir le fichier en écriture
	if (file_exists($fichier)) { 
 		 $inF = fopen('admin/configuration.txt',"a"); //Mode Append	=> ajout	 
 	}else{
 		 $inF = fopen('admin/configuration.txt',"w"); // Le créer si introuvable
 	}
  fputs($inF,$ajout."-");
  fclose($inF);
}
  
echo '<div id="page"><br/><div id="login"><form>';
echo '<div id="titre">Installation de UAG CMS</div><br/>LANGUAGE : <b> <a href="install.php?page=2&lang=en">English<a> - <a href="install.php?page=2&lang=es">Espanol</a> - <a href="install.php?page=2&lang=fr">Francais</a> - <a href="install.php?page=2&lang=nl">Nederlands</a></b><br/><center>';


echo '</center></br>';echo "\n";
echo'<div id="Ok"></div></form></div></div>'; 

}

?>
