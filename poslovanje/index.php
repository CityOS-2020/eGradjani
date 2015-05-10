<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="fuelux">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Poslovanje</title>
<link href="../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../lib/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
<link href="../css/jqueryUI/jquery-ui.css" rel="stylesheet">
<link href="../css/fuelUX/fuelux.css" rel="stylesheet">
<link href="../lib/css/fileinput/fileinput.css" rel="stylesheet">
<link href="../lib/css/datatables/datatables.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../lib/js/bootstrap/bootstrap.min.js"></script>
<script src="../js/fuelUX/fuelux.js"></script>
<script src="../js/jqueryUI/jquery-ui.min.js"></script>
<script src="../js/fileinput/fileinput.js"></script>
<script src="../js/datatables/datatables.js"></script>
<script src="../js/datatables/datatablesBootstrap.js"></script>

<script src="../lib/js/admin.js"></script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
<div class="container-fluid">
    <div class="navbar-header">
      <img src="../josipStrevun-bijeli.png" width="200" height="40"/>
    </div>
  </div>
</nav>
<div id="main" class="container-fluid" style="padding-top:150px;">
<div class="row">
<div id="content" class="col-md-10">
<!--start content -->
<div class="col-md-4">
</div>
<div class="col-md-4">

<form role="form" id="login">
		<div class="form-group">
        	<label for="username">Korisničko ime</label>
        	<input type="text" class="form-control" id="username" name="username" placeholder="Unesite Vaše korisničko ime...">
      	</div>
        <div class="form-group">
        	<label for="pwd">Lozinka</label>
        	<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Unesite Vašu lozinku...">
      	</div>
        <button type="button" class="btn btn-primary" onClick="login();">Prijavi se</button>

</form>
</div>
<div class="col-md-4">
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
