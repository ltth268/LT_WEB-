<?php
function sum($a, $b) {
    return $a + $b;
}

function difference($a, $b) {
    return $a - $b;
}

function product($a, $b) {
    return $a * $b;
}

function quotient($a, $b) {
    return $b != 0 ? $a / $b : "Cannot divide by zero";
}

function isPrime($num) {
    if ($num <= 1) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function isEven($num) {
    return $num % 2 == 0;
}
?>