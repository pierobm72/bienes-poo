<?php

namespace App;

use mysqli;

class ActiveRecord
{
  //Base de DATOS
  protected static $db;

  protected static $columnasDB = [];

  //Nombre de la tabla de la base de datos
  protected static $tabla = "";

  //Arreglo  que contiene los errores
  protected static $errores = [];

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
    if (!empty($this->id)) {
      //Actualizar
      $this->actualizar();
    } else {
      //Crear nuevo registro
      $this->crear();
    }
  }
  /**
   * Crear registro en la base de datos
   */
  public function crear()
  {
    $atributos = $this->sanitizarAtributos();

    $columnas = join(", ", array_keys($atributos));
    $valores = join("', '", array_values($atributos));

    //Consulta SQL
    $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ('$valores')";

    $resultado = self::$db->query($query);

    //Mensaje de exito
    if ($resultado) {
      //Mandar al index con mensaje
      header("location:/admin?resultado=1");
    }
  }
  /**
   * Actualizar registro en la base de datos
   */
  public function actualizar()
  {
    $atributos = $this->sanitizarAtributos();

    $valores = [];
    foreach ($atributos as $key => $value) {
      $valores[] = "{$key}='{$value}'";
    }
    $campos = join(", ", $valores);


    $id = self::$db->escape_string($this->id);
    $query = "UPDATE  " . static::$tabla . " SET $campos WHERE id ='$id' LIMIT 1";

    $resultado = self::$db->query($query);

    //Mensaje de exito
    if ($resultado) {
      //Mandar al index con mensaje
      header("location:/admin?resultado=2");
    }
  }

  /**
   * Eliminar registro de la base de datos
   */
  public function eliminar()
  {
    $id = self::$db->escape_string($this->id);
    $query = "DELETE FROM " . static::$tabla . " WHERE id=$id LIMIT 1";

    $resultado = self::$db->query($query);

    if ($resultado) {
      $this->borrarImagen();
      header("Location: /admin?resultado=3");
    }
  }

  /**
   * CRUD: Read -> Listar todos los registros de la base de datos
   * @return array Arreglo de objetos que contiene todos los registros
   */
  public static function all()
  {
    $query = "SELECT * FROM " . static::$tabla;
    $resultado = self::consultarSQL($query);

    return $resultado;
  }

  /**
   * Lista el registro mediante su identificador
   * @param string $id  Identificador del registro
   * @return object
   */
  public static function find($id)
  {
    $query = "SELECT * FROM " . static::$tabla . " where id='$id'";
    $resultado = self::consultarSQL($query);

    return array_shift($resultado);
  }

  //Subida de archivos
  public function setImagen($imagen)
  {
    //Elimina imagen previa
    if (!empty($this->id)) {
      $this->borrarImagen();
    }

    //Asignar al atributo de imagen el nombre de la imagen
    if ($imagen) {
      $this->imagen = $imagen;
    }
  }

  public function borrarImagen()
  {
    //Comprobar si existe archivo
    $existeArchivo = file_exists(RUTA_IMAGENES . $this->imagen);
    if ($existeArchivo) {
      unlink(RUTA_IMAGENES . $this->imagen);
    }
  }

  /**
   * Arreglo que contiene los errores de validacion
   * @return array Arreglo que contiene los errores de validacion
   */
  public static function getErrores()
  {
    return static::$errores;

  }
  /**
   * Valida que los campos del formulario esten completos y validos
   * @return array Arreglo que contiene los errores de validacion
   */
  public function validar()
  {
    static::$errores =  [];
    return static::$errores;
  }


  /**
   * Hace una consulta sql a la base de datos y devuelve un arreglo de objetos de la consulta SQL
   * @param string $query Consulta SQL
   * @return array Arreglo de objetos 
   */
  public static function consultarSQL($query)
  {
    //Consultar la base de datos
    $resultado = self::$db->query($query);

    //Iterar los resultdos
    $array = [];
    while ($registro = $resultado->fetch_assoc()) {
      $array[] = static::crearObjeto($registro);
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
  protected static function crearObjeto($registro)
  {
    $objeto = new static;

    foreach ($registro as $key => $value) {
      if (property_exists($objeto, $key)) {
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
    foreach (static::$columnasDB as $columna) {
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

  public function sincronizar($args = [])
  {
    foreach ($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}
