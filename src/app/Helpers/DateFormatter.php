<?php

function stringToSqlDateFormat(string $date){
    $date =  (new DateTime($date))->format('Y-m-d');
    return $date;
}
function stringToWord(string $date){
    $date =  (new DateTime($date))->format('F j, Y');
    return $date;
}