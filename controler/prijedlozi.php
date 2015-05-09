<?php
include '../model/prijedlozi.php';

$action=$_POST["action"];

$prijedlog=new prijedlozi();

if($action==1){
	$prijedlog->upVote($_POST["dodatno"]);
}else if($action==2){
	$prijedlog->downVote($_POST["dodatno"]);
}