<?php 
if ( isset($cpt) && isset($cie)) :
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 xs-md-12">
      
      <div class="box box-default">
        
      <div class="box-header with-border">
        <h4><font color="#009688"><?= $detalle->a_pat.' '.$detalle->a_mat.' '.$detalle->nombres.' |'.$detalle->matricula ?></font></h4>
      </div>

      <form class="form_crear" action="<?= $helper->url($ctl, $acc, $alu)?>" method="POST"> 
        <input type="hidden" value="<?=$rndUnk?>" name="rndUnk"/>
        <div class="box-body">
        
        <div class="form-group col-md-4">
          <label>Folio</label>
          <input class="form-control" onkeyup="trun('dos',10,5)" id="dos" name="dos" required />
        </div>

        <div class="form-group col-md-4">
          <label>Monto</label>
          <input class="form-control" onkeyup="trun('tres',10,1)" id="tres" name="tres" required />
        </div>

        <div class="form-group col-md-4">
          <label>Beca</label>
          <select class="form-control"  id="siete" name="siete">
            <option value="">-- Seleccione --</option>                  
            <option value="1">0%</option>                  
            <?php $i = 5;  while ($i <= 100 ) {
              echo "<option value=".$i.">".$i."%</option>"; $i+=5;
            }?>           
          </select>
        </div>

        <div class="form-group col-md-4">
          <label>Conceptos</label>
          <select class="SelectAdvanced" style="width: 100%" id="cinco" name="cinco">
            <option value="">-- Seleccione --</option>                  
            <?= $cpt?>           
          </select>
        </div>

        <div class="form-group col-md-4">
          <label>Ciclo Escolar</label>
            <select class="SelectAdvanced" style="width: 100%" id="seis" name="seis">
              <optgroup label="Buscar en Ciclos">
                <option value="">-- Seleccione --</option>
                <?= $cie?>
              </optgroup>        
            </select>
        </div>
        </div>
        <div class="box-footer" id="make">
          <a class="btn btn-primary exe" href="#" id="_new" title="Nuevo"><i class="fa fa-plus fa-md"></i></a>
        </div>

       <div class="box-footer text-right" id="action" style="display: none;">
        <a class="btn btn-success exe" href="#"  id="_sav" title="Guardar"><strong>Guardar</strong></a>
      </div>
        
      </form>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>