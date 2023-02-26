<?php

namespace App;

class Propiedad
{
  public $id;
  public $titulo;
  public $precio; 
  public $descripcion;
  public $habitacion;
  public $wc;
  public $estacionamiento;
  public $vendedor_id;

  function __construct($args = [])
  {
    $this->id = $args['id'] ?? '';
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitacion = $args['habitacion'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->vendedor_id = $args['vendedor_id'] ?? '';
    
  }
}
