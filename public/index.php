<?php
session_start();

use App\controllers\Register;
use App\controllers\Consult;

require_once __DIR__ . '/../vendor/autoload.php';

$url = $_GET['url'] ?? '';


switch($url) {    
  case 'social/cadastro':
    $controller = new Register();
    $controller->index();
    break;
  
  case 'social/consulta':
    $controller = new Consult();
    $controller->index();
    break;
      
  default:
    echo "Página não encontrada";
    break;
}