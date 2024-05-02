<?php 
 declare(strict_types= 1); //Activamos el modo estricto...

// Metodo cURL para hacer una llamada a una API, funciona post, get, put, etc... 
    //Inicializar una nueva sesion de cURL; ch = cURL handle
    #$ch = curl_init(API_URL);

    //Indica que queremos recibir el resultado de la peticion y no mostrarla en pantalla
    #curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //Ejecutar la petición y guardamos el resultado 
    #$result = curl_exec($ch);  
    #$data = json_decode($result, true);

    #curl_close($ch);
function render_template (string $template, array $data = []) {
  extract($data); //Esto extrae las variables del array asociativo
  require "templates/$template.php";
}

function get_data(string $url): array {
  $result = file_get_contents($url); // Si solo se necesita hacer un GET de una API   
  $data = json_decode($result, true);
  return $data;
}

function get_until_message(int $days): string {
  return match (true) {
    $days === 0 => "Hoy Se Estrena!",
    $days === 1 => "Mañana Se Estrena!",
    $days < 7   => "Esta Semana Se Estrena!",
    $days < 30  => "Este Mes Se Entrena",
    default     => "$days Días Restantes Para El Estreno",
  };
}
