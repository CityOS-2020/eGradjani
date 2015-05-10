<?php
include '../../dbSettings.php';

$sql='select * from problemi where aktivan=1';
$result=mysql_query($sql);
?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">Problemi</div>
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
                  <tr><td>Naslov</td><td>Opis</td><td>Slika</td><td>Status</td><td>Radnje</td></tr>
                </thead>
                <tbody>
                 <?php
                 $sqlProblemi='select * from problemi where aktivan=1';
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
                        <td>
                          <?php 
                          if($rowProblemi["status"]==1){ 
                            ?>
                            <a href="#" onClick="problemi(3,<?php echo $rowProblemi["idProblema"];?>);"> Zaprimljeno</a>
                            <?php
                             }else if($rowProblemi["status"]==2){ 
                              ?>
                            <a href="#" onClick="problemi(4,<?php echo $rowProblemi["idProblema"];?>);">Rješeno</a>
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

