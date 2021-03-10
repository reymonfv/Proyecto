<?php
class ClientesModel
{
	private $cn;

	public function __CONSTRUCT()
	{
		try
		{
			$this->cn = new PDO('mysql:host=localhost;dbname=examdespliegue', 'root', 'toor');
			$this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->cn->prepare("SELECT * FROM clientes");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cli = new Cliente();

				$cli->__SET('dni', $r->dni);
			$cli->__SET('nombre', $r->nombre);

			$cli->__SET('dirrecion', $r->dirrecion);
			$cli->__SET('telefono', $r->telefono);


				$result[] = $cli;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->cn->prepare("SELECT * FROM clientes WHERE dni = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

				$cli = new Cliente();

				$cli->__SET('dni', $r->dni);
			$cli->__SET('nombre', $r->nombre);

			$cli->__SET('dirrecion', $r->dirrecion);
			$cli->__SET('telefono', $r->telefono);


			return $cli;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->cn->prepare("DELETE FROM clientes WHERE dni = ?");			          

			$stm->execute(array($id));
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Cliente $data)
	{
		try 
		{
			$sql = "UPDATE clientes SET 
						dni          = ?, 
						nombre        = ?,
						dirrecion            = ?, 
						telefono = ,
					
				    WHERE dni = ?";

			$this->cn->prepare($sql)->execute(
				array(
					$data->__GET('dni'), 
					$data->__GET('nombre'), 
					$data->__GET('dirrecion'),
					$data->__GET('telefono')

					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
			$sql = "INSERT INTO clientes (dni , 
						nombre,
						dirrecion, 
						telefono) VALUES (?, ?, ?, ?)";

			$this->cn->prepare($sql)->execute(
				array(
						$data->__GET('dni'), 
					$data->__GET('nombre'), 
					$data->__GET('dirrecion'),
					$data->__GET('telefono')
				)
			);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}