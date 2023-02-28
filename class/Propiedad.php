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

  /**
   * CRUD: Read -> Listar todos los registros de la base de datos
   * @return array Arreglo de objetos que contiene todos los registros
   */
  public static function all()
  {
    $query = "SELECT * FROM propiedades";
    $resultado = self::consultarSQL($query);
    return $resultado;

  }
  

  //Subida de archivos
  public function setImagen($imagen)
  {
    //Asignar al atributo de imagen el nombre de la imagen
    if ($imagen) {
      $this->imagen = $imagen;
    }
  }

  /**
   * Arreglo que contiene los errores de validacion
   * @return array
   */
  public static function getErrores()
  {
    return self::$errores;
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


  /**
   * Hace una consulta sql a la base de datos y devuelve un arreglo de objetos de la consulta SQL
   * @param string $query Consulta SQL
   * @return array
   */
  public static function consultarSQL($query){
    //Consultar la base de datos
    $resultado = self::$db->query($query);

    //Iterar los resultdos
    $array = [];
    while($registro = $resultado->fetch_assoc()){
      $array[] = self::crearObjeto($registro);
    }
    //Liberar la memoria
    $resultado->free();

    //Retornar los resultados
    return $array;
}
  /**
   * Crea un objeto de la clase actual a partir de un arreglo asociativo
   * @param array $registro Arreglo asociativo que contiene los registros
   * @return object
   */
  protected static function crearObjeto($registro){
    $objeto = new self;

    foreach($registro as $key => $value){
      if(property_exists($objeto,$key)){
        $objeto->$key = $value;
      }
    }

    return $objeto;
  }

  //Identificar y unir los atributos de la BD
  /**
   * Crear un arreglo asociativo con las columnas de la BD
   *  @return array
   */
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

  /**
   * Funcion que santiza los atributos del objeto para prevenir inyeccion sql;
   * @return array Arreglo asociativo que contiene las propiedades del objeto con los datos sanitizados
   */
  public function sanitizarAtributos()
  {
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach ($atributos as $key => $value) {
      $sanitizado[$key]  = self::$db->escape_string($value);
    }
    return $sanitizado;
  }
}
