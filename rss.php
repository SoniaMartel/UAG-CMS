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

header("Content-type: application/rss+xml; charset=UTF-8");
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

echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">'."\n";
echo '<channel>'."\n";

$xml = '<title>'.base64_decode($tableau[0]).'</title>'."\n";
$xml .= '<link>http://'.$_SERVER['SERVER_NAME'].'</link>'."\n"; 
$xml .= '<atom:link href="http://'.$_SERVER['SERVER_NAME'].'/rss.php" rel="self" type="application/rss+xml" />'."\n"; 
$xml .= '<description></description>'."\n"; 
$xml .= '<language>fr</language>'."\n"; 
$xml .= '<copyright></copyright>'."\n";

$liste = unserialize(base64_decode(file_get_contents('news.php')));
krsort($liste);

foreach ($liste as $file => $article) {

$timestamp = mktime (0, 0, 0, $article['mois'], $article['jour'], $article['annee']);
$date822 = date("r", $timestamp);

$article['titre'] = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i","\\1", $article['titre'] );
$article['titre'] = preg_replace("`\[.*\]`U","",$article['titre']);
$article['titre'] = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$article['titre']);
$article['titre'] = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $article['titre']);
$article['titre'] = ( $article['titre'] == "" ) ? $type : strtolower(trim($article['titre'], '-'));

$item = '<item>'."\n";
$item .= '<title>'.$article['titre'].'</title>'."\n";
$item .= '<guid isPermaLink="false">'.$article['titre'].'</guid>'."\n";
$item .= '<link>http://'.$_SERVER['SERVER_NAME'].'</link>'."\n";
$item .= '<pubDate>'.$date822.'</pubDate>'."\n";
$item .= '<description><![CDATA['.$article['contenu'].']]></description>'."\n";
$xml .= $item.'</item>'."\n";
			
}

echo $xml;

echo '</channel>'."\n";
echo '</rss>';

?>
