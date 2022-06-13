<?php

namespace Classes\ArrayClasses;

class SortClass
{
    public $array;

    public function setArray(int $one, int $two): array //Метод генерации массива
    {
        return $this->array = range($one, $two);
    }

    public function bubbleSort(array $array): array
    {
        $cnt = count($array);
        for ($i = 0; $i < $cnt; $i++) {
            for ($j = $cnt - 1; $j > $i; $j--) {
                if ($array[$j] < $array[$j - 1]) {
                    $elem = $array[$j];
                    $array[$j] = $array[$j - 1];
                    $array[$j - 1] = $elem;
                }
            }
        }
        return $array;
    }

    public function insSort(array $array): array
    {
        $cnt = count($array);
        for ($i = 0; $i < $cnt; $i++) {
            $one_i = $array[$i];
            $prev_val = $i - 1;
            while (isset($array[$prev_val]) && $array[$prev_val] > $one_i) {
                $array[$prev_val + 1] = $array[$prev_val];
                $array[$prev_val] = $one_i;
                $prev_val--;
            }
        }
        return $array;
    }

    public function mergeSort(array $arr): array
    {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }

        $left = array_slice($arr, 0, (int)($count / 2));
        $right = array_slice($arr, (int)($count / 2));

        $left = $this->mergeSort($left);
        $right = $this->mergeSort($right);

        return $this->merge($left, $right);
    }

    public function merge(array $left, array $right): array
    {
        $ret = array();
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] < $right[0]) {
                array_push($ret, array_shift($left));
            } else {
                array_push($ret, array_shift($right));
            }
        }

        array_splice($ret, count($ret), 0, $left);
        array_splice($ret, count($ret), 0, $right);

        return $ret;
    }

    public function fastSort(array $array): array
    {
        $count = count($array);

        if ($count<=1) {
            return $array;
        }

        $baseValue = $array[0];
        $leftArr = $rightArr = [];

        for ($i=1; $i<$count; $i++) {
            if ($baseValue > $array[$i]) {
                $leftArr[] = $array[$i];
            } else {
                $rightArr[] = $array[$i];
            }
        }
        $leftArr = $this->fastSort($leftArr);
        $rightArr = $this->fastSort($rightArr);

        return array_merge($leftArr,[$baseValue],$rightArr);
    }

    public function selSort(array $array): array
    {
        $size = count($array);

        for ($i = 0; $i < $size-1; $i++)
        {
            $min = $i;

            for ($j = $i + 1; $j < $size; $j++) {
                if ($array[$j] < $array[$min]) {
                    $min = $j;
                }
            }

            $temp = $array[$i];
            $array[$i] = $array[$min];
            $array[$min] = $temp;
        }
        return $array;
    }
}

