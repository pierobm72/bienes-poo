<?php

namespace App;

use mysqli;

class Propiedad
{
  //Base de DATOS
  protected static $db;

  protected static $columnasDB = ["id", "titulo", "precio", "imagen", "descripcion", "habitacion", "wc", "estacionamiento", "creado", "vendedor_id"];

  //Arreglo  que contiene los errores
  protected static $errores = [];

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

  // <--- METODOS ---->

  /**
   * Obtener la conexion a la base de datos para almacenarla en la propiedad de la clase
   * @param mysqli $database - Objeto que representa la conexion a la base de datos
   */
  public static function setDB($database)
  {
    self::$db = $database;
  }

  public function guardar()
  {

    $atributos = $this->sanitizarAtributos();

    $columnas = join(", ", array_keys($atributos));
    $valores = join("', '", array_values($atributos));

    //Consulta SQL
    $query = "INSERT INTO propiedades ($columnas) VALUES ('$valores')";


    $resultado = self::$db->query($query);

    return $resultado;
  }

  //Identificar y unir los atributos de la BD
  public function atributos()
  {
    $atributos = [];
    foreach (self::$columnasDB as $columna) {
      /* Ignorar id */
      if ($columna == "id") continue;
      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }

  public function sanitizarAtributos()
  {
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach ($atributos as $key => $value) {
      $sanitizado[$key]  = self::$db->escape_string($value);
    }
    return $sanitizado;
  }

  //Subida de archivos
  public function setImagen($imagen){
    //Asignar al atributo de imagen el nombre de la imagen
    if($imagen){
      $this->imagen = $imagen;
    }
  }

  //Validacion
  public static function getErrores()
  {
    return self::$errores;
  }

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
