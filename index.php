<?php

/**
 * Gestion des opérations .
 */

function addition($a, $b, &$result, $isFirstCalc)
{
    if (!$isFirstCalc)
        $result += $b;
    else
        $result += $a + $b;
}

function soustration($a, $b, &$result, $isFirstCalc)
{
    if (!$isFirstCalc)
        $result -= $b;
    else
        $result += $a - $b;
}

function division($a, $b, &$result, $isFirstCalc)
{
    if (!$isFirstCalc)
        $result /= $b;
    else
        $result += $a / $b;
}

function multiplication($a, $b, &$result, $isFirstCalc)
{
    if (!$isFirstCalc)
        $result *= $b;
    else
        $result += $a * $b;
}

function modulo($a, $b, &$result, $isFirstCalc)
{
    if (!$isFirstCalc)
        $result %= $b;
    else
        $result += $a % $b;
}


/**
 * Fonction main .
 */

function eval_expr(string $expr)
{
    //variable contenant le resultat du calcul .
    $result = 0;

    //contenue de la recherche regex .
    $matches = [];
    $isFirstCalc = true;

    //regex servant a récuperer toutes les valeurs numerique y compris les decimaux compris entre les symboles de calcul .
    preg_match_all("/(?<!\d)[-]?\d*\.?\d+|[\\%\\+\\-\\/\\*\\(\\)]/", $expr, $matches);

    //réinitialisation du tableau $matches .
    $matches = $matches[0];

    foreach ($matches as $index => $res) {
        if (!is_numeric($res)) {
            if ($res === "+") {
                addition($matches[$index - 1], $matches[$index + 1], $result, $isFirstCalc);
                $isFirstCalc = false;
            } elseif ($res === "-") {
                soustration($matches[$index - 1], $matches[$index + 1], $result, $isFirstCalc);
                $isFirstCalc = false;
            } elseif ($res === "/") {
                division($matches[$index - 1], $matches[$index + 1], $result, $isFirstCalc);
                $isFirstCalc = false;
            } elseif ($res === "*") {
                multiplication($matches[$index - 1], $matches[$index + 1], $result, $isFirstCalc);
            } elseif ($res === "%") {
                modulo($matches[$index - 1], $matches[$index + 1], $result, $isFirstCalc);
                $isFirstCalc = false;
            }
        }
    }
    return "$result\n";
}
