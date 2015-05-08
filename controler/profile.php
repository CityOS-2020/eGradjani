<?php
include '../model/profile.php';

$action=$_POST["action"];

$profile=new profile();

if($action==1){
	$return=$profile->izmjeni($_POST["ime"],$_POST["prezime"],$_POST["adresa"],$_POST["postanskiBroj"],$_POST["grad"],$_POST["oib"],$_POST["telefon"],$_POST["iban"]);
	echo $return;
}else if($action==2){
	$return=$profile->deaktivirajPrijedlog($_POST["dodatno"]);
	echo $return;
}else if($action==4){
	$return=$profile->noviPrijedlog($_POST["naslovPrijedloga"],$_POST["opisPrijedloga"]);
	echo $return;
}