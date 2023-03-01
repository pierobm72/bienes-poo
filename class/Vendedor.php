<?php 
namespace App;
class Vendedor extends ActiveRecord {

  protected static $tabla = 'vendedores';

  protected static $columnasDB = ["id", "nombre", "apellido", "telefono"];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  function __construct($args = [])
  {
    $this->id = $args['id'] ?? '';
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
  }

  /**
   * Valida que los campos del formulario esten completos y validos
   * @return array Arreglo que contiene los errores de validacion
   */
  public function validar()
  {
    if ($this->nombre === "") {
      self::$errores[] = "El nombre es obligatorio";
    }
    if ($this->apellido === "") {
      self::$errores[] = "El apellido es obligatorio";
    }
    if ($this->telefono === "") {
      self::$errores[] = "El telefono es obligatorio";
    }

    if(!preg_match("/[0-9]{9}/", $this->telefono)  or strlen($this->telefono) > 9) {
      self::$errores[] = "Formato de teléfono no válido";
  }

    return self::$errores;

  }
}