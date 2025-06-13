<?php

namespace App\controllers;

use App\models\entities\CitizenManager;
use App\models\presentation\Message;

class Consult {
  public function index(CitizenManager $manager) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $message = new Message();
      $nis = filter_input(INPUT_POST, "nis");

      if (empty($nis)) {
        return $message->setMessage("O NIS (Número de Identificação Social) é obrigatório.", true);
      }

      $citizen = $manager->getCitizen($nis);

      if ($citizen) {
        $message->setMessage("
          <div>
            <span>Nome Completo: </span> {$citizen->getName()} 
          </div>
          <div>
            <span>NIS (Número de Identificação Social): </span>{$citizen->getNis()}
          </div>
        ", false);
      } else {
        $message->setMessage("Nenhum cidadão encontrado com o NIS informado.", true);
      }
    }

    require_once __DIR__ . '/../views/social/consult.php';
  }
}