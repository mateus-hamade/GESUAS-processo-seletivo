<?php

namespace App\models\entities;

use App\models\entities\Citizen;

class CitizenManager {
    private const SESSION_KEY = 'citizens';

    public function __construct() {
        if (!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }
    }

    public function addCitizen(string $name, string $nis): Citizen {
        $citizen = new Citizen($name, $nis);
        $_SESSION[self::SESSION_KEY][] = serialize($citizen);

        return $citizen;
    }

    public function getCitizen(string $nis): Citizen | null {
        foreach ($_SESSION[self::SESSION_KEY] as $serializedCitizen) {
            $citizen = unserialize($serializedCitizen);
            if ($citizen->getNis() === $nis) {
                return $citizen;
            }
        }

        return null;
    }

    public function clearAll(): void {
        $_SESSION[self::SESSION_KEY] = [];
    }
}