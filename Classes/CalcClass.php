<?php


namespace Classes;


class CalcClass
{
    public function calcResult(float $curr_one, float $summ = 1.00)
    {
       if ($summ == 1.00){
           $result = $curr_one * 1.00;
           return $result;
       }elseif($summ > 1.00){
           $result = $curr_one * $summ ;
           return round($result, 2);
       }
    }
}