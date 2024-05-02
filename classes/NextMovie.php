<?php 
declare(strict_types= 1);

class NextMovie {
  public function __construct(
    private string $title,
    private int $days_until,
    private string $following_production,
    private string $release_date,
    private string $poster_url,
    private string $overview,
  ) {}
  function get_until_message(): string {
    $days = $this->days_until;
    return match (true) {
      $days === 0 => "Hoy Se Estrena!",
      $days === 1 => "Mañana Se Estrena!",
      $days < 7   => "Esta Semana Se Estrena!",
      $days < 30  => "Este Mes Se Entrena",
      default     => "$days Días Restantes Para El Estreno",
    };
  }

  public static function fetch_and_create_movie (string $api_url): NextMovie {
    $result = file_get_contents($api_url); // Si solo se necesita hacer un GET de una API   
    $data = json_decode($result, true);
    return new self(
      $data["title"],
      $data["days_until"],
      $data["following_production"]["title"] ?? "Desconocido", // ?? En caso de no haber null poner por defecto "Desconocido".
      $data["release_date"],
      $data["poster_url"],
      $data["overview"],
    );
  }


  public function get_data() {
    return get_object_vars($this);
  }
  
}

