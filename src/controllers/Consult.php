<?php

namespace App\controllers;

use App\models\entities\CitizenManager;
use App\models\presentation\Message;

class Consult {
  public function index() {   
    $manager = new CitizenManager();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $message = new Message();
      $nis = filter_input(INPUT_POST, "nis");

      if (empty($nis)) {
        return $message->setMessage("O NIS (Número de Identificação Social) é obrigatório.", true);
      }

      $citizen = $manager->getCitizen($nis);

      $message->setMessage(
        $citizen 
          ? "Nome Completo:" . $citizen->getName() . 
            "<br> NIS (Número de Indetificação Socal): " . $citizen->getNis() . ""
          : "Nenhum cidadão encontrado com o NIS informado.",
        false
      );
    }

    require_once __DIR__ . '/../views/social/consult.php';
  }
}