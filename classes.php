<?php 

declare (strict_types= 1);
class SuperHero {
  //Promoted properties - Asignacion inicial y dice que son publicas
  public function __construct(
    public string $name,
    public array $power,
    public string $planet
    ){}

  public function attack() {
    return "!$this->name ataca con sus poderes!";
  }

  public function show_all() {
    return get_object_vars($this);
  }

  public function description() {
    $powers = implode(", ", $this->power); //Este implode funciona para el array en una cadena de texto, ", " se indica con que se separaran los elementos y luego el array a separar.
    return "$this->name es un superhéroe que viene de
    $this->planet y tiene lo siguientes poderes: $powers";
  }

  public static function random() {
    $names = ["Thor", "IronMan", "Batman", "Wolverine", "Hulk"];
    $powers  = [ 
    ["Super Fuerza", "Volar", "Ojos Laser"], 
    ["Super Fuerza", "Super Agilidad", "Telarañas"],
    ["Regeneración", "Super Fuerza", "Garras de Adamantium"],
    ["Super Fuerza", "Volar", "Ojos Laser"],
    ["Super Fuerza", "Super Agilidad", "Cambio de Tamaño"]
    ];
    $planets = ["Asgard", "Tierra", "Gotham", "DC", "Marvel"];

    $name = $names[array_rand($names)]; // $nombre aleatorio de $nombres donde array_rand es la llave aleatoria del array $names...
    $power = $powers[array_rand($powers)];
    $planet = $planets[array_rand($planets)];

    return new self($name, $power, $planet);
  }
}

 // Estatico
$hero = SuperHero::random(); // Método estatico
echo $hero->description();

/*
    #Instanciar 
  $hero = new SuperHero("IronMan", ["Super Fuerza", "Volar", "Ojos Laser"], "Tierra");
  $hero->description(); // Método publico 
 */