<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">
<!--
      <div class="box box-default">
      	<div class="box-header with-border">
		     	<h3 class="box-title"></h3>
		    </div>

    	<form class="search" action="<?= $helper->url($ctl, "buscar")?>" method="POST" role="form">
     		<div class="box-body">
          <div class="form-group col-md-8 col-md-offset-2">
             <label>Matricula / Apellidos</label>
             <input class="form-control" onkeyup="trun('src',255,5)" id="src"  name="ipt_search" required autofocus>
					</div> 
				</div>

           <div class="box-footer text-center">
            <button class="btn btn-primary" type="submit" title="Consultar">Consultar</button>
          </div>
				
       </form>
      </div> -->
<?php 
$c1 = $this->Objmid->randing(20)."x";
$c2 = "x".$this->Objmid->randing(20);

switch ($load) {
/*	case 1: /*busqueda del alumno
		if ( count($datas) == 1 ) {
			$row = $datas;				
				if ($row->foto == "")
					$foto = "N/T"; 
				else 
   					$foto = "<img class='img-responsive' src='../../".(string)$row->foto."' width='50'/>";

        echo "<div class='box'>
        				<div class='box-header with-border'>
						     	<h3 class='box-title'>sadas</h3>
						    </div>
        				<div class='box-body'><table class='table col-md-12'>
	      				<thead>
	                <tr>
	                  <th>Foto</th>	                  
	                  <th>Matricula</th>	                  
	                  <th>Nombre</th>	                  
	                  <th>Cursa</th>	                  
	                  <th>Estatus</th>
	                  <th>Acción</th>
	                </tr>
	              </thead>
              	<tbody>        				
		              <tr>
		                <td>".$foto."</td>
		                <td>".$row->matricula."</td>
		                <td>".ucwords($row->NombreCompleto)."</td>
		                <td>".ucwords($row->grado)."°</td>
		                <td>".ucwords($row->tipo_ingreso)."</td>
		                <td class='text-center'>
		                	<a href='".$helper->url( $ctl, $acc, $c1.$row->id_alu.$c2 )."'>
												<div class='btn-group btn-group-xs'>                      
				                  <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
				                </div>
			                </a>
		                	<a href='".$helper->url( $ctl, "crear", $c1.$row->id_alu.$c2 )."'>
			                	<div class='btn-group btn-group-xs'>                      
				                  <button class='btn btn-success' title='nuevo'>nuevo</button>
				                </div>
		                	</a>
		                </td>
		              </tr>
		            </tbody>
            	</table></div></div>";

		} else {

				echo "<div class='box'>
								<div class='box-header with-border'>
						     	<h3 class='box-title'>sadas</h3>
						    </div>
							<div class='box-body'><table class='table table-striped TableAdvanced'>
								<thead>
                  <tr>
                    <th>Foto</th>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Cursa</th>
                    <th>Estatus</th>
                    <th>Acción</th>                                      
                  </tr>
                </thead>
                <tbody>";
				$max = 1;
				foreach($datas AS $row) { 
					/*if ($max <= 25) {} por la sobrecarga de datos
					$c1 = $this->Objmid->randing(20)."x";
					$c2 = "x".$this->Objmid->randing(20);

         	if ($row->foto == "") 
       			$foto = "N/T"; 
       		else 
       			$foto = "<img class='img-responsive' src='../../".(string)$row->foto."' width='50'/>";
          		echo "
								<tr>
								  <td>".$foto."</td>
								  <td>".$row->matricula."</td>
								  <td>".ucwords($row->NombreCompleto)."</td>
								  <td>".ucwords($row->grado)."°</td>
								  <td>".ucwords($row->tipo_ingreso)."</td>
								  <td class='text-center'>
									  <a href='".$helper->url($ctl, $acc, $c1.$row->id_alu.$c2)."'>
									  	<div class='btn-group btn-group-xs'>                      
			                  <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
			                </div>
									  </a>
									  <a href='".$helper->url($ctl, "crear", $c1.$row->id_alu.$c2)."'>
									  	<div class='btn-group btn-group-xs'>                      
			                  <button class='btn btn-success' title='nuevo'>nuevo</button>
			                </div>
									  </a>
								  </td>
								</tr>";                 
        }

		}
			echo "</tbody></table></div></div>";
		break;

	case 2: al inicio
     	echo "";
   		break; 
   		*/

   	case 3: /*registros por ciclo*/
   	$c1 = $this->Objmid->randing(20)."x";
	$c2 = "x".$this->Objmid->randing(20);

   	$mesLetra = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');
     	if ( count($datas) == 1 ) {
				$row = $datas;

        echo "<div class='box'>
        				<div class='box-header with-border'>
						     	<h3 class='box-title'>$detalle->a_pat $detalle->a_mat $detalle->nombres |$detalle->matricula</h3>
						    </div>
        			<div class='box-body'><table class='table col-md-12'>
	      				<thead>
	                <tr>
	                  <th>#</th>
	                  <th>No. de recibos</th>
	                  <th>Monto de pagos</th>
	                  <th>Ciclo</th>
	                  <th>Acción</th>
	                </tr>
	              </thead>
              	<tbody>        				
		              <tr>
										<td>1</td>
		                <td>".$row->totalRecibos."</td>
									  <td>$".number_format($row->montoRecibos,2)."</td>
									  <td>".ucwords(trim($mesLetra[$row->mes_inicio]." / ".$mesLetra[$row->mes_fin]." ".$row->anio))."</td>
		               	<td class='text-center'>
		               		<a href='".$helper->url($ctl, $acc, $c1.$row->id_alu."x".$row->id_cie.$c2 )."'>
		               			<div class='btn-group btn-group-xs'>                      
				                  <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
				                </div>
		               		</a>
		               	</td>
		              </tr>
		            </tbody>
            	</table></div></div>";

		} else {

				echo "<div class='box'>
								<div class='box-header with-border'>
						     	<h3 class='box-title'>$detalle->a_pat $detalle->a_mat $detalle->nombres |$detalle->matricula</h3>
						    </div>
							<div class='box-body'><table class='table table-striped TableAdvanced'>
								<thead>
                  <tr>
                    <th>#</th>	                  
	                  <th>No. de recibos</th>	                  
	                  <th>Monto de pagos</th>	                  
	                  <th>Ciclo</th>
                    <th>Acción</th>                                      
                  </tr>
                </thead>
                <tbody>";
				$max = 1;
				$i = 1;
				foreach($datas AS $row) { 
					   	$c1 = $this->Objmid->randing(20)."x";
							$c2 = "x".$this->Objmid->randing(20);

					/*if ($max <= 25) {} por la sobrecarga de datos*/         
          		echo "          		
								<tr>
								  <td>".$i."</td>
	                <td>".$row->totalRecibos."</td>
								  <td>$".number_format($row->montoRecibos,2)."</td>
								  <td>".ucwords(trim($mesLetra[$row->mes_inicio]." / ".$mesLetra[$row->mes_fin]." ".$row->anio))."</td>
	               	<td class='text-center'>
	               		<a href='".$helper->url($ctl, $acc, $c1.$row->id_alu."x".$row->id_cie.$c2 )."'>
	               			<div class='btn-group btn-group-xs'>                      
			                  <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
			                </div>
	               		</a>
	               	</td>
								</tr>";   
				$i++;              
      	}
		}

			echo "</tbody></table></div></div>";
   		break;

   		case 4: /*detalle de registro*/
   			$c1 = $this->Objmid->randing(20)."x";
				$c2 = "x".$this->Objmid->randing(20);

   	$mesLetra = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');
     	if ( count($datas) == 1 ) {
				$row = $datas;

        echo "<div class='box'>
								<div class='box-header with-border'>
						     	<h3 class='box-title'>$detalle->a_pat $detalle->a_mat $detalle->nombres |$detalle->matricula</h3>
						    </div>
        			<div class='box-body'><table class='table col-md-12'>
	      				<thead>
	                <tr>
	                  <th>#</th>
	                  <th>Folio</th>
	                  <th>Monto</th>
	                  <th>Concepto</th>
	                  <th>Ciclo</th>
	                  <th>Acción</th>
	                </tr>
	              </thead>
              	<tbody>        				
		              <tr>
										<td>1</td>
		                <td>".ucwords($row->folio)."</td>
									  <td>$".number_format($row->monto,2)."</td>
									  <td>".ucwords($row->descripcion)."</td>
									  <td>".ucwords(trim($mesLetra[$row->mes_inicio]." / ".$mesLetra[$row->mes_fin]." ".$row->anio))."</td>
		               	<td class='text-center'>
		               		<a href='".$helper->url($ctl, $acc, $c1.$row->id_pag.$c2 )."'>
		               			<div class='btn-group btn-group-xs'>                      
				                  <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
				                </div>
		               		</a>
		               	</td>
		              </tr>
		            </tbody>
            	</table></div></div>";

		} else {

				echo "<div class='box'>
								<div class='box-header with-border'>
						     	<h3 class='box-title'>$detalle->a_pat $detalle->a_mat $detalle->nombres |$detalle->matricula</h3>
						    </div>
							<div class='box-body'><table class='table table-striped TableAdvanced'>
								<thead>
                  <tr>
                    <th>#</th>	                  
	                  <th>Folio</th>	                  
	                  <th>Monto</th>	                  
	                  <th>Concepto</th>	                  
	                  <th>Ciclo</th>
                    <th>Acción</th>                                      
                  </tr>
                </thead>
                <tbody>";
				$max = 1;
				$i = 1;
				foreach($datas AS $row) { 
					$c1 = $this->Objmid->randing(20)."x";
					$c2 = "x".$this->Objmid->randing(20);
					/*if ($max <= 25) {} por la sobrecarga de datos*/         
          		echo "          		
								<tr>
								  <td>".$i."</td>
	               <td>".ucwords($row->folio)."</td>
									  <td>$".number_format($row->monto,2)."</td>
									  <td>".ucwords($row->descripcion)."</td>
									  <td>".ucwords(trim($mesLetra[$row->mes_inicio]." / ".$mesLetra[$row->mes_fin]." ".$row->anio))."</td>
		               	<td class='text-center'>
		               		<a href='".$helper->url($ctl, $acc, $c1.$row->id_pag.$c2 )."'>
		               			<div class='btn-group btn-group-xs'>                      
				                  <button class='btn btn-warning' title='ver'>&nbsp;&nbsp;&nbsp;ver&nbsp;&nbsp;&nbsp;</button>
				                </div>
		               		</a>
		               	</td>
								</tr>";   
				$i++;              
      	}
		}

			echo "</tbody></table></div></div>";
   		break;
   
	default :
   echo "
   <div class='box box-default'>
   	No hay registros guardados...
   </div>
   	";
}

?>
</section>
	

<?php  if( isset($notify) ) { 
	echo '<input type="hidden" id="showNoty" value="null">';
?>
<script>
  function noty(){
      document.getElementById('showNoty').click();
  }
  window.onload = noty;
</script>
<?php unset($notify); } ?>
