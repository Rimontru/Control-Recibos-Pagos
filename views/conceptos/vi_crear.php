<?php
if ( isset($prm) ) {
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><font color="#009688">Datos del registro</font></h3>
    </div>
    
    <form class="form_crear_con" action="<?= $helper->url($ctl, $acc, ID_DEFECTO)?>" method="POST"> 
      <div class="box-body">
        <input type="hidden" value="<?=$rndUnk?>" name="rndUnk"/>

        <div class="form-group col-md-4">
          <label>Descripción</label>
          <input class="form-control" onkeyup="trun('dos',255,5)" id="dos" name="dos" required />
        </div>
      </div>
      <div class="box-footer text-right" id="action">
        <a class="btn btn-success exe" href="#"  id="_sav" title="Guardar"><strong>Guardar</strong></i></a>
        <input type="hidden" id="showNoty" value="null">
      </div>
    </form>
    </div>
      
    </div>
  </div>  
</section>


<?php  if($notify) {?>
<script>
  function noty(){
      document.getElementById('showNoty').click();
  }
  window.onload = noty;
</script>
<?php unset($notify); } }?>