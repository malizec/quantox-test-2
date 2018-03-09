<?php

function filterArray($value){
    return ($value == 2);
}

$filteredArray = array_filter($fullArray, 'filterArray');