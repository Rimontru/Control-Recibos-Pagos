<?php 
if (!is_null($datas)) :
?>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

    <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><font color="#009688"><?=$carrera ?></font></h3>
    </div>
    <div class="box-body">
    <table class='table table-striped TableAdvanced'>
      <thead>
        <tr>
          <th>#</th>
          <th>Grupo</th>
          <th>Salon</th>                                 
          <th>Acción</th>                                 
        </tr>
      </thead>
      <tbody>
        <?php 
          if ( (count($datas)) == 1 ) :
            $c1 = $this->secure->randing(20)."x";
            $c2 = "x".$this->secure->randing(20);
            $row = $datas;
            echo '
              <tr>
                <td>1</td>
                <td>'.ucwords($row->nomb_grupo).'</td>
                <td>'.ucwords($row->salon).'</td>
                <td class="text-center">
                <a href="'.$helper->url($ctl, $acc, $c1.$row->id_grupo.$c2).'">
                  <div class="btn-group btn-group-xs">                      
                    <button class="btn btn-warning" title="ver">&nbsp;&nbsp;&nbsp;ver alumnos por grupo&nbsp;&nbsp;&nbsp;</button>
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
            
              $i++;
              echo '
                <tr>
                  <td>'.$i.'</td>
                  <td>'.ucwords($row->nomb_grupo).'</td>
                  <td>'.ucwords($row->salon).'</td>
                  <td class="text-center">
                  <a href="'.$helper->url($ctl, $acc, $c1.$row->id_grupo.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-warning" title="ver">&nbsp;&nbsp;&nbsp;ver alumnos por grupo&nbsp;&nbsp;&nbsp;</button>
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
      <b>No se encontraron grupos en la carrera, puede que esten en otra modalidad!</b>
    </div>

    </div>
    
  </div>
  </div>
</section>

<?php
endif;
?>   