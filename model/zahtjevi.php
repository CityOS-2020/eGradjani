<?php
session_start();
class zahtjevi{

	function zahtjevWifi($mac,$tipZahtjeva){
		include '../dbSettings.php';
		$sql='insert into zahtjevi(idGradjanina,idTipZahtjeva,MAC,timestampPredano,status,aktivan) VALUES('.mysql_real_escape_string($_SESSION["id"]).','.mysql_real_escape_string($tipZahtjeva).',"'.mysql_real_escape_string($mac).'","'.date("Y-m-d H:i").'",1,1)';
		if(mysql_query($sql)){
			echo 'Zahtjev za besplatni internet predan.';
		}else{
			echo 'Došlo je do greške, molim Vas pokušajte ponovno';
		}
	}

	funtion deaktivirajZahtjev($idZahtjeva){
		include '../dbSettings.php';
		$sql='update zahtjevi set aktivan=0 where idZahtjeva='.mysql_real_escape_string($idZahtjeva);
		if(mysql_query($sql)){
			echo 'Zahtjev uspješno deaktiviran deaktiviran';
		}else{
			echo 'Došlo je do greške, molim Vas pokušajte ponovno';
		}

	}
//end of class
}
?>