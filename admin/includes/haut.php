<?php
echo'
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>'.base64_decode($tableau[0]).'</title>
<meta name="Description" content="Administration de UAG CMS" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<script src="js/editeur.js"></script>
<script type="text/javascript">addEvt(window,\'load\',whizzywig);</script>
<link rel="stylesheet" href="defaut.css" />
<link rel="shortcut icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
<link rel="icon" type="image/x-icon" href="'.base64_decode($tableau[5]).'/Favicon.ico" sizes="16x16" />
</head>
<body>
<body onload="whizzywig()">
<div id="page">
<div id="header">UAG CMS -
';
?>
