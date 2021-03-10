<?php
class Cliente
{
	private $dni;
	private $nombre;

	private $dirrecion;
	private $telefono;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}