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

if (filesize($filename) > 0) {} 

else { header('Location: install.php'); } 

error_reporting(0); 

include('lang/'.base64_decode($tableau[1]).'-lang.php');

require 'admin/fonctions.php';

echo'
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>UAG CMS</title>
<meta name="Description" content="" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="admin/defaut.css" />
<link rel="stylesheet" href="admin/defaut2.css" />
<link rel="shortcut icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="stylesheet" href="admin/jquery/css/ui-lightness/jquery-ui-1.10.2.custom.css" />
<script src="admin/js/jquery.min.js"></script>
<script src="admin/js/jquery-ui.min.js"></script>
<script src="admin/js/jquery.coda-slider-3.0.js"></script>';

?>

<script>
var _init = $.ui.dialog.prototype._init;
$.ui.dialog.prototype._init = function() {
   //Run the original initialization code
   _init.apply(this, arguments);
    
   //set some variables for use later
   var dialog_element = this;
   var dialog_id = this.uiDialogTitlebar.next().attr('id');
    
   //append our minimize icon
   this.uiDialogTitlebar.append('<a href="#" id="' + dialog_id +
   '-minbutton" class="ui-dialog-titlebar-minimize ui-corner-all">'+
   '<span class="ui-icon ui-icon-minusthick"></span></a>');
    
   //append our minimized state
   $('#dialog_window_minimized_container').append(
      '<div class="dialog_window_minimized ui-widget ui-state-default ui-corner-all" id="' +
      dialog_id + '_minimized">' + this.uiDialogTitlebar.find('.ui-dialog-title').text() +
      '<span class="ui-icon ui-icon-newwin"></div>');
    
   //create a hover event for the minimize button so that it looks good
   $('#' + dialog_id + '-minbutton').hover(function() {
      $(this).addClass('ui-state-hover');
   }, function() {
      $(this).removeClass('ui-state-hover');
   }).click(function() {
      //add a click event as well to do our "minimalization" of the window
      dialog_element.close();
      $('#' + dialog_id + '_minimized').show();
   });
    
   //create another click event that maximizes our minimized window
   $('#' + dialog_id + '_minimized').click(function() {
      $(this).hide();
      dialog_element.open();
   });
};
</script>

<?php
echo'
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

<script src="admin/js/editeur.js"></script>
<script type="text/javascript">addEvt(window,\'load\',whizzywig);</script>
    <script>
        $(function(){
            setInterval(function(){
                $(\'#ajax-refresh\').load(\'admin/chat.php\');
            }, 0);
        });
    </script>
	
<script>
$(function() {
$( "#dialog1" ).dialog({
minHeight: 550,
width: 1020,
modal: false,
autoOpen: false,
resizable: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "hide",
duration: 1000
}
});
$( "#opener1" ).click(function() {
$( "#dialog1" ).dialog( "open" );
});
});
</script>
<script>
$(function() {
$( "#dialog2" ).dialog({
minHeight: 550,
width: 1020,
modal: false,
autoOpen: false,
resizable: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "hide",
duration: 1000
}
});
$( "#opener2" ).click(function() {
$( "#dialog2" ).dialog( "open" );
});
});
</script>

<script>
$(function() {
$( "#dialog3" ).dialog({
width: 1060,
minHeight: 550,
modal: false,
autoOpen: false,
resizable: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "hide",
duration: 1000
}
});
$( "#opener3" ).click(function() {
$( "#dialog3" ).dialog( "open" );
});
});
</script>

<script>
$(function() {
$( "#dialog4" ).dialog({
width: 1020,
minHeight: 550,
modal: false,
autoOpen: false,
resizable: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "hide",
duration: 1000
}
});
$( "#opener4" ).click(function() {
$( "#dialog4" ).dialog( "open" );
});
});
</script>

<script>
$(function() {
$( "#dialog5" ).dialog({
minHeight: 550,
width: 1020,
modal: false,
autoOpen: false,
resizable: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "hide",
duration: 1000
}
});
$( "#opener5" ).click(function() {
$( "#dialog5" ).dialog( "open" );
});
});
</script>

<script>
$(function() {
$( "#dialog6" ).dialog({
minHeight: 550,
width: 1020,
modal: false,
autoOpen: false,
resizable: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "hide",
duration: 1000
}
});
$( "#opener6" ).click(function() {
$( "#dialog6" ).dialog( "open" );
});
});
</script>	
	
<script>
$(function() {
$( "#dialog-modal" ).dialog({
width: 1020,
modal: false
});
});
</script>

</head>
<body>
<body onload="whizzywig()">';

echo'
<style type="text/css">
';
if (base64_decode($tableau[30])=='') {echo'
html {background-image:url(\''.base64_decode($tableau[5]).'/fond.jpg\');}
page{background-color:transparent !important;}
body{background-color:transparent !important;}';}
else {echo'
html {background-image:url(\''.base64_decode($tableau[30]).'\');}
page{background-color:transparent !important;}
body{background-color:transparent !important;}';}

echo'</style>

<div id="page">
<div id="header2">
<div id="ajax-refresh">';
include('admin/chat.php');

echo'</div>';

echo'</div>
<div id="header">UAG CMS
';

echo'</div><ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">';

echo' <div><div><div><div><div><div id="dialog1" title="Blog(s)"><p>'; blog2(); echo'</p></div>'; 

echo'<li id="draggable" class="ui-widget-content ui-corner-tr" style="text-align:center;background:none;border:none;padding-left:20px !important; padding-right:10px !important;margin-left:35px;float:left;list-style-type:none;margin-top:25px;"><div id="opener1"><img src="admin/images/home.png"><h5 class="ui-widget-header" style="background:none;margin:0px;">Blog(s)</h5></li></div>';

if (base64_decode($tableau[9])=='off') {}

else { echo'<li id="draggable2" class="ui-widget-content ui-corner-tr" style="text-align:center;background:none;border:none;padding-left:20px !important; padding-right:10px !important;margin-left:35px;float:left;list-style-type:none;margin-top:25px;"><a href="/admin" title="'.Administration.'"><img src="admin/images/configure.png"><h5 class="ui-widget-header" style="background:none;margin:0px;">'.Administration.'</h5></a></li>';

}

echo' <div id="dialog2" title="LLDGP1"><p>'; LLDGP1(); echo'</p></div>'; 

echo'<li id="draggable3" class="ui-widget-content ui-corner-tr" style="text-align:center;background:none;border:none;padding-left:20px !important; padding-right:10px !important;margin-left:35px;float:left;list-style-type:none;margin-top:25px;"><div id="opener2"><img src="admin/images/info.png"><h5 class="ui-widget-header" style="background:none;margin:0px;">LLDGP1</h5></li></div>';

if (base64_decode($tableau[22])=='') {}

else if (base64_decode($tableau[23])=='') {}

else {
echo' <div id="dialog3" title="'.base64_decode($tableau[22]).'"><p>'; lien1(); echo'</p></div>'; 

echo'<li id="draggable4" class="ui-widget-content ui-corner-tr" style="text-align:center;background:none;border:none;padding-left:20px !important; padding-right:10px !important;margin-left:35px;float:left;list-style-type:none;margin-top:25px;"><div id="opener3"><img src="admin/images/liens.png"><h5 class="ui-widget-header" style="background:none;margin:0px;">'.base64_decode($tableau[22]).'</h5></li></div>';

}

if (base64_decode($tableau[24])=='') {echo'';}

else if (base64_decode($tableau[25])=='') {echo'';}

else {
echo' <div id="dialog4" title="'.base64_decode($tableau[24]).'"><p>'; lien2(); echo'</p></div>'; 

echo'<li id="draggable5" class="ui-widget-content ui-corner-tr" style="text-align:center;background:none;border:none;padding-left:20px !important; padding-right:10px !important;margin-left:35px;float:left;list-style-type:none;margin-top:25px;"><div id="opener4"><img src="admin/images/liens.png"><h5 class="ui-widget-header" style="background:none;margin:0px;">'.base64_decode($tableau[24]).'</h5></li></div>';

}

echo'<div id="dialog5" title="RSS"><p>'; RSS(); echo'</p></div>'; 

echo'<li id="draggable6" class="ui-widget-content ui-corner-tr" style="text-align:center;background:none;border:none;padding-left:20px !important; padding-right:10px !important;margin-left:35px;float:left;list-style-type:none;margin-top:25px;"><div id="opener5"><img src="admin/images/rss.png"><h5 class="ui-widget-header" style="background:none;margin:0px;">RSS</h5></li></div>';

echo'<div id="dialog6" title="UAG"><p>'; UAG(); echo'</p></div>'; 

echo'<li id="draggable7" class="ui-widget-content ui-corner-tr" style="text-align:center;background:none;border:none;padding-left:20px !important; padding-right:10px !important;margin-left:35px;float:left;list-style-type:none;margin-top:25px;"><div id="opener6"><img src="admin/images/pays.png"><h5 class="ui-widget-header" style="background:none;margin:0px;">UAG</h5></li></div>';

echo'</ul><div id="contenu2">';

/* Les différentes Pages de l'administration */

switch ($_GET['page'])
{

case 'LLDGP1': echo LLDGP1;  break;

case 'RSS': echo RSS;  break;

case 'UAG': echo UAG;  break;

case 'lien1': echo''.base64_decode($tableau[22]).'';  break;

case 'lien2': echo''.base64_decode($tableau[24]).'';  break;

default :  ;

} 

switch ($_GET['page'])
{

case 'LLDGP1': LLDGP1(); break;

case 'lien1': lien1();  break;

case 'lien2': lien2();  break;

case 'RSS': RSS();  break;

case 'UAG': UAG();  break;

default : ;

}

switch ($_GET['page'])
{
default :  echo'<div id="dialog_window_minimized_container"></div>';
include('admin/includes/bas.php');
}

?>
