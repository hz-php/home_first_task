<?php

namespace Classes\ArrayClasses;

class SearchClass
{
    public function consistentSearch(int $ind, array $array): string //Метод последовательного поиска
    {
        $n = count($array);
        for ($i = 0; $i < $n; $i ++) {
            if ($array[$i] == $ind) {
                return $i;
            }
        }
    }

    public function consIndSearch(int $ind, array $array): string //Индексно-последовательный поиск
    {
        $cnt = count($array);

    }

    public function binarySearch(int $ind, array $array): string //Бинарный поиск
    {
        $cnt = count($array);

        if ($cnt < pow(2, 31) && is_int($ind)) {
            $start = 0;
            $end = $cnt - 1;
            while (true) {
                $len = $end - $start;
                if ($len > 2) {
                    if ($len % 2 != 0) {
                        $len++;
                        $mid = (int) ($len / 2 + $start);
                    } elseif ($len >= 0) {
                        $mid = $start;
                    } else {
                        return false;
                    }
                    if ($array[$mid] == $ind) {
                        while (($mid != 0) && ($array[$mid - 1] == $ind)) {
                            $mid--;
                            return $mid;
                        }
                    } elseif ($array[$mid] > $ind) {
                        $end = $mid -1;
                    } else {
                        $start = $mid + 1;
                    }
                }
            }
        } else {
            return false;
        }
    }

}