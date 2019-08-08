<?php

require_once "./exceptions/AnimalException.php";
require_once "./exceptions/MonkyException.php";
require_once "./exceptions/HumanException.php";

// exception category
$category = [
    "1" => "Animal",
    "2" => "Monky",
    "3" => "Human",
];

// throw exception function
function throw_exception($value)
{
    if ($value === '1') {
        throw new AnimalException();
    } elseif ($value === '2') {
        throw new MonkyException();
    } elseif ($value === '3') {
        throw new HumanException();
    } else {
        return $value;
    }
}

// input
echo "1:Animal\n2:Monky\n3:Human\n>>>>> ";
$stdin = trim(fgets(STDIN));

// output
if (in_array($stdin, array_keys($category))) {
    echo "$category[$stdin] exception!!!!!\n";
} else {
    echo "I cat't throw exception.....\n";
}

// result list
$result = [];

try {
    throw_exception($stdin);
} catch (AnimalException $e) {
    array_push($result, "I caught AnimalException.");
}

if ($stdin === '2'){
    try {
        throw_exception($stdin);
    } catch (MonkyException $e) {
        array_push($result, "I caught MonkyException.");
    }
} elseif ($stdin === '3') {
    try {
        throw_exception($stdin);
    } catch (HumanException $e) {
        array_push($result, "I caught HumanException.");
    }
}

// output
if (isset($result)){
    foreach($result as $value){
        echo "$value\n";
    }
}
