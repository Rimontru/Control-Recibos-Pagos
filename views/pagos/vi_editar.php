<?php
if (isset($cpt) && isset($cie) && isset($pag)) {
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 xs-md-12">
      
      <div class="box box-default">
        
      <div class="box-header with-border">
        <h4><font color="#009688">Datos del registro</font></h4>
      </div>

     <form class="form_crear" action="<?= $helper->url($ctl, $acc, $id_pag)?>" method="POST"> 
        <div class="box-body">
        
        <div class="form-group col-md-4">
          <label>Folio</label>
          <input class="form-control" maxlength="10" id="dos" name="dos" value="<?= $pag->folio?>" required />
        </div>

        <div class="form-group col-md-4">
          <label>Monto</label>
          <input class="form-control" maxlength="10" id="tres" name="tres" value="<?= $pag->monto?>" required />
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
          <a class="btn btn-danger exe" href="#" id="_del" title="Eliminar"><i class="fa fa-minus fa-md"></i></a>
          <input type="hidden" id="_bam" name="_bam" value="<?= $helper->url($ctl, "eliminar", $id_pag)?>">       
        </div>

        <div class="box-footer text-right" id="action" style="display: none;">
          <a class="btn btn-success exe" href="#"  id="_sav" title="Guardar"><strong>Guardar</strong></i></a>
          <a class="btn btn-default exe" href="#" id="_cnc" title="Cancelar"><strong>Cancelar</strong></i></a>
          <input type="hidden" id="showNoty" value="null">
        </div>
      </div>


      </form>
      </div>

      
    </div>
</section>
<script>
  document.getElementById("cinco").value = <?= $pag->fk_concepto?>;
  document.getElementById("seis").value = <?= $pag->fk_ciclo?>;
  document.getElementById("siete").value = <?= $pag->beca?>;
</script>
<?php } else die("No se pudo mostrar la información solicitada...");?>