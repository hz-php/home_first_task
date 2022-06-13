<?php
require_once "../vendor/autoload.php";

use Classes\ArrayClasses\SortClass;

if (isset($_POST['one_c']) && isset($_POST['two_c']) && $_POST['one_c'] !== "" && $_POST['two_c'] !== "") {
    $one = $_POST['one_c'];
    $two = $_POST['two_c'];
    $array = new SortClass();
    $array = $array->setArray($one, $two);
    shuffle($array);
    echo json_encode($array);
}


if (!empty($_POST['type_sort']) && $_POST['type_sort'] === "Сортировка пузырьком") {
    $time_start = microtime(true);
    $type_sort = $_POST['type_sort'];
    $one = $_POST['one_c'];
    $two = $_POST['two_c'];
    $array = new SortClass();
    $array = $array->setArray($one, $two);
    shuffle($array);
    $sort_array = new SortClass();
    $sort_array = $sort_array->bubbleSort($array);
    $time_end = microtime(true);
    $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    array_unshift($sort_array, "Время выпонения $time ms.");
    echo json_encode($sort_array, JSON_UNESCAPED_UNICODE)    ;
}


if (!empty($_POST['type_sort']) && $_POST['type_sort'] === "Сортировка вставками") {
    $time_start = microtime(true);
    $type_sort = $_POST['type_sort'];
    $one = $_POST['one_c'];
    $two = $_POST['two_c'];
    $array = new SortClass();
    $array = $array->setArray($one, $two);
    shuffle($array);
    $sort_array = new SortClass();
    $sort_array = $sort_array->insSort($array);
    $time_end = microtime(true);
    $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    array_unshift($sort_array, "Время выпонения $time ms.");

    echo json_encode($sort_array, JSON_UNESCAPED_UNICODE);
}

if (!empty($_POST['type_sort']) && $_POST['type_sort'] === "Сортировка слиянием") {
    $time_start = microtime(true);
    $type_sort = $_POST['type_sort'];
    $one = $_POST['one_c'];
    $two = $_POST['two_c'];
    $array = new SortClass();
    $array = $array->setArray($one, $two);
    shuffle($array);
    $sort_array = new SortClass();
    $sort_array = $sort_array->mergeSort($array);
    $time_end = microtime(true);
    $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    array_unshift($sort_array, "Время выпонения $time ms. ");

    echo json_encode($sort_array, JSON_UNESCAPED_UNICODE);
}

if (!empty($_POST['type_sort']) && $_POST['type_sort'] === "Быстрая сортировка") {
    $time_start = microtime(true);
    $type_sort = $_POST['type_sort'];
    $one = $_POST['one_c'];
    $two = $_POST['two_c'];
    $array = new SortClass();
    $array = $array->setArray($one, $two);
    shuffle($array);
    $sort_array = new SortClass();
    $sort_array = $sort_array->fastSort($array);
    $time_end = microtime(true);
    $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    array_unshift($sort_array, "Время выпонения $time ms.");

    echo json_encode($sort_array, JSON_UNESCAPED_UNICODE);
}

if (!empty($_POST['type_sort']) && $_POST['type_sort'] === "Сортировка выбором") {
    $time_start = microtime(true);
    $type_sort = $_POST['type_sort'];
    $one = $_POST['one_c'];
    $two = $_POST['two_c'];
    $array = new SortClass();
    $array = $array->setArray($one, $two);
    shuffle($array);
    $sort_array = new SortClass();
    $sort_array = $sort_array->selSort($array);
    $time_end = microtime(true);
    $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    array_unshift($sort_array, "Время выпонения $time ms.");

    echo json_encode($sort_array, JSON_UNESCAPED_UNICODE);
}





