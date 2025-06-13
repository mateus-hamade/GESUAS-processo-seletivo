<?php
use App\config\Database;
use App\controllers\Register;
use App\controllers\Consult;
use App\models\entities\CitizenManager;

require_once __DIR__ . '/../vendor/autoload.php';

$url = $_GET['url'] ?? '';

$database = new Database();
$manager = new CitizenManager($database->getDatabase());

switch($url) {    
  case 'social/cadastro':
    $controller = new Register();
    $controller->index($manager);
    break;
  
  case 'social/consulta':
    $controller = new Consult();
    $controller->index($manager);
    break;
      
  default:
    echo "Página não encontrada";
    break;
}