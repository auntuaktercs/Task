<?php

use Rakibhstu\Banglanumber\NumberToBangla;

function bnNumber($amount){
    $numto = new NumberToBangla();
    $text = $numto->bnNum($amount);
    return $text;
}
