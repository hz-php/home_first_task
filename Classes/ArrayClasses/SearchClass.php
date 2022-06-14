<?php

namespace Classes\ArrayClasses;

class SearchClass
{
    public function consistentSearch(int $ind, array $array): string //Метод последовательного поиска
    {
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
            if ($array[$i] == $ind) {
                return $i;
            }
        }
    }

    public function consIndSearch(int $ind, array $array): string //Индексно-последовательный поиск
    {
        $cnt = count($array);


    }

    public function binarySearch(int $value, array $array): string //Бинарный поиск
    {
        $start = 0;
        $end = count($array) - 1;
        while ($start <= $end) {
            $middle = intval(($start + $end) / 2);
            if ($array[$middle] > $value) {
                $end = $middle - 1;
            } else if ($array[$middle] < $value) {
                $start = $middle + 1;
            } else {
                return $middle;
            }
        }
        return -1;
    }



}