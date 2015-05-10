<?php
include '../../dbSettings.php';

$sql='select z.*,t.naziv as tipZahtjeva,g.ime as ime,g.prezime as prezime from zahtjevi z
inner join tipZahtjeva t on t.idTipZahtjeva=z.idTipZahtjeva
inner join gradjani g on g.idGradjani=z.idGradjanina
where aktivan=1';

$result=mysql_query($sql);
?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">Zahtjevi</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
           
        </div>
    </div>
    <div class="row" style="padding-top:30px;">
      <div class="col-md-12">
        <div class="table-responsive" style="padding:10px;">
          <table class="table table-striped" id="neaktvniAgenti" style="padding-top:20px;">
          <thead>
                  <tr><td>Podnositelj</td><td>Zahtjev</td><td>Prilozi</td><td>Status</td><td>Radnje</td></tr>
                </thead>
                <tbody>
                 
                <?php
                 while($row=mysql_fetch_array($result)){
                  ?>
                    <tr><td><?php echo $row["ime"].' '.$row["prezime"];?></td>
                        <td><?php echo $row["tipZahtjeva"];?></td>
                        <td></td>
                        <td>
                        <?php
                        if($row["status"]==1){
                          echo 'Novi';
                        }else if($row["status"]==2){
                          echo 'Zaprimljen';
                        }else if($row["status"]==3){
                          echo 'Rješeno';                
                        }
                        ?>
                        </td>
                        <td>
                          <input type="file" id="prilog_<?php echo $row["idZahtjeva"];?>" name="prilog_<?php echo $row["idZahtjeva"];?>"/>
<script>
                          $("#prilog_<?php echo $row['idZahtjeva'];?>").fileinput({
        allowedFileExtensions: ["jpg", "jpeg", "JPG", "JPEG", "png","PNG", "pdf", "PDF","doc","DOC","docx","DOCX"],
        uploadAsync: false,
        showPreview:false,
        uploadUrl: "/hackaton/poslovanje/upload.php", // your upload server url
        uploadExtraData: function() {
            return {
                idZahtjeva: <?php echo $row["idZahtjeva"];?>
                            
        
            };
        }
    }).on('fileuploaded', function(event, data) {
      
   
});
    </script>
                          <?php 

                          if($row["status"]==1){ 
                            ?>
                            <a href="#" onClick="zahtjevi(1,<?php echo $row["idZahtjeva"];?>);"> Zaprimljeno</a>
                            <?php
                             }else if($row["status"]==2){ 
                              ?>
                            <a href="#" onClick="zahtjevi(2,<?php echo $row["idZahtjeva"];?>);">Rješeno</a>
                            <?php 
                          }

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

