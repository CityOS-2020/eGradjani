<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="fuelux">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hackaton</title>
<link href="lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="lib/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/jqueryUI/jquery-ui.css" rel="stylesheet">
<link href="css/fuelUX/fuelux.css" rel="stylesheet">
<link href="css/fileinput/fileinput.css" rel="stylesheet">
<link href="css/datatables/datatables.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="lib/js/validate/jquery.validate.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="lib/js/bootstrap/bootstrap.min.js"></script>
<script src="js/fuelUX/fuelux.js"></script>
<script src="js/jqueryUI/jquery-ui.min.js"></script>
<script src="js/fileinput/fileinput.js"></script>
<script src="js/datatables/datatables.js"></script>
<script src="js/datatables/datatablesBootstrap.js"></script>

<script src="lib/js/poslovanje.js"></script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
<div class="container-fluid">
    <div class="navbar-header">
      <?php
      if($_SESSION["status"]==1){
        include 'dbSettings.php';
        $sqlGradjanin='select email,ime,prezime from gradjani where idGradjani='.$_SESSION["id"];
        $resultGradjanin=mysql_query($sqlGradjanin);
        $rowGradjanin=mysql_fetch_array($resultGradjanin);
        
        ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" ><?php echo $rowGradjanin["ime"].' '.$rowGradjanin["prezime"];?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" onClick="loadScreen('profile',0);">Profil</a></li>
                <li><a href="#" onClick="logout();">Odjavi se</a></li>
               
                
              </ul>
            </li>
          </ul>
        
        <?php
      }else{
        ?>
      <form class="navbar-form navbar-right" role="search" id="login">
      <div class="form-group">
          
          <input type="text" class="form-control" id="username" name="username" placeholder="E-mail">
        </div>
        <div class="form-group">
          
          <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Lozinka">
        </div>
        <button type="button" class="btn btn-primary" onClick="login();">Prijavi se</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noviKorisnikModal">Registriraj se</button>

</form>
<?php } ?>
    </div>
  </div>
</nav>
<div id="main" class="container-fluid" style="padding-top:150px;">
<div class="row">
<div id="content" class="col-md-12">
<!--start content -->


<!-- end of content -->
</div>
<!-- Modal za novi izlet -->
<div class="modal fade" id="noviKorisnikModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Novi E-građanin</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="noviKorisnik">
               <div class="form-group">
                    <input type="text" class="form-control" id="regUsername" name="regUsername" placeholder="E-mail">
               </div>  
                <div class="form-group">
                    <input type="password" class="form-control" id="regPwd" name="regPwd" placeholder="Lozinka">
               </div>
               <div class="form-group">
                    <input type="text" class="form-control" id="regIme" name="regIme" placeholder="Ime">
               </div>
               <div class="form-group">
                    <input type="text" class="form-control" id="regPrezime" name="regPrezime" placeholder="Ime">
               </div>    
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
        <button type="button" class="btn btn-primary" onClick="register(1,0);">Spremi</button>
      </div>
    </div>
  </div>
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
