<?php

$variable = 'aaaaaaa';

echo $variable . '<br />';

$variable = 'bbbbbb';

echo $variable . '<br />';

function a(){
    $variable = 'cccccc';

}
a();

echo $variable . '<br />';

function b(){

    global $variable;

    $variable = 'ddddd';
}

b();

echo $variable . '<br />';

function c(){
    global $new;
    
    $new = 'new';
}
c();

echo $new . '<br />';

include ("zmienne2.php");

global $otherVariable; 

echo $otherVariable . "<br />";

d();

$a =5 ;

echo $a . "br />";

function e() {

    $a = 10 ;
}

e($a);

echo $a . "br />";

function f(&$a){
    $a = 10;

}

echo $a . "br />";




