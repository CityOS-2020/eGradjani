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
              ?>
                              <tr>
                                <td><?php echo $rowPrijedlozi["naslov"];?></td>
                                <td><?php echo $rowPrijedlozi["opis"];?></td>
                                <td><?php echo ""?></td>
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