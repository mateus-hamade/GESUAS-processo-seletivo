<?php 

namespace App\models\entities;

use Faker\Factory as Faker;

class NisGenerator {
  private $faker;

  public function __construct() {
    $this->faker = Faker::create();
  }

  public function generateNis(): string {
    return $this->faker->numerify('###########');
  }
}