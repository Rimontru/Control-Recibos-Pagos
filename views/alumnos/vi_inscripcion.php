<?php
if ($prm != 'null') {
?>

<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

      <div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title"><font color="#009688">Datos Personales</font></h3>
      </div>

      <form class="form_crear" role="form">
        <div class="box-body">
          
          <div class="form-group col-md-4">
            <img class="img card-img" src="<?="http://".$_SERVER['HTTP_HOST']."/sia/".$prm->foto?>" alt="..." width="250" height="250"/>
          </div>

          <div class="form-group col-md-8">
            <label>Nombre(s)</label>
            <input class="form-control" id="tres" name="tres" 
            value="<?=$prm->nombres.' '.$prm->a_pat.' '.$prm->a_mat?>"/>
          </div>        

          <div class="form-group col-md-8">
            <label>Genero</label>
            <select class="form-control"  id="seis" name="seis">
              <option value="">-- Seleccione --</option>
              <option value="H">Hombre</option>
              <option value="M">Mujer</option>
            </select>
          </div>

          <div class="form-group col-md-8">
            <label>Celular</label>
            <input class="form-control" id="siete" name="siete" value="<?=$prm->celular?>"/>
          </div>

          <ul class="nav nav-tabs col-md-12">
            <h5><font color="#009688">Datos Escolares</font></h5>
          </ul>

          <br>
          <div class="row">      
          <div class="form-group col-md-4">
            <label>Matricula</label>
            <input class="form-control" id="dos" name="dos" value="<?=$prm->matricula?>"/>
          </div>
                
          <div class="form-group col-md-4">
            <label>Ciclo Escolar</label>
              <select class="SelectAdvanced" style="width: 100%" id="doce" name="doce">
                <optgroup label="Buscar en Ciclos">
                  <option value="">-- Seleccione --</option>
                  <?=$ciclos?>
                </optgroup>        
              </select>
          </div>

          <div class="form-group col-md-4">
            <label>Grupo</label>
              <select class="SelectAdvanced" style="width: 100%" id="trece" name="trece">
                <optgroup label="Buscar en Grupos">
                  <option value="">-- Seleccione --</option>
                  <?=$grupos?>
                </optgroup>
              </select>
          </div> 
          </div>
          
          <div class="row">
          <div class="form-group col-md-4">
            <label>Fecha de Inscripción</label>
            <input class="form-control" id="diez" name="diez" value="<?=$prm->inscripcion?>"/>
          </div>   
          
          <div class="form-group col-md-4">
            <label>Tipo de ingreso</label>
            <select class="form-control"  id="nueve" name="nueve">
              <option value="">-- Seleccione --</option>
              <option value="Nuevo Ingreso">Nuevo Ingreso</option>
              <option value="Regular">Regular</option>
              <option value="Repetidor">Repetidor</option>
            </select>
          </div>        

          <div class="form-group col-md-4">
            <label>Estatus</label>
            <select class="form-control"  id="once" name="once">
              <option value="">-- Seleccione --</option>                  
              <option value="1"> Activo </option>                  
              <option value="0"> Baja </option>                  
            </select>
          </div>
          </div>         
        </div>
      </form>
    </div>
  </div>
</section>

<script type="text/javascript">
  document.getElementById("seis").value = "<?= (string)$prm->sexo?>";
  document.getElementById("doce").value = <?= $prm->fk_ciclo?>;
  document.getElementById("trece").value = "<?= (string)$prm->fk_grupo?>";
  document.getElementById("nueve").value = "<?= (string)$prm->tipo_ingreso?>";
  document.getElementById("once").value = <?= $prm->edo?>;
</script>

<?php
} else 
  die("No se puede cargar la vista...");
?>

