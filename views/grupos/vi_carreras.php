<?php 
if (!is_null($datas)) :
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><font color="#009688">Carreras con grupos activos</font></h3>
    </div>
    <div class="box-body">
  	<table class='table table-striped TableAdvanced'>
			<thead>
        <tr>
          <th>#</th>
          <th>Clave</th>
          <th>Carrera</th>                                 
          <th>Modalidad</th>                                 
          <th>Acción</th>                                 
        </tr>
      </thead>
      <tbody>
      	<?php 
          if ( (count($datas)) == 1 ) :
            $c1 = $this->secure->randing(20)."x";
            $c2 = "x".$this->secure->randing(20);
            $row = $datas;
            $id_mod = strtolower($row->id_mod);
            echo '
              <tr>
                <td>1</td>
                <td>'.ucwords($row->clave).'</td>
                <td>'.ucwords($row->nombre).'</td>
                <td>'.ucwords($row->descripcion).'</td>
                <td class="text-center">
                <a href="'.$helper->url($ctl, $acc, $c1.$row->id_car.'x'.$id_mod.$c2).'">
                  <div class="btn-group btn-group-xs">                      
                    <button class="btn btn-warning" title="ver">&nbsp;&nbsp;&nbsp;ver grupos en la carrera&nbsp;&nbsp;&nbsp;</button>
                  </div>
                </a>
                </td>
              </tr>
            ';
          else :
            $i=0;
            foreach ($datas as $row) {
              $c1 = $this->secure->randing(20)."x";
              $c2 = "x".$this->secure->randing(20);
              $id_mod = strtolower($row->id_mod);
              
              $i++;
              echo '
                <tr>
                  <td>'.$i.'</td>
                  <td>'.ucwords($row->clave).'</td>
                  <td>'.ucwords($row->nombre).'</td>
                  <td>'.ucwords($row->descripcion).'</td>
                  <td class="text-center">
                  <a href="'.$helper->url($ctl, $acc, $c1.$row->id_car.'x'.$id_mod.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-warning" title="ver">&nbsp;&nbsp;&nbsp;ver grupos en la carrera&nbsp;&nbsp;&nbsp;</button>
                    </div>
                  </a>
                  </td>
                </tr>
              ';
            }         
          endif;
      	?>    	
			</tbody>
		</table>
    </div>
    </div>
		
		

  </div>
  </div>
</section>
<?php 
else :
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><font color="#009688">Registros</font></h3>
    </div>
    <div class="box-body">
    <table class='table table-striped TableAdvanced'>
      <thead>
        <tr>
          <th>#</th>
          <th>Clave</th>
          <th>Carrera</th>
          <th>Acción</th>
        </tr>
      </thead>
    </table>
    </div>

    <div class="box-footer">
      <b>No se encontraron carreras a cargo de su usuario!</b>
    </div>

    </div>
    
  </div>
  </div>
</section>

<?php
endif;
?>   