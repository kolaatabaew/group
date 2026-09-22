<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Student;
use App\Group;

function printStudentInfo(Student $student): void {
    echo "Студент: {$student->firstName} {$student->lastName}\n";
    echo "Средний балл: " . round($student->getAverage(), 2) . "\n";
    echo "---------------------------\n";
}

function printGroupInfo(Group $group): void {
    echo "=== Группа: {$group->groupName} ===\n";
    echo "Количество студентов: " . count($group->students) . "\n";
    echo "Общий средний балл группы: " . round($group->getGroupAverage(), 2) . "\n";
    echo "===========================\n\n";
}

$student1 = new Student("Николай", "Атабаев");
$student1->addGrade(5);
$student1->addGrade(5);
$student1->addGrade(4);

$student2 = new Student("Иван", "Мусанов");
$student2->addGrade(4);
$student2->addGrade(4);
$student2->addGrade(5);

$student3 = new Student("Костя", "Закорюкин");
$student3->addGrade(3);
$student3->addGrade(4);
$student3->addGrade(4);

$group = new Group("П-31");
$group->addStudent($student1);
$group->addStudent($student2);
$group->addStudent($student3);

echo "ИНФОРМАЦИЯ О СТУДЕНТАХ:\n";
printStudentInfo($student1);
printStudentInfo($student2);
printStudentInfo($student3);

printGroupInfo($group);

$best = $group->getBestStudent();
if ($best) {
    echo "ЛУЧШИЙ СТУДЕНТ В ГРУППЕ:\n";
    echo "{$best->firstName} {$best->lastName} со средним баллом " . round($best->getAverage(), 2) . "\n";
}
