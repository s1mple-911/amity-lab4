
<?php
require "config.php";

header("Content-Type: application/json; charset=UTF-8");

$students = load_students();

$total = 0;
$count = count($students);

foreach ($students as &$student) {
    $student["grade"] = grade((int)($student["marks"] ?? 0));
    $total += (int)($student["marks"] ?? 0);
}
unset($student);

$average = $count > 0
    ? round($total / $count, 2)
    : 0;

echo json_encode([
    "success" => true,
    "count" => $count,
    "students" => $students,
    "average" => $average
]);
