<?php

require_once 'Request.php';

$request = new Request();

//Sample Usage

//Get request Array
$aData = $request->getArray();

//Get request Input name
$aData = [
    'name' => $request->getInput('name'),
    'address' => $request->getInput('addres'),
    'number' => $request->getInput('number')
];

//Get request property name according to form data inputs
$aData = [
    'name' => $request->name,
    'address' => $request->addres,
    'number' => $request->number
];



//sample database insertion
//User::create($aData);