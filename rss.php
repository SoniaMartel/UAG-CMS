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

header('Content-Type: text/html; charset=UTF-8');
echo "<?".'xml version="1.0" encoding="UTF-8"'."?>"."\n";

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

echo '<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">'."\n";
echo '<channel>'."\n";

$xml = '<title>'.base64_decode($tableau[0]).'</title>'."\n";
$xml .= '<link></link>'."\n"; 
$xml .= '<description></description>'."\n"; 
$xml .= '<language>fr</language>'."\n"; 
$xml .= '<copyright></copyright>'."\n";

$liste = unserialize(base64_decode(file_get_contents('news.php')));
foreach ($liste as $file => $article) {

$item = '<item>'."\n";
$item .= '<title>'.$article['titre'].'</title>'."\n";
$item .= '<guid></guid>'."\n";
$item .= '<link></link>'."\n";
$item .= '<pubDate>'.$article['annee'].'/'.$article['mois'].'/'.$article['jour'].'</pubDate>'."\n";
$item .= '<description><![CDATA['.$article['contenu'].']]></description>'."\n";
$xml .= $item.'</item>'."\n";
			
}

echo $xml;

echo '</channel>'."\n";
echo '</rss>';

?>
