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

<style type="text/css">body {margin: 0; } #titre {font-weight: 400;text-align:center;color: #777777;font-size: 20px;width:600px;} #retour a:hover {font-weight: bold;} a {color: #777777;text-decoration: none;} #retour {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 24px 24px 24px;text-align:center;color: #777777;font-size: 12px;width:600px;} #page { margin: auto; width: 600px;} #UAG{text-align:center;font-size: 9px;color: #666666;}#Ok input{color: black;font-weight: 700;background: #DDDDDD !important;border:1px solid #2E83D9;font-size: 14px;} #login form {box-shadow: rgba(200, 200, 200, 0.702) 0px 4px 10px -1px;border: 1px solid #E5E5E5;background: #FFFFFF;font-weight: 400;padding: 24px 24px 24px;text-align:center;color: #777777;font-size: 14px;width:600px;} #login input { box-shadow: inset 1px 1px 2px rgba(200, 200, 200, 0.196);border:1px solid #BBBBBB;background: #F5F5F5; }</style>

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
echo '<div id="titre">Installation de UAG CMS</div><br/>CHMOD 777 :  "<b>admin/configuration.txt [ '.substr(decoct(fileperms("admin/configuration.txt")),3).' ]</b>", "<b>Images [ '.substr(decoct(fileperms("images")),2).' ] </b> et "<b>News.php [ '.substr(decoct(fileperms("news.php")),3).' ] </b>"<br/><center><table>';

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

<td class="titre"></br>Pagination  &nbsp;</td><td></br><SELECT value="'.base64_decode($tableau[4]).'" name="4" STYLE="width:180px;">
<option value="on" '.$paginationOn.'>Nouveau vers Ancien</option>
<option value="off" '.$paginationOff.'>Ancien vers nouveau</option>
</select></td></tr><tr>

<td class="titre"></br>Adresse site  &nbsp;</td><td></br>'; 

echo '

<input type="text" required name="5" value="'.base64_decode($tableau[5]).'" placeholder="Adresse de votre site" STYLE="width:180px;"/>

</td>'; 

echo '</tr><tr>

<td class="titre"></br>'.Login.'  &nbsp;</td><td></br><input type="text" required name="6" value="'.$tableau[6].'" STYLE="width:180px;"/></td></tr><tr>

<td class="titre"></br>'.Code.'  &nbsp;</td><td></br><input type="password" required name="7" value="'.$tableau[7].'" STYLE="width:180px;"/></td></tr>

<tr>
<td class="titre"></br>URL Rewriting  &nbsp;</td><td></br><SELECT value="'.$tableau[8].'" name="8" STYLE="width:180px;">
<OPTION VALUE="on">Url Sans titre</OPTION>
<OPTION VALUE="on2">Url avec Titre</OPTION>
<OPTION VALUE="off">Pas de r&eacute;ecriture</OPTION>
</SELECT></td></tr>';echo "\n";

echo '<tr>
<td class="titre"></br>Lien Admin  &nbsp;</td><td></br><SELECT value="'.$tableau[9].'" name="9" STYLE="width:180px;">
		<OPTION VALUE="on">Afficher</OPTION>
		<OPTION VALUE="off">Cacher</OPTION>
	</SELECT></td></tr>';echo "\n";

echo '<tr>
<td class="titre"></br>Date  &nbsp;</td><td></br><SELECT value="'.$tableau[10].'" name="10" STYLE="width:180px;">
		<OPTION VALUE="on">Lettre</OPTION>
		<OPTION VALUE="off">Chiffre</OPTION>
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

?>

<meta http-equiv="refresh" content="1; URL=index.php">
<p style="color:green">Installation effectu&eacute;e !</p>
<?php 
// Fichier de transition pour écupérer les données du formulaire

 	 $f=fopen('admin/configuration.txt',"w");fclose($f); // on efface le fichier, on le crée à nouveau (vide)
	 
$salt = 'BwGk15l8WX'; 

