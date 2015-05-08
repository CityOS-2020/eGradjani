<?php
include '../model/system.php';

$action=$_POST["action"];

$systemFunction=new systemFunctions();

if($action==1){
	$return=$systemFunction->register($_POST["regUsername"],$_POST["regPwd"]);
	echo $return;

}else if($action==2){
	$return=$systemFunction->login($_POST["username"],$_POST["pwd"]);
	echo $return;
}
?>