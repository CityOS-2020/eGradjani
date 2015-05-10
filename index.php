<?php
session_start();
include 'dbSettings.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="fuelux">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hackaton</title>
<link href="lib/css/bootstrap/bootstrap.css" rel="stylesheet">
<link href="lib/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/jqueryUI/jquery-ui.css" rel="stylesheet">
<link href="css/fuelUX/fuelux.css" rel="stylesheet">
<link href="lib/css/fileinput/fileinput.css" rel="stylesheet">
<link href="css/datatables/datatables.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="lib/js/validate/jquery.validate.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="lib/js/bootstrap/bootstrap.min.js"></script>
<script src="js/fuelUX/fuelux.js"></script>
<script src="js/jqueryUI/jquery-ui.min.js"></script>
<script src="lib/js/fileinput/fileinput.js"></script>
<script src="js/datatables/datatables.js"></script>
<script src="js/datatables/datatablesBootstrap.js"></script>

<script src="lib/js/poslovanje.js"></script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
<div class="container-fluid">
  <div class="navbar-header navbar-left">
         <a href="http://klikinformacijsketehnologije.hr/hackaton/index.php"  ><img src="josipStrevun-bijeli.png" width="200" height="40"/></a>
   
  </div>
    <div class="navbar-header navbar-right">
      <?php
      if($_SESSION["status"]==1){
        
        $sqlGradjanin='select email,ime,prezime from gradjani where idGradjani='.$_SESSION["id"];
        $resultGradjanin=mysql_query($sqlGradjanin);
        $rowGradjanin=mysql_fetch_array($resultGradjanin);
        
        ?>
        
        <a href="#" onClick="loadScreen('profile',0);" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $rowGradjanin["ime"].' '.$rowGradjanin["prezime"];?></a></li>
        <a href="#" onClick="logout();" class="btn btn-primary" role="button">Odjavi se</a>               
        
        <?php
      }else{
        ?>
      <form class="navbar-form" role="search" id="login">
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
<div id="main" class="container-fluid" style="padding-top:100px;">
<div class="row">
<div id="content" class="col-md-12">
<!--start content -->
<div class="row">
  <div class="col-md-6 col-md-offset-3">
 
</div>
</div>

<div class="row">
<div class="col-md-6 col-md-offset-3">
  <div class="jumbotron">
  <div class="container">
  

  <h2>Najnoviji prijedlozi..</h2>
    <ul>
  <?php
    $sqlPrijedlozi='select * from prijedlozi where aktivan=1 order by idPrijedloga desc';
    $resultPrijedlozi=mysql_query($sqlPrijedlozi);
    while($rowPrijedlozi=mysql_fetch_array($resultPrijedlozi)){
      ?>
        <li><?php echo '<h3>'.$rowPrijedlozi["naslov"].'</h3>';
                  echo '<p>'.$rowPrijedlozi["opis"].'</p>';
                  $sqlVotes='select SUM(upVote) as up,SUM(downVote) as down from prijedloziVotes where idPrijedloga='.$rowPrijedlozi["idPrijedloga"];
                  $resultVotes=mysql_query($sqlVotes);
                  $rowVotes=mysql_fetch_array($resultVotes);

                  $sqlCheckVote='select count(idVotes) as votes from prijedloziVotes where idGradjanina='.$_SESSION["id"].' and idPrijedloga='.$rowPrijedlozi["idPrijedloga"];
                  $resultCheckVote=mysql_query($sqlCheckVote);
                  $rowCheckVote=mysql_fetch_array($resultCheckVote);
                  if($rowCheckVote["votes"]>0){
                    $checkVote=1;
                  }else{
                    $checkVote=0;
                  }

                  ?>
                  
                    <a href="#" onClick="prijedlozi(1,<?php echo $rowPrijedlozi["idPrijedloga"];?>);" class="btn btn-primary" role="button" <?php if($_SESSION["status"]!=1 || $checkVote==1){ echo 'disabled';}?> ><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span><?php echo $rowVotes["up"];?></a>
                    <a href="#" onClick="prijedlozi(2,<?php echo $rowPrijedlozi["idPrijedloga"];?>);" class="btn btn-primary" role="button" <?php if($_SESSION["status"]!=1 || $checkVote==1){ echo 'disabled';}?>><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span><?php echo $rowVotes["down"];?></a>       
                  
        </li>

      <?php
    }
  ?>
</ul>
<button class="btn btn-primary btn-lg">Pregledaj sve prijedloge</button>
</div>
</div>
</div>


</div >


<div class="row">
<div class="col-md-6 col-md-offset-3">
  <div class="jumbotron">
  <div class="container">
  
    <h3>Najnoviji problemi...</h3>
    <ul>
      <?php
    $sqlProblemi='select * from problemi where aktivan=1 order by idProblema desc';
    $resultProblemi=mysql_query($sqlProblemi);
    while($rowProblemi=mysql_fetch_array($resultProblemi)){
      
        if($rowProblemi["status"]==1){
          $style='class="bg-warning"';
      }else if($rowProblemi["status"]==2){
          $style='class="bg-info';
      }else if($rowProblemi["status"]==3){
          $style='class="bg-success"';
      }?>
        <li <?php echo $style;?>><?php echo $rowProblemi["naslov"].'<br/>';
                  echo $rowProblemi["opis"].'<br/>';
            ?>   
        </li>

      <?php
    }
  ?>
    </ul>
    <button class="btn btn-primary btn-lg">Pregledaj sve problem</button>
</div>
</div>
</div>

</div>
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
                    <input type="text" class="form-control" id="regPrezime" name="regPrezime" placeholder="Prezime">
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
