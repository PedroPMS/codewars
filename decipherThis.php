<?php

function decipherThis($str)
{
    $words = explode(' ', $str);
    $decipher = array_map(function ($word) {
        $asciCode = filter_var($word, FILTER_SANITIZE_NUMBER_INT);
        $translatedString = str_replace($asciCode, chr($asciCode), $word);

        $lastCharPosition = strlen($translatedString) - 1;
        if ($lastCharPosition) {
            $secondLetter = $translatedString[1];
            $translatedString[1] = $translatedString[$lastCharPosition];
            $translatedString[$lastCharPosition] = $secondLetter;
        }

        return $translatedString;
    }, $words);

    return implode(' ', $decipher);
}
