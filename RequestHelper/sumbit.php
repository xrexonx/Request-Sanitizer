<?php
require_once 'Request.php';


$request = new Request();


print_r($request->getArray());
print_r($request->getInput('addres')); die;