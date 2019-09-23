<?php
$nim_of_ids = 1000;
$i = 0;
$n = 0;
$l = "AAA";
while ($i <= $nim_of_ids) {
	$id=$i.sprintf("02%d",$n);
	echo $l.$id . "<br>";
	if ($n==9999) {
		$n = 0;
		$l++; 
	}
	$i++;
	$n++;
}
/* $nim_of_ids = 1000;
$i = 0;
$matricule;
$l = "AAA";
while ($i <= $nim_of_ids) {
    $id=$i.sprintf("%d",$matricule);
    echo $l.$id . "<br>";
    if ($matricule==9999) {
        $matricule = 0;
        $l++;
    }
    $i++;
    $matricule++;*/

?>