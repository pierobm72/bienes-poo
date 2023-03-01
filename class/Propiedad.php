<?php 
namespace App;

class Propiedad extends ActiveRecord {

  protected static $tabla = "propiedades";
  
  protected static $columnasDB = ["id", "titulo", "precio", "imagen", "descripcion", "habitacion", "wc", "estacionamiento", "creado", "vendedor_id"];

  //Propiedades
  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitacion;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedor_id;

  //Constructor
  function __construct($args = [])
  {
    $this->id = $args['id'] ?? '';
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitacion = $args['habitacion'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedor_id = $args['vendedor_id'] ?? '';
  }

  /**
   * Valida que los campos del formulario esten completos y validos
   * @return array Arreglo que contiene los errores de validacion
   */
  public function validar()
  {
    if ($this->titulo === "") {
      self::$errores[] = "El titulo es obligatorio";
    }

    if ($this->precio === "") {
      self::$errores[] = "El precio es obligatorio";
    }

    if (strlen($this->descripcion) < 1) {
      self::$errores[] = "La descripcion es obligatoria y debe ser mayor a 50 caracteres";
    }

    if ($this->habitacion === "") {
      self::$errores[] = "La habitacion es obligatoria";
    }

    if ($this->wc === "") {
      self::$errores[] = "El baño es obligatoria";
    }

    if ($this->estacionamiento === "") {
      self::$errores[] = "El numero de lugares de estacionamiento es obligatoria";
    }

    if ($this->vendedor_id === "") {
      self::$errores[] = "Elige un vendedor";
    }

    if ($this->imagen === "") {
      self::$errores[] = "La imagen es obligatoria";
    }
    return self::$errores;
  }
}