<?php
session_start();
class profile{

	function izmjeni($ime,$prezime,$adresa,$postanskiBroj,$grad,$oib,$telefon,$iban){
		include '../dbSettings.php';
		$sql='update gradjani set ime="'.mysql_real_escape_string($ime).'",
		prezime="'.mysql_real_escape_string($prezime).'",
		adresa="'.mysql_real_escape_string($adresa).'",
		postanskiBroj="'.mysql_real_escape_string($postanskiBroj).'",
		grad="'.mysql_real_escape_string($grad).'",
		oib="'.mysql_real_escape_string($oib).'",
		telefon="'.mysql_real_escape_string($telefon).'",
		iban="'.mysql_real_escape_string($iban).'" where idGradjani='.mysql_real_escape_string($_SESSION["id"]);
			
		if(mysql_query($sql)){
			echo 'Podatci uspješno spremljeni';	

		}else{
			echo 'Došlo je do greške, molim Vas pokušajte ponovno';
		}

	}

	function noviPrijedlog($naslov,$opis){
		include '../dbSettings.php';
		$sql='insert into prijedlozi(idGradjanina,naslov,opis,aktivan) values('.mysql_real_escape_string($_SESSION["id"]).',"'.mysql_real_escape_string($naslov).'","'.mysql_real_escape_string($opis).'",1)';
		if(mysql_query($sql)){
			echo 'Novi prijedlog uspješno spremljen';	
		}else{
			echo 'Došlo je do greške, molim Vas pokušajte ponovno';
		}

	}

	function deaktivirajPrijedlog($idPrijedloga){
		include '../dbSettings.php';
		$sql='update prijedlozi set aktivan=0 where idPrijedloga='.mysql_real_escape_string($idPrijedloga);
		if(mysql_query($sql)){
			echo 'Prijedlog uspješno deaktiviran';	
		} else{
			echo 'Došlo je do greške, molim Vas pokušajte ponovno';
		}

	}

//end of class
}
?>