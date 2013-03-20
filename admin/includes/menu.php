
<div id="dialog1" title="<?php echo Accueil ?>">
<p><?php  accueil() ?></p>
</div>
<div id="draggable" style="margin-bottom:10px;"><div id="opener1"><img src="images/home.png"><?php echo Accueil ?></div></div>

<div id="dialog2" title="<?php echo Articles ?>">
<p><iframe src="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=liste" style="background:none;border:none;min-width:100%;min-height:270px !important;background-image:none;"></iframe>

<a href="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=liste" target="cwindow"></a>
</p>
</div>
<div id="draggable2" style="margin-bottom:10px;"><div id="opener2"><img src="images/list.png"><?php echo Articles ?></div></div>

<div id="dialog3" title="<?php echo Ecrire ?>">
<iframe src="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=ajouter" style="border:none;min-width:100%;min-height:430px !important;background-image:none;"></iframe>

<a href="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=ajouter" target="cwindow"></a>

</div>
<div id="draggable3" style="margin-bottom:10px;"><div id="opener3"><img src="images/ecrire.png"><?php echo Ecrire ?></div></div>


<div id="dialog4" title="<?php echo Images ?>">
<p><iframe src="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=images" style="border:none;min-width:100%;min-height:200px !important;background-image:none;"></iframe>

<a href="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=images" target="cwindow"></a>
</p>
</div>
<div id="draggable4" style="margin-bottom:10px;"><div id="opener4"><img src="images/pictures.png"><?php echo Images ?></div></div>

<div id="dialog5" title="<?php echo Configuration ?>">
<p><iframe src="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=configuration" style="border:none;min-width:100%;min-height:500px !important;background-image:none;"></iframe>

<a href="<?php echo''.base64_decode($tableau[5]).''; ?>/admin/index2.php?page=configuration" target="cwindow"></a>
</p>
</div>
<div id="draggable5" style="margin-bottom:10px;"><div id="opener5"><img src="images/configure.png"><?php echo Configuration ?></div></div>

<div id="dialog6" title="<?php echo Blog ?>">
<p><?php blog(); ?></p>
</div>
<div id="draggable6" style="margin-bottom:10px;"><div id="opener6"><img src="images/eye.png"><?php echo Voirleblog ?></div></div>

<div id="draggable7" style="margin-bottom:10px;"><a href="deconnexion.php" title="<?php echo Deconnexion ?>"><img src="images/logout.png"><?php echo Deconnexion ?></a></div>