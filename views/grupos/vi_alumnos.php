<?php 
if (!is_null($datas)) :
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><font color="#009688"><?= $detalle ?></font></h3>
    </div>
    <div class="box-body">
    <table class='table table-striped TableAdvanced'>
      <thead>
        <tr>
          <th>#</th>
          <th>Foto</th>
          <th>Matricula</th>
          <th>Nombre</th>                                 
          <th>Sexo</th>                                 
          <th>Acción</th>                                 
        </tr>
      </thead>
      <tbody>
        <?php 
          if ( (count($datas)) == 1 ) :
            $c1 = $this->secure->randing(20)."x";
            $c2 = "x".$this->secure->randing(20);
            $row = $datas;
              if ($row->foto == "")
                $foto = "N/T"; 
              else 
                  $foto = "<img class='img-responsive' src='http://".$_SERVER['HTTP_HOST']."/sia/".(string)$row->foto."' width='50'/>";
            echo '
              <tr>
                <td>1</td>
                <td>'.$foto.'</td>
                <td>'.$row->matricula.'</td>
                <td>'.ucwords($row->nomb_alu).'</td>
                <td>'.$row->sexo.'</td>
                <td class="text-center">
                  <a href="'.$helper->url('alumnos', 'ver', $c1.$row->id_alu.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-warning" title="ver">ver</button>
                    </div>
                  </a>
                  <a href="'.$helper->url('pagos', 'registros', $c1.$row->id_alu.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-primary" title="pagos">pagos</button>
                    </div>
                  </a>
                  <a href="'.$helper->url('pagos', 'crear', $c1.$row->id_alu.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-success" title="agregar">agregar</button>
                    </div>
                  </a>
                  </td>
              </tr>
            ';/*<td class="text-center">
                <a href="'.$helper->url($ctl, $acc, $c1.$row->id_alu.$c2).'">
                  <div class="btn-group btn-group-xs">                      
                    <button class="btn btn-warning" title="ver">ver</button>
                  </div>
                </a>
                </td>*/
          else :
            $i=0;
            foreach ($datas as $row) {
              $c1 = $this->secure->randing(20)."x";
              $c2 = "x".$this->secure->randing(20);
              if ($row->foto == "")
                $foto = "N/T"; 
              else 
                  $foto = "<img class='img-responsive' src='http://".$_SERVER['HTTP_HOST']."/sia/".(string)$row->foto."' width='50'/>";
              $i++;
              echo '
                <tr>
                  <td>'.$i.'</td>
                  <td>'.$foto.'</td>
                  <td>'.$row->matricula.'</td>
                  <td>'.ucwords($row->nomb_alu).'</td>
                  <td>'.$row->sexo.'</td>
                  <td class="text-center">
                  <a href="'.$helper->url('alumnos', 'ver', $c1.$row->id_alu.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-warning" title="ver">ver</button>
                    </div>
                  </a>
                  <a href="'.$helper->url('pagos', 'registros', $c1.$row->id_alu.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-primary" title="pagos">pagos</button>
                    </div>
                  </a>
                  <a href="'.$helper->url('pagos', 'crear', $c1.$row->id_alu.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-success" title="agregar">agregar</button>
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
      <div class="box-footer">
        <input type="hidden" id="id_ciclo" value="<?=$datas[0]->fk_ciclo?>" />
        <input type="hidden" id="id_grupo" value="<?=$datas[0]->fk_grupo?>" />
        <button class="btn btn-danger" id="pdf" title="pdf">Reporte</button>
      </div>
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
      <b>No se encontraron alumnos en el grupo, puede que esten en otro grado!</b>
    </div>

    </div>
    
  </div>
  </div>
</section>

<?php
endif;
?>