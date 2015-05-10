<?php
include '../model/problemi.php';
$action=$_POST["action"];

$problem=new problemi();

if($action==1){
	$idProblema=$_POST["dodatno"];
	$return=$problem->zaprimiProblem($idProblema);
	echo $return;
}else if($action==2){
	$idProblema=$_POST["dodatno"];
	$return=$problem->rjesiProblem($idProblema);
	echo $return;
}else if($action==3){
	$idProblema=$_POST["dodatno"];
	$return=$problem->zaprimiProblem($idProblema);
	echo $return;
}else if($action==4){
	$idProblema=$_POST["dodatno"];
	$return=$problem->rjesiProblem($idProblema);
	echo $return;
}

?>