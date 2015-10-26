<?php

require_once 'Request.php';

$request = new Request();


$aData = [
    'name' => $request->getInput('name'),
    'address' => $request->getInput('addres'),
    'number' => $request->getInput('number')
];

//or

$aData = $request->getArray();


//example insert into database
//User::create($aData);