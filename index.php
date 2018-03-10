<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);


$vasy  = [
	"id" => "0",
	"name" => "Vasy",
	'birthdate' => '1.01.1990',
	"phone" => "+38033333333"
];

$pety  = [
	"id" => "1",
	"name" => "Pety",
	'birthdate' => '1.01.1992',
	"phone" => "+38022222222"
];

$koly  = [
	"id" => "2",
	"name" => "Koly",
	'birthdate' => '1.01.1992',
	"phone" => "+38011111111"
];

require_once "classes/StudentGroupInterface.php";
require_once "classes/StudentGroup.php";


$student = new StudentGroup('group_1');

// $student->add($vasy);
// $student->add($pety);
// $student->add($koly);

// var_dump($student->get(0));
// var_dump($student->all(0, 5));
// var_dump($student->delete(5));