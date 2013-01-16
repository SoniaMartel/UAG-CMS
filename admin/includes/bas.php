<?php

echo'</div></div><div id="pieddepage">';

$timesession = $_SESSION['token_time'] - $timestamp_ancien;

$minutes = intval(abs($timesession /  60));
$secondes = intval($timesession)-intval($minutes)*60;

echo '<br/><center>'.TempsSessions.' '.$minutes.' '.Minutes.' et '.$secondes.' '.Secondes.'</center>';

echo'</div></div>'; 

echo'</body></html>';

?>

