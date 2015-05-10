<?php
session_start();
class problemi{

	function zaprimiProblem($idProblema){
		include '../dbSettings.php';
		$sql='update problemi set status=2 where idProblema='.$idProblema;
		
		if(mysql_query($sql)){
			echo 'Problem zaprimljen';
		}else{
			echo 'Došlo je do greške, molimo pokušajte ponovno.';
		}
	}

	function rjesiProblem($idProblema){
		include '../dbSettings.php';
		$sql='update problemi set status=3 where idProblema='.$idProblema;
		if(mysql_query($sql)){
			echo 'Problem rješen';
		}else{
			echo 'Došlo je do greške, molimo pokušajte ponovno.';
		}
	}
//end of class	
}
?>