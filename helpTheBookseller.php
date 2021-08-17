<?php

$b = ["BBAR 150", "CDXE 515", "BKWR 250", "BTSQ 890", "DRTY 600"];
$c = ["A", "B", "C", "D"];
$res = "(A : 0) - (B : 1290) - (C : 515) - (D : 600)";
$test = stockList($b, $c);
var_dump($test);

function stockList($listOfArt, $listOfCat)
{
    $listOfCat = array_fill_keys($listOfCat, 0);
    foreach ($listOfArt as $art) {
        $category = $art[0];
        $quantity = explode(' ', $art)[1];
        if (array_key_exists($category, $listOfCat)) {
            $listOfCat[$category] += $quantity;
        }
    }

    $result = '';
    array_walk(
        $listOfCat,
        function ($item, $key) use (&$result) {
            $result .= " - ($key : $item)";
        }
    );

    return !array_sum($listOfCat) ? '' : ltrim($result, ' - ');
}
