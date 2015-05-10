<?php
session_start();
class systemFunctions{

	

	function login($user,$pwd){
		include '../dbSettings.php';
		$sql='select id,user,password,ime from administracija where user="'.$user.'"';
		
		
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		
		$saltKey=sha1("eqweo/32or23+/4eo32ed23/dl/2+dl/2+3eo_*?*?=");
		$hash=$saltKey.$pwd;
		$newPass=hash('sha512',$hash,false);
		
		$userCheck=$row["user"];
		$pwdCheck=$row["password"];
				
		if($userCheck==$user && $pwdCheck==$newPass){
			$_SESSION['start_time'] = time();
			$_SESSION['status'] = 1;
			$_SESSION['id']= $row["id"];
			//$sqlLog='insert into log(ID_korisnik,timestamp,radnja) VALUES('.$_SESSION['id'].',"'.date("Y-m-d H:i:s").'","Log in")';
			
			//mysql_query($sqlLog);
			echo 1;
		}else{
			echo 0;
		}


	}

	function logout(){

		session_destroy();
	}


//end of class
}


?>