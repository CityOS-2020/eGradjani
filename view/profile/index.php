<?php
session_start();
include '../../dbSettings.php';


?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">Profil</div>
  <div class="panel-body">
    
    <div class="row" style="padding-top:30px;">
      <div class="col-md-12">
        <div class="table-responsive">
          <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist" id="myTab">
            <li role="presentation" class="active"><a href="#osnovniPodatci" aria-controls="home" role="tab" data-toggle="tab">Osnovni podatci</a></li>
            <li role="presentation"><a href="#prijedlozi" aria-controls="profile" role="tab" data-toggle="tab">Prijedlozi</a></li>
              <li role="presentation"><a href="#problemi" aria-controls="profile" role="tab" data-toggle="tab">Problemi</a></li>
                <li role="presentation"><a href="#zahtjevi" aria-controls="profile" role="tab" data-toggle="tab">Zahtjevi</a></li>
            </ul>
            
             <!-- Tab panes -->
      <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="osnovniPodatci" style="padding:20px">
              <?php
                $sqlOsnovniPodatci='select * from gradjani where idGradjani='.$_SESSION["id"];
                $resultOsnovniPodatci=mysql_query($sqlOsnovniPodatci);
                $rowOsnovniPodatci=mysql_fetch_array($resultOsnovniPodatci);
              ?>
                  <form role="form" id="osnovniPodatciForm">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $rowOsnovniPodatci["email"];?>" disabled="disabled">
                       </div>
                       <div class="form-group">
                            <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime" value="<?php echo $rowOsnovniPodatci["ime"];?>">
                       </div> 
                       <div class="form-group">
                            <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Prezime" value="<?php echo $rowOsnovniPodatci["prezime"];?>">
                       </div> 
                       <div class="form-group">
                            <input type="text" class="form-control" id="adresa" name="adresa" placeholder="Adresa" value="<?php echo $rowOsnovniPodatci["adresa"];?>">
                       </div>
                       <div class="form-group">
                            <input type="text" class="form-control" id="postanskiBroj" name="postanskiBroj" placeholder="Poštanski broj" value="<?php echo $rowOsnovniPodatci["postanskiBroj"];?>">
                       </div>
                       <div class="form-group">
                            <input type="text" class="form-control" id="grad" name="grad" placeholder="Grad" value="<?php echo $rowOsnovniPodatci["grad"];?>">
                       </div>
                       <div class="form-group">
                            <input type="text" class="form-control" id="oib" name="oib" placeholder="Oib" value="<?php echo $rowOsnovniPodatci["oib"];?>">
                       </div>
                       <div class="form-group">
                            <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Kontakt telefon" value="<?php echo $rowOsnovniPodatci["telefon"];?>">
                       </div>
                       <div class="form-group">
                            <input type="text" class="form-control" id="iban" name="iban" placeholder="IBAN" value="<?php echo $rowOsnovniPodatci["iban"];?>">
                       </div>
                       <button type="button" class="btn btn-primary" onClick="profile(1,0);">Spremi</button>

                  </form>
            </div>
         
            <div role="tabpanel" class="tab-pane " id="prijedlozi" style="padding:20px">
              <div class="row">
                <div class="col-md-12">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noviPrijedlogModal">Novi prijedlog</button>
                  </div>
              </div>
          <table class="table table-striped" id="neaktvniAgenti" style="padding-top:20px;">
          <thead>
                  <tr><td>Naslov</td><td>Opis</td><td>Ocjena</td><td>Radnje</td></tr>
                </thead>
                <tbody>
                  <?php
                  $sqlPrijedlozi='select * from prijedlozi where idGradjanin='.$_SESSION["id"].' and aktivan=1';
                  $resultPrijedlozi=mysql_query($sqlPrijedlozi);
            while($rowPrijedlozi=mysql_fetch_array($resultPrijedlozi)){
                                $sqlVotes='select SUM(upVote) as up,SUM(downVote) as down from prijedloziVotes where idPrijedloga='.$rowPrijedlozi["idPrijedloga"];
                                
                                $resultVotes=mysql_query($sqlVotes);
                                $rowVotes=mysql_fetch_array($resultVotes);
              ?>
                              <tr>
                                <td><?php echo $rowPrijedlozi["naslov"];?></td>
                                <td><?php echo $rowPrijedlozi["opis"];?></td>
                                <td>
                                               
                          <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span><?php echo $rowVotes["up"];?>
                          <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span><?php echo $rowVotes["down"];?>      

                                </td>
                                <td>
                                <?php if($rowPrijedlozi["aktivan"]==1){?>
                                <a href="#" onClick="profile(2,<?php echo $rowPrijedlozi["idPrijedloga"];?>);"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>Deaktiviraj</a><br/> 
                                <?php }else{ ?>
                                <a href="#" onClick="profile(3,<?php echo $rowPrijedlozi["idPrijedloga"];?>);"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>Aktiviraj</a><br/>
                                <?php }?> 
                                
                              </tr>
                            <?php 
            }
          ?>
                </tbody>  
      </table>
            </div>

         <div role="tabpanel" class="tab-pane " id="problemi" style="padding:20px">
              <div class="row">
                <div class="col-md-12">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noviProblemModal">Novi problem</button>
                  </div>
              </div>
          <table class="table table-striped" id="neaktvniAgenti" style="padding-top:20px;">
          <thead>
                  <tr><td>Naslov</td><td>Opis</td><td>Slika</td><td>Status</td><td>Radnje</td></tr>
                </thead>
                <tbody>
                 <?php
                 $sqlProblemi='select * from problemi where aktivan=1 and idGradjanina='.$_SESSION["id"];
                 $resultProblemi=mysql_query($sqlProblemi);
                
                 while($rowProblemi=mysql_fetch_array($resultProblemi)){
                  ?>
                    <tr><td><?php echo $rowProblemi["naslov"];?></td>
                        <td><?php echo $rowProblemi["opis"];?></td>
                        <td><img height="150" width="150" src="<?php echo $rowProblemi["slika"];?>" /></td>
                        <td>
                        <?php
                        if($rowProblemi["status"]==1){
                          echo 'Novi';
                        }else if($rowProblemi["status"]==2){
                          echo 'Zaprimljen';
                        }else if($rowProblemi["status"]==3){
                          echo 'Rješeno';                
                        }
                        ?>
                        </td>
                        <td><?php if($rowProblemi["aktivan"]==1){?>
                                <a href="#" onClick="profile(3,<?php echo $rowProblemi["idProblema"];?>);"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>Deaktiviraj</a><br/> 
                                <?php }
                                ?>
                        </td>
                       </tr> 

                  <?php
                 }
                 ?>
                </tbody>  
      </table>
            </div>

<div role="tabpanel" class="tab-pane " id="zahtjevi" style="padding:20px">
              <div class="row">
                <div class="col-md-12">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noviProblemModal">Novi problem</button><!-- Single button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Novi zahtjevi <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#" data-toggle="modal" data-target="#noviZahtjevWifiModal">Besplatni WiFi</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                  </div>
              </div>
          <table class="table table-striped" id="neaktvniAgenti" style="padding-top:20px;">
          <thead>
                  <tr><td>Naslov</td><td>Datum/Vrijeme</td><td>Status</td><td>Posljednja izmjena</td><td>Odgovor</td><td>Radnje</td></tr>
                </thead>
                <tbody>
                 <?php
                 $sqlZahtjevi='select z.*,t.naziv as nazivZahtjeva from zahtjevi z 
                 inner join tipZahtjeva t on t.idTipZahtjeva=z.idTipZahtjeva 
                 where z.aktivan=1 and z.idGradjanina='.$_SESSION["id"];
                 $resultZahtjevi=mysql_query($sqlZahtjevi);
                 while($rowZahtjevi=mysql_fetch_array($resultZahtjevi)){
                
                  ?>
                    <td><?php echo $rowZahtjevi["nazivZahtjeva"];?></td>
                    <td><?php echo $rowZahtjevi["timestampPredano"];?></td>
                    <td>
                        <?php
                            if($rowZahtjevi["status"]==1){
                                echo 'Predano';
                            }else if($rowZahtjevi["status"]==2){
                                echo 'Zaprimljeno';
                            }else if($rowZahtjevi["status"]==3){
                                echo 'Rješeno';
                            }
                           ?>   
                    </td>
                    <td>
                       <?php
                        if($rowZahtjevi["timestampPromjena"]!="0000-00-00 00:00:00"){
                          echo $rowZahtjevi["timestampPromjena"];
                        }
                        ?> 
                    </td>
                    <td></td>
                    <td><?php if($rowZahtjevi["aktivan"]==1){?>
                                <a href="#" onClick="zahtjevi(2,<?php echo $rowZahtjevi["z.idZahtjeva"];?>);"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>Deaktiviraj</a><br/> 
                                <?php }
                                ?>
                        </td>
                       </tr>
                  <?php
                 } 
                 ?>
                </tbody>  
      </table>
            </div>


            </div>

</div>

            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>

<script>
$(document).ready(function() {
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
} );
</script>

<!-- modal za novi prijedlog -->
<!-- Modal -->
<div class="modal fade" id="noviPrijedlogModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Novi prijedlog</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="noviPrijedlogForm">
              <div class="form-group">
                 <input type="text" class="form-control" id="naslovPrijedloga" name="naslovPrijedloga" placeholder="Naslov" >
              </div> 

              <div class="form-group">
                 <textarea class="form-control" id="opisPrijedloga" name="opisPrijedloga" placeholder="Opis" ></textarea>
              </div>   
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="profile(4,0);">Spremi</button>
      </div>
    </div>
  </div>
</div>

<!--gotov modal za novi prijedlog -->

<!-- modal za novi problem -->
<!-- Modal -->
<div class="modal fade" id="noviProblemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Novi Problem</h4>
      </div>
      <div class="modal-body">
         <form role="form" id="noviProblem">
       <div class="form-group">
             <label for="naslov">Naslov</label>
             <input type="text" class="form-control" id="naslov" name="naslov" placeholder="Naslov..." >
       </div>
       <div class="form-group">
             <label for="opis">Opis</label>
             <textarea class="form-control" id="opis" name="opis" placeholder="Opis..." ></textarea>
       </div>
        
        <div class="form-group">
        <input id="slika" name="slika" type="file" >
        </div>
        <script>
    
    $("#slika").fileinput({
    allowedFileExtensions: ["jpg", "jpeg", "JPG", "JPEG", "png","PNG"],
        uploadAsync: false,
        uploadUrl: "/hackaton/upload.php", // your upload server url
        uploadExtraData: function() {
            return {
                naslov: $("#naslov").val(),
                opis: $("#opis").val()             
        
            };
        }
    }).on('fileuploaded', function(event, data) {
      
   alert("gotovo");
});

</script>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="profile(4,0);">Spremi</button>
      </div>
    </div>
  </div>
</div>

<!--gotov modal za novi problem -->

<!-- modal za novi zahtjev za besplatni internet -->
<!-- Modal -->
<div class="modal fade" id="noviZahtjevWifiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Zahtjev za besplatni internet</h4>
      </div>
      <div class="modal-body">
        
           <p>Svaki stanovnik Dubrovnika može na mrežu prijaviti dva uređaja koja će spajati na mrežu bežičnog interneta pomoću MAC-broja svog mobitela, tableta ili računala.
Kako biste dobili lozinku za korištenje ove pogodnosti uz osobnu iskaznicu obavezno pripremite i MAC broj jednog ili dva uređaja. Uz lozinku, dobit ćete i brošuru s uputama za korištenje.</p>
        <form role="form" id="noviZahtjevWifi">
              <div class="form-group">
                 <input type="text" class="form-control" id="mac" name="mac" placeholder="MAC adresa" >
              </div> 
                  
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="zahtjevi(1,1);">Spremi</button>
      </div>
    </div>
  </div>
</div>

<!--gotov modal za novi prijedlogbesplatni internet -->