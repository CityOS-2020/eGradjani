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
<title>Poslovanje</title>
<link href="../lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../lib/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
<link href="../lib/css/jqueryUI/jquery-ui.css" rel="stylesheet">
<link href="../lib/css/fuelUX/fuelux.css" rel="stylesheet">
<link href="../lib/css/fileinput/fileinput.css" rel="stylesheet">
<link href="../lib/css/datatables/datatables.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../lib/js/bootstrap/bootstrap.min.js"></script>
<script src="../lib/js/fuelUX/fuelux.js"></script>
<script src="../lib/js/jqueryUI/jquery-ui.min.js"></script>
<script src="../lib/js/fileinput/fileinput.js"></script>
<script src="../lib/js/datatables/datatables.js"></script>
<script src="../lib/js/datatables/datatablesBootstrap.js"></script>

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
<div id="menu" class="col-md-2">
<ul class="list-group">
 	 <li class="list-group-item"><a href="biz.php" >Naslovnica</a></li>

  	<li class="list-group-item"><a href="#" onclick="logout();" >Odjavi se</a></li>
</ul>
</div>
<div class="table-responsive">
<div id="content" class="col-md-10">
<!--start content -->
<?php
      $sqlNoviProblemi='select * from problemi where status=1 and aktivan=1';
      $resultNoviProblemi=mysql_query($sqlNoviProblemi);
      $brProblema=mysql_num_rows($resultNoviProblemi);

      $sqlNerjeseniProblemi='select * from problemi where status=2 and aktivan=1';
      $resultNerjeseniProblemi=mysql_query($sqlNerjeseniProblemi);
      $brStarihProblema=mysql_num_rows($resultNerjeseniProblemi);
?>      
<div class="row">
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Novi problemi <span class="badge"><?php echo $brProblema;?></span></div>
  <div class="panel-body">
    <?php

      while($rowNoviProblemi=mysql_fetch_array($resultNoviProblemi)){
        ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $rowNoviProblemi["idProblema"];?>" aria-expanded="true" aria-controls="collapseOne">
                      <?php echo $rowNoviProblemi["naslov"];?>
                    </a>
                  </h4>
                </div>
                <div id="collapse-<?php echo $rowNoviProblemi["idProblema"];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <?php
                      echo '<p>'.$rowNoviProblemi["opis"].'</p>';
                      if(strlen($rowNoviProblemi["slika"])>0){
                        echo '<a href="'.$rowNoviProblemi["slika"].'" target="_BLANK"><img src="'.$rowNoviProblemi["slika"].'" height="150" width="150" /></a>';                        
                      }
                      ?>
                      <br/><br/>
                     <button type="button" class="btn btn-primary btn-md" onClick="problemi(1,<?php echo $rowNoviProblemi["idProblema"];?>);">Zaprimi</button>
                  </div>
                </div>
              </div>
            </div>
        <?php
      }
    ?>
  </div>
  	
    </div>
  </div>
</div>


<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Zaprimljeni problemi <span class="badge"><?php echo $brStarihProblema;?></span></div>
  <div class="panel-body">
    <?php

      while($rowNerjeseniProblemi=mysql_fetch_array($resultNerjeseniProblemi)){
        ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $rowNerjeseniProblemi["idProblema"];?>" aria-expanded="true" aria-controls="collapseOne">
                      <?php echo $rowNerjeseniProblemi["naslov"];?>
                    </a>
                  </h4>
                </div>
                <div id="collapse-<?php echo $rowNoviProblemi["idProblema"];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <?php
                      echo '<p>'.$rowNerjeseniProblemi["opis"].'</p>';
                      if(strlen($rowNerjeseniProblemi["slika"])>0){
                        echo '<a href="'.$rowNerjeseniProblemi["slika"].'" target="_BLANK"><img src="'.$rowNerjeseniProblemi["slika"].'" height="150" width="150" /></a>';                        
                      }
                      ?>
                      <br/><br/>
                     <button type="button" class="btn btn-primary btn-md" onClick="problemi(1,<?php echo $rowNerjeseniProblemi["idProblema"];?>);">Rješeno</button>
                  </div>
                </div>
              </div>
        <?php
      }
    ?>
  </div>
    
    </div>
  </div>
</div>

</div>



<!-- end of content -->
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
