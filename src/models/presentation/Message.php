<?php

namespace App\models\presentation;

class Message {
  private string $text = "";
  private bool $error = false;

  public function getText(): string {
    return $this->text;
  }

  public function getError(): bool {
    return $this->error;
  }

  public function setMessage($texto, $error) {
    $this->text = $texto;
    $this->error = $error;
  }
}