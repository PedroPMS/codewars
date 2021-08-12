<?php

function pickPeaks(array $arr)
{
    $peaks = [
        "pos" => [],
        "peaks" => []
    ];
    $peakPos = null;
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $next = $i + 1;
        if ($arr[$next] > $arr[$i]) {
            $peakPos = $next;
        } elseif ($arr[$next] < $arr[$i] && $peakPos !== null) {
            $peaks["pos"][] = $peakPos;
            $peaks["peaks"][] = $arr[$i];
            $peakPos = null;
        }
    }
    return $peaks;
}
