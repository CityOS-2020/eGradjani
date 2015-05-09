<?php
session_start();
include 'dbSettings.php';
if($_SESSION['status']!=1 || !isset($_SESSION["status"])){ 
header("Location: index.php"); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="fuelux">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Biz</title>
<link href="../poslovanje/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../poslovanje/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
<link href="../poslovanje/css/jqueryUI/jquery-ui.css" rel="stylesheet">
<link href="../poslovanje/css/fuelUX/fuelux.css" rel="stylesheet">
<link href="../poslovanje/css/fileinput/fileinput.css" rel="stylesheet">
<link href="../poslovanje/css/datatables/datatables.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../poslovanje/js/bootstrap/bootstrap.min.js"></script>
<script src="../poslovanje/js/fuelUX/fuelux.js"></script>
<script src="../poslovanje/js/jqueryUI/jquery-ui.min.js"></script>
<script src="../poslovanje/js/fileinput/fileinput.js"></script>
<script src="../poslovanje/js/datatables/datatables.js"></script>
<script src="../poslovanje/js/datatables/datatablesBootstrap.js"></script>

<script src="js/biz.js"></script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="height:100px !important;">
<div class="container-fluid">
    <div class="navbar-header">
      LOGO
    </div>
  </div>
</nav>
<div id="main" class="container-fluid" style="padding-top:150px;">
<div class="row">
<div id="menu" class="col-md-2">
<ul class="list-group">
 	 <li class="list-group-item"><a href="biz.php" >Naslovnica</a></li>
	<li class="list-group-item"><a href="#" onclick="loadScreen('racuni');" >Računi</a></li>
  	<li class="list-group-item"><a href="#" onclick="logout();" >Odjavi se</a></li>
</ul>
</div>
<div id="content" class="col-md-10">
<!--start content -->

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">Transakcije</div>
  <div class="panel-body">
    
  	<div class="row" style="padding-top:30px;">
    	<div class="col-md-12">
        <select class="form-control" id="usluge" name="usluge" onChange="biz(3);" />
        <option value="0">Odaberite uslugu</option>
        <?php
		$sqlUsluge='select ID_usluga,naziv from usluga where ID_vlasnik_usluga='.$_SESSION["id"];
		$resultUsluge=mysql_query($sqlUsluge);
		while($rowUsluge=mysql_fetch_array($resultUsluge)){
			?>
         	<option value="<?php echo $rowUsluge["ID_usluga"];?>"><?php echo $rowUsluge["naziv"];?></option>   
            <?php
		}
		?>
        </select>
        <div class="table-responsive">
        	
        	<div id="potrosnja">
            
            </div>
            
		</div>

            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
 
<!-- end of content -->
</div>
<div class="row">
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://klikinformacijsketehnologije.hr/" target="_BLANK">
        Developed by KlikIT
      </a>
    </div>
  </div>

</nav>
</div>

</div>
</div>
</body>
</html>
