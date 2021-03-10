<?php
require_once 'clientes.entidad.php';
require_once 'clientes.model.php';

// Logica
$cli = new Cliente();
$model = new ClientesModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$cli->__SET('dni',              $_REQUEST['dni']);
			$cli->__SET('nombre',          $_REQUEST['nombre']);
			
			$cli->__SET('dirrecion',            $_REQUEST['dirrecion']);
			$cli->__SET('telefono', $_REQUEST['telefono']);
	

			$model->Actualizar($cli);
			header('Location: index.php');
			break;

		case 'registrar':
				$cli->__SET('dni',          $_REQUEST['dni']);
			$cli->__SET('nombre',        $_REQUEST['nombre']);
			$cli->__SET('dirrecion',            $_REQUEST['dirrecion']);
			$cli->__SET('telefono', $_REQUEST['telefono']);
	

			$model->Registrar($cli);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['dni']);
			header('Location: index.php');
			break;
		case 'factura':
			$model->Eliminar($_REQUEST['dni']);
			header('Location: index.php');
			break;

		case 'editar':
			$cli = $model->Obtener($_REQUEST['dni']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>PRACTICA CRUD 2DAW</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $cli->dni > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                  
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">DNI</th>
                            <td><input type="text" name="dni" value="<?php echo $cli->__GET('dni'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $cli->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                             <tr>
                            <th style="text-align:left;">dirrecion</th>
                            <td><input type="text" name="dirrecion" value="<?php echo $cli->__GET('dirrecion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">telefono</th>
                            <td><input type="text" name="telefono" value="<?php echo $cli->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
						                        </tr>
               
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">DNI</th>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">dirrecion</th>
                            <th style="text-align:left;">telefono</th>
							
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('dni'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('dirrecion'); ?></td>
							<td><?php echo $r->__GET('telefono'); ?></td>
                          
						  
                            <td>
                                <a href="?action=editar&dni=<?php echo $r->dni; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&dni=<?php echo $r->dni; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>   
<a href="lFacturas.php"> Listado Complero </a>              
            </div>
        </div>
    </body>
</html>