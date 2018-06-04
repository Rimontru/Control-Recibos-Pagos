<?php
if ($prm != 'null') {
$row = $prm;
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><font color="#009688">Datos del registro</font></h3>
    </div>

      <form class="form_crear" action="<?= $helper->url($ctl, $acc, $_GET['id'])?>" method="POST">  
      <div class="box-body">
        <div class="form-group col-md-4">
          <label>Descripción</label>
          <input class="form-control" onkeyup="trun('dos',255,5)" id="dos" name="dos" value="<?= $row->descripcion?>" required autofocus/>
        </div>
      </div>  
      <div class="box-footer" id="make">
        <a class="btn btn-primary exe" href="#" id="_new" title="Nuevo"><i class="fa fa-plus fa-md"></i></a>
        <a class="btn btn-danger exe" href="#" id="_del" title="Eliminar"><i class="fa fa-minus fa-md"></i></a>        
        <input type="hidden" id="_bam" name="_bam" value="<?= $helper->url($ctl, "eliminar", $_GET['id'])?>" />
      </div>
      <div class="box-footer text-right" id="action" style="display: none;">
        <a class="btn btn-success exe" href="#"  id="_sav" title="Guardar"><strong>Guardar</strong></a>
        <a class="btn btn-default exe" href="#" id="_cnc" title="Cancelar"><strong>Cancelar</strong></a>
        <input type="hidden" id="showNoty" value="null">
      </div>
      </form>
    </div>
  </div>
</div>

<?php  if($notify) {?>
<script>
  function noty(){
      document.getElementById('showNoty').click();
  }
  window.onload = noty;
</script>
<?php unset($notify); } }?>