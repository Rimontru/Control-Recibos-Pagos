<?php 
if (!is_bool($prm)) :
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
          <th>Descripcion</th>
          <th>Acción</th>                                      
        </tr>
      </thead>
      <tbody>
      	<?php 
          if ( (count($prm))==1 ) :
            $row = $prm;
            $c1 = $this->Objmid->randing(20)."x";
            $c2 = "x".$this->Objmid->randing(20);
            echo '
              <tr>
                <td>1</td>
                <td>'.ucwords($row->descripcion).'</td>
                <td class="text-center">
                <a href="'.$helper->url($ctl, $acc, $c1.$row->id.$c2).'">
                  <div class="btn-group btn-group-xs">                      
                    <button class="btn btn-warning" title="ver">&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
                  </div>
                </a>
                </td>
              </tr>
            ';
          else :
            $i=0;
            foreach ($prm as $row) {
              $c1 = $this->Objmid->randing(20)."x";
              $c2 = "x".$this->Objmid->randing(20);
            
              $i++;
              echo '
                <tr>
                  <td>'.$i.'</td>
                  <td>'.ucwords($row->descripcion).'</td>
                  <td class="text-center">
                  <a href="'.$helper->url($ctl, $acc, $c1.$row->id.$c2).'">
                    <div class="btn-group btn-group-xs">                      
                      <button class="btn btn-warning" title="ver">&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
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

    <div class="box-footer">
      <a class="btn btn-primary" href="<?=$helper->url($ctl, 'crear', ID_DEFECTO)?>" title="Nuevo registro">
        <b>Nuevo</b>
      </a>
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
          <th>Descripcion</th>
          <th>Acción</th>                                      
        </tr>
      </thead>
    </table>
    </div>

    <div class="box-footer">
      <a class="btn btn-primary" href="<?=$helper->url($ctl, 'crear', ID_DEFECTO)?>" title="Nuevo registro">
        <b>Nuevo</b>
      </a>
    </div>

    </div>
    
  </div>
  </div>
</section>

<?php
endif;
?>   