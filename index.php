<?php

/**
 * Gestion des opérations .
 */
function addition($a, $b)
{
    return $a + $b;
}

function soustration($a, $b)
{
    return $a - $b;
}

function division($a, $b)
{
    return $a / $b;
}

function multiplication($a, $b)
{
    return $a * $b;
}

function modulo($a, $b)
{
    return $a % $b;
}


/**
 * Fonction main .
 */
function eval_expr(string $expr)
{
    //contenue de la recherche regex
    $matches = [];

    //regex servant a récuperer toutes les valeurs numerique y compris les decimaux compris entre les symbole de calcule
    preg_match_all("/(?<!\d)[-]?\d*\.?\d+|[\\%\\+\\-\\/\\*\\(\\)]/", $expr, $matches);
    print_r($matches);
}
