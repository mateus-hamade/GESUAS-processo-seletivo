<?php

namespace App\config;

use SQLite3;

class Database extends SQLite3 {
  function __construct() {
    $this->open(__DIR__ . '/../database/social.db');
    $this->createTable();
  }

  private function createTable(): void {
    $this->exec("CREATE TABLE IF NOT EXISTS citizens (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      name TEXT NOT NULL,
      nis TEXT NOT NULL UNIQUE
    )");
  }

  public function getDatabase(): SQLite3 {
    return $this;
  }
}