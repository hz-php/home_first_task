<?php

namespace Classes;

class CalcClass
{
    public function calcResult(float $curr_one, float $summ = 1.00): float
    {
       if ($summ == 1.00) {
           $result = $curr_one * 1.00;
       } elseif ($summ > 1.00) {
           $result = $curr_one * $summ ;
           $result =  round($result, 2);
       }
       return $result;
    }
}
