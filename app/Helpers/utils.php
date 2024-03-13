<?php
if (!function_exists("convertNumberToNomenclature")){
    function convertNumberToNomenclature($number)
    {
        if ($number < 1000) {
            return $number; // Retourne le nombre tel quel
        } elseif ($number < 1000000) {
            $nomenclature = floor($number / 1000) . 'K'; // Convertit en milliers (K)
        } elseif ($number < 1000000000) {
            $nomenclature = floor($number / 1000000) . 'M'; // Convertit en millions (M)
        } else {
            $nomenclature = floor($number / 1000000000) . 'B'; // Convertit en milliards (B)
        }

        if ($number % 1000 !== 0 && $number >= 100) {
            $nomenclature = '+' . $nomenclature;
        }

        return $nomenclature;
    }
}