$_POST[0] = str_replace('-', ':)', $_POST[0]);	
$_POST[0] = str_replace('php', '', $_POST[0]);				 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[0]))))));
$_POST[1] = str_replace('-', ':)', $_POST[1]);		
$_POST[1] = str_replace('php', ':)', $_POST[1]);		 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[1]))))));
$_POST[2] = str_replace('-', ':)', $_POST[2]);	
$_POST[2] = str_replace('php', ':)', $_POST[2]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[2]))))));
$_POST[3] = str_replace('-', ':)', $_POST[3]);	
$_POST[3] = str_replace('php', ':)', $_POST[3]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[3]))))));
$_POST[4] = str_replace('-', ':)', $_POST[4]);	
$_POST[4] = str_replace('php', ':)', $_POST[4]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[4]))))));
$_POST[5] = str_replace('-', ':)', $_POST[5]);	
$_POST[5] = str_replace('php', ':)', $_POST[5]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[5]))))));
$_POST[6] = str_replace('-', ':)', $_POST[6]);
$_POST[6] = str_replace('php', ':)', $_POST[6]);				 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[6])))))); 
$_POST[7] = str_replace('-', ':)', $_POST[7]);	
$_POST[7] = str_replace('php', ':)', $_POST[7]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((sha1($_POST[7].$salt))))));
$_POST[8] = str_replace('-', ':)', $_POST[8]);	
$_POST[8] = str_replace('php', ':)', $_POST[8]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[8]))))));
$_POST[9] = str_replace('-', ':)', $_POST[9]);	
$_POST[9] = str_replace('php', ':)', $_POST[9]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[9]))))));
$_POST[10] = str_replace('-', ':)', $_POST[10]);	
$_POST[10] = str_replace('php', ':)', $_POST[10]);			 
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[10]))))));
$_POST[11] = str_replace(array('-','php'),array(':)',''), $_POST[11]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[11])))))); 
$_POST[12] = str_replace(array('-','php'),array(':)',''), $_POST[12]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[12])))))); 
$_POST[13] = str_replace(array('-','php'),array(':)',''), $_POST[13]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[13])))))); 
$_POST[14] = str_replace(array('-','php'),array(':)',''), $_POST[14]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[14])))))); 
$_POST[15] = str_replace(array('-','php'),array(':)',''), $_POST[15]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[15])))))); 
$_POST[16] = str_replace(array('-','php'),array(':)',''), $_POST[16]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[16])))))); 
$_POST[17] = str_replace(array('-','php'),array(':)',''), $_POST[17]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[17])))))); 
$_POST[18] = str_replace(array('-','php'),array(':)',''), $_POST[18]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[18])))))); 
$_POST[19] = str_replace(array('-','php'),array(':)',''), $_POST[19]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[19])))))); 
$_POST[20] = str_replace(array('-','php'),array(':)',''), $_POST[20]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[20])))))); 
$_POST[21] = str_replace(array('-','php'),array(':)',''), $_POST[21]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[21])))))); 
$_POST[12] = str_replace(array('-','php'),array(':)',''), $_POST[22]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[22])))))); 
$_POST[13] = str_replace(array('-','php'),array(':)',''), $_POST[23]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[23])))))); 
$_POST[14] = str_replace(array('-','php'),array(':)',''), $_POST[24]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[24])))))); 
$_POST[15] = str_replace(array('-','php'),array(':)',''), $_POST[25]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[25])))))); 
$_POST[16] = str_replace(array('-','php'),array(':)',''), $_POST[26]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[26])))))); 
$_POST[17] = str_replace(array('-','php'),array(':)',''), $_POST[27]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[27])))))); 
$_POST[18] = str_replace(array('-','php'),array(':)',''), $_POST[28]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[28])))))); 
$_POST[19] = str_replace(array('-','php'),array(':)',''), $_POST[29]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[29])))))); 
$_POST[20] = str_replace(array('-','php'),array(':)',''), $_POST[30]);
ajout('admin/configuration.txt',trim(base64_encode(stripslashes((htmlentities($_POST[30])))))); 

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
