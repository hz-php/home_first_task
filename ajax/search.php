<?php
require_once "../vendor/autoload.php";

use Classes\ArrayClasses\SearchClass;
use Classes\ArrayClasses\SortClass;


$search_numb = (int)$_POST['search_in'];
$type_search = (string)$_POST['select'];
$type_search_array = (string)$_POST['type_search_array'];

if ($type_search_array == "Несортированнный" && $type_search == 'Последовательный поиск') {
        if (!empty($search_numb)) {
            $one = $_POST['one_c'];
            $two = $_POST['two_c'];
            if (!empty($one) && !empty($two)) {
                $array = new SortClass();
                $array = $array->setArray($one, $two);
                shuffle($array);
                $search = new SearchClass();
                $search = $search->consistentSearch($search_numb, $array);
                print_r("Индекс значения в массиве " . $search);
            } else {
                echo "Введите значения массива";
            }
        } else {
            echo "Веддите значение";
        }
} elseif ($type_search_array == "Сортированый" && $type_search == 'Последовательный поиск') {
    if (!empty($search_numb)) {
        $one = $_POST['one_c'];
        $two = $_POST['two_c'];
        if (!empty($one) && !empty($two)) {
            $array = new SortClass();
            $array = $array->setArray($one, $two);
            $search = new SearchClass();
            $search = $search->consistentSearch($search_numb, $array);
            print_r("Индекс значения в массиве " . $search);
        } else {
            echo "Введите значения массива";
        }
    } else {
        echo "Веддите значение";
    }
}
if ($type_search_array == "Несортированнный" && $type_search == 'Индексно–последовательный поиск') {

} elseif ($type_search_array == "Несортированнный" && $type_search == 'Индексно–последовательный поиск') {

}

if ($type_search == 'Бинарный поиск' && $type_search_array == "Несортированнный") {
    if (!empty($search_numb)) {
        $one = $_POST['one_c'];
        $two = $_POST['two_c'];
        if (!empty($one) && !empty($two)) {
            $array = new SortClass();
            $array = $array->setArray($one, $two);
            $search = new SearchClass();
            if(false !== $search = $search->binarySearch($search_numb, $array)) {
                print_r("Массив" . $array . "Индекс значения в массиве " . $search);
            }

        } else {
            echo "Введите значения массива";
        }
    } else {
        echo "Веддите значение";
    }
}


