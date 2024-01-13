<?php

// $a = 8;
// $b = 2;

// function addition($a, $b)
// {
//     return $a + $b;
// }

// function soustraction($a, $b)
// {
//     return $a - $b;
// }

// function multiplication($a, $b)
// {
//     return $a * $b;
// }

// function division($a, $b)
// {

//     return $b == 0 ? "Error" : $a / $b;
// }

// echo division(5, $b);
// full_name
// first_name
// last_name

// $prenom = "aymane";
// $nom = "mezoura";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


function full_name($first_name, $last_name)
{
    return $first_name . ' ' . $last_name;
}

// echo full_name($prenom, $nom);

function dd($array)
{
    echo "<pre>";
    // var_dump($array);
    print_r($array);
    echo "</pre>";
    exit;
}

function e($string)
{
    return strtolower(trim($string));
}
