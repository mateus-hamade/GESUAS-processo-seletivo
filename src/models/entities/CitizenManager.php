<?php

namespace App\models\entities;

use App\config\Database;
use App\models\entities\Citizen;

class CitizenManager {
  private Database $database;

  public function __construct(Database $database) {
    $this->database = $database;
  }

  public function addCitizen(string $name, string $nis): Citizen {
    $stmt = $this->database->prepare("INSERT INTO citizens (name, nis) VALUES (:name, :nis)");
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':nis', $nis, SQLITE3_TEXT);
    $stmt->execute();

    return new Citizen($name, $nis);
  }

  public function getCitizen(string $nis): ?Citizen {
    $stmt = $this->database->prepare("SELECT * FROM citizens WHERE nis = :nis");
    $stmt->bindValue(':nis', $nis, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
      return new Citizen($row['name'], $row['nis']);
    }

    return null;
  }
}