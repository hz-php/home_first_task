<?php
require_once "../vendor/autoload.php";

use Classes\CurrencyClass;
use Classes\CalcClass;

if (!empty($_POST['first_cur'])) {
    $first_currency = $_POST['first_cur'];
}

if (empty($_POST['summa'])) {
    $summ = 1.00;
} else {
    $summ = $_POST['summa'];
}

if (!empty($_POST['first_cur'])) {
    $currency_array = new CurrencyClass();
    $currency_array = $currency_array->apiQurey();
    $currency_array = json_decode($currency_array, true);
    $array_fin[] = $currency_array['Valute'];
    foreach ($array_fin[0] as $key => $value) {
        if ($first_currency !== $key) {
            continue;
        } else {
            $curs_one = (float)$value['Value'];
        }
    }
}
$result = new CalcClass();
$result = $result->calcResult($curs_one , $summ);
echo $result;





