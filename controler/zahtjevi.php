<?php
include '../model/zahtjevi.php';

$action=$_POST["action"];

$zahtjev=new zahtjevi();

if($action==1){
	$tipZahtjeva=$_POST["dodatno"];
	$return=$zahtjev->zahtjevWifi($_POST["mac"],$tipZahtjeva);
	echo $return;

}else if($action==2){
	$return=$zahtjev->deaktivirajZahtjev($_POST["dodatno"]);
	echo $return;

}