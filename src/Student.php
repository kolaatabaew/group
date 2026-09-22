<?php
namespace App;

class Student {
    public string $firstName;
    public string $lastName;
    public array $grades = [];

    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function addGrade(float $grade): void {
        $this->grades[] = $grade;
    }

    public function getAverage(): float {
        if (empty($this->grades)) {
            return 0.0;
        }
        return array_sum($this->grades) / count($this->grades);
    }
}
