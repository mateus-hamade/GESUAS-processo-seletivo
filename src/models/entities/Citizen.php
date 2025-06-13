<?php

namespace App\models\entities;

class Citizen {
  private string $name;
  private string $nis;

  public function __construct($name, $nis) {
    $this->name = $name;
    $this->nis = $nis;
  }

  public function getName(): string {
    return $this->name;
  }
  public function getNis(): string {
    return $this->nis;
  }
}