<?php
namespace App;

class Group {
    public string $groupName;
    public array $students = [];

    public function __construct(string $groupName) {
        $this->groupName = $groupName;
    }

    public function addStudent(Student $student): void {
        $this->students[] = $student;
    }

    public function getGroupAverage(): float {
        if (empty($this->students)) {
            return 0.0;
        }
        $totalAverage = 0.0;
        foreach ($this->students as $student) {
            $totalAverage += $student->getAverage();
        }
        return $totalAverage / count($this->students);
    }

    public function getBestStudent(): ?Student {
        if (empty($this->students)) {
            return null;
        }
        $bestStudent = $this->students[0];
        foreach ($this->students as $student) {
            if ($student->getAverage() > $bestStudent->getAverage()) {
                $bestStudent = $student;
            }
        }
        return $bestStudent;
    }
}
