<?php

$filename = 'configuration.txt';

if (filesize($filename) > 0) {} 

else { header('Location: ../install.php'); } 

include('./verif.php');
error_reporting(0); 
include 'langues.php';
require 'fonctions.php';

echo'
<style type="text/css">
html{
background:none !important;
};
</style>
<link rel="stylesheet" href="defaut.css" />
<link rel="stylesheet" href="defaut2.css" />
<link rel="stylesheet" href="jquery/css/ui-lightness/jquery-ui-1.10.2.custom.css" />
<script src="js/jquery.coda-slider-3.0.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script>
      $(function() {
        $(\'#main-slider\').codaSlider({
          autoHeight: false,
          continuous:false,
          dynamicArrows: false,
          dynamicTabs: false
        });
        $(\'#showcase\').codaSlider();
        $(\'#continuous\').codaSlider({
          autoSlide: false,
          continuous: false,
          dynamicArrowsGraphical: false,
          dynamicTabsAlign: "right",
          dynamicTabsPosition: "bottom",
          panelTitleSelector: "div.title"
        });
        $(\'#dynamic-tabs\').codaSlider({
          autoSlideControls:false,
          dynamicTabsAlign: "left",
          dynamicTabsPosition: "top",
          dynamicArrows: false
        })
        $(\'#information\').codaSlider({
          dynamicArrows: false,
          dynamicTabs: false,
          slideEaseFunction: "easeOutCirc"
        });
      });
      </script>
<body onload="whizzywig()">';

switch ($_GET['page'])
{

case 'liste': liste_news(); break;

case 'supprimer': supprimer_news(); break;

case 'ajouter': anti_slash(); ajout_news(); break;

case 'editer': anti_slash(); editer_news(); break;

case 'images': formulaire_images(); images(); break;

case 'upload': envoyer_images(); break;

case 'delete': supprimer_images(); break;

case 'configuration': configuration(); break;

case 'blog': blog(); break;

default : ;
}

?>