<?php
session_start();

class prijedlozi{

	function upVote($idPrijedloga){
		include '../dbSettings.php';
		$sql='insert into prijedloziVotes(idPrijedloga,idGradjanina,upVote,downVote) VALUES('.mysql_real_escape_string($idPrijedloga).','.mysql_real_escape_string($_SESSION["id"]).',1,0)';
		echo $sql;
		mysql_query($sql);

	}

	function downVote($idPrijedloga){
		include '../dbSettings.php';
		$sql='insert into prijedloziVotes(idPrijedloga,idGradjanina,upVote,downVote) VALUES('.mysql_real_escape_string($idPrijedloga).','.mysql_real_escape_string($_SESSION["id"]).',0,1)';
		mysql_query($sql);

	}

	//end of class
}