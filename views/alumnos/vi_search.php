<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">

      <div class="box box-default">
      	<div class="box-header with-border">
		     	<h3 class="box-title">Consultar Datos</h3>
		    </div>

    	<form class="search" action="<?= $helper->url($ctl, $acc)?>" method="POST" role="form">
     		<div class="box-body">
          <div class="form-group col-md-8 col-md-offset-2">
             <label>Nombre de la carrera</label>
             <input class="form-control" onkeyup="trun('src',255,5)" id="src" name="ipt_search" required autofocus>
					</div> 
				</div>

           <div class="box-footer text-center">
            <button class="btn btn-primary" type="submit" title="Consultar">Consultar</button>
          </div>
				
       </form>
      </div>
<?php 
switch ($load) {
  case 2: /*al inicio*/
     echo "";
    break;

  case 8: /*busqueda del grupo*/
      $c1 = $this->secure->randing(20)."x";
      $c2 = "x".$this->secure->randing(20);
    if ( count($datas) == 1 ) {
      $row = $datas;        

        echo "<div class='box'><div class='box-body'><table class='table col-md-12'>
                <thead>
                  <tr>
                    <th>Clave</th>                    
                    <th>Grado</th>                    
                    <th>Carrera</th>                    
                    <th>Modalidad</th>                    
                    <th>Acción</th>                                                           
                  </tr>
                </thead>
                <tbody>               
                  <tr>
                    <td>".strtoupper($row->id_carrera)."</td>
                    <td>".$row->grado."</td>
                    <td>".ucwords($row->nomb_car)."</td>
                    <td>".ucwords($row->modalidad)."</td>
                    <td class='text-center'>
                      <a href='".$helper->url($ctl, $acc, $c1.$row->id_grupo.$c2 )."'>
                        <div class='btn-group btn-group-xs'>                      
                          <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
                        </div>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table></div></div>";

    } else {

        echo "<div class='box'><div class='box-body'><table class='table table-hover TableAdvanced'>
                <thead>
                  <tr>
                   <th>Clave</th>                   
                    <th>Grado</th>                    
                    <th>Carrera</th>                    
                    <th>Modalidad</th>                    
                    <th>Acción</th>                                      
                  </tr>
                </thead>
                <tbody>";
        $max = 1;
        foreach($datas AS $row) { 
            $c1 = $this->secure->randing(20)."x";
            $c2 = "x".$this->secure->randing(20);
          /*if ($max <= 25) {} por la sobrecarga de datos*/
          echo "
              <tr>
                <td>".strtoupper($row->id_carrera)."</td>
                <td>".$row->grado."</td>
                <td>".ucwords($row->nomb_car)."</td>
                <td>".ucwords($row->modalidad)."</td>
                <td class='text-center'>
                  <a href='".$helper->url($ctl, $acc, $c1.$row->id_grupo.$c2 )."'>
                    <div class='btn-group btn-group-xs'>                      
                      <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
                    </div>
                  </a>
                </td>
              </tr>";                 
        }

    }
      echo "</tbody></table></div></div>";
    break;

  case 9:
      $c1 = $this->secure->randing(20)."x";
      $c2 = "x".$this->secure->randing(20);

    if ( count($datas) == 1 ) {
      $row = $datas;        

        echo "<div class='box'><div class='box-body'><table class='table col-md-12'>
                <thead>
                  <tr>
                    <th>#</th>                    
                    <th>matricula</th>                    
                    <th>Nombre</th>                   
                    <th>Acción</th>                                                           
                  </tr>
                </thead>
                <tbody>               
                  <tr>
                   <td>1</td>
                   <td>".$row->matricula."</td>
                   <td>".ucwords($row->a_pat." ".$row->a_mat." ".$row->nombres)."</td>
                   <td class='text-center'>
                    <a href='".$helper->url("pagos", "listar", $c1.$row->id.$c2 )."'>
                      <div class='btn-group btn-group-xs'>                      
                        <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
                      </div>
                    </a>
                    </td>
                  </tr>
                </tbody>
              </table></div></div>";

    } else {

        echo "<div class='box'><div class='box-body'><table class='table table-hover TableAdvanced'>
                <thead>
                  <tr>
                   <th>#</th>                   
                    <th>Matricula</th>                    
                    <th>Nombre</th>                   
                    <th>Acción</th>                                      
                  </tr>
                </thead>
                <tbody>
              ";
        $max = 1;

        foreach($datas AS $row) { 
            $c1 = $this->secure->randing(20)."x";
            $c2 = "x".$this->secure->randing(20);
            /*if ($max <= 25) {} por la sobrecarga de datos*/

          echo "
                <tr>
                 <td>".$max++."</td>
                 <td>".$row->matricula."</td>
                 <td>".ucwords($row->a_pat." ".$row->a_mat." ".$row->nombres)."</td>
                 <td class='text-center'>
                  <a href='".$helper->url("pagos", "listar", $c1.$row->id.$c2 )."'>
                    <div class='btn-group btn-group-xs'>                      
                      <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
                    </div>
                  </a>
                  </td>
                </tr>
              ";                 
        }

    }
      echo "</tbody></table></div></div>";
    break;
   
  default :
   echo "No se encontraron resultados...";
}

?>
</section>