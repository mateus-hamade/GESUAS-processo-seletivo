<?php

namespace App\controllers;

use App\models\entities\CitizenManager;
use App\models\presentation\Message;
use App\models\entities\NisGenerator;

class Register {
  public function index() {
    $manager = new CitizenManager();
    $nis = new NisGenerator();
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $message = new Message();
      $nome = filter_input(INPUT_POST, "nome");

      if (empty($nome)) {
        return $message->setMessage("O nome completo é obrigatório.", true);
      }

      $nisValue = $nis->generateNis();
      $citizen = $manager->addCitizen($nome, $nisValue);

      $message->setMessage(
        "Cidadão adicionado com sucesso! NIS:" . $citizen->getNis(),
        false
      );
    }

    require_once __DIR__ . '/../views/social/register.php';
  }
}