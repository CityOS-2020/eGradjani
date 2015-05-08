<?php
session_start();
class systemFunctions{

	function register($newUser,$newPwd){
		include '../dbSettings.php';

		$saltKey=sha1("eqweo/32or23+/4eo32ed23/dl/2+dl/2+3eo_*?*?=");
		$hash=$saltKey.$newPwd;
		$newPass=hash('sha512',$hash,false);

		$sql='insert into gradjani(email,password) values("'.$newUser.'","'.$newPass.'")';
		if(mysql_query($sql)){
			echo 1;
		}else{
			echo 0;
		}


	}

	function login($user,$pwd){
		include '../dbSettings.php';
		$sql='select idGradjani,email,password from gradjani where email="'.$user.'"';
		
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		
		$saltKey=sha1("eqweo/32or23+/4eo32ed23/dl/2+dl/2+3eo_*?*?=");
		$hash=$saltKey.$pwd;
		$newPass=hash('sha512',$hash,false);
		
		$userCheck=$row["email"];
		$pwdCheck=$row["password"];
				
		if($userCheck==$user && $pwdCheck==$newPass){
			$_SESSION['start_time'] = time();
			$_SESSION['status'] = 1;
			$_SESSION['id']= $row["idGradjani"];
			//$sqlLog='insert into log(ID_korisnik,timestamp,radnja) VALUES('.$_SESSION['id'].',"'.date("Y-m-d H:i:s").'","Log in")';
			
			//mysql_query($sqlLog);
			echo 1;
		}else{
			echo 0;
		}


	}



//end of class
}


?>