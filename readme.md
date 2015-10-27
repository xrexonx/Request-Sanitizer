# Request Sanitizer

Request sanitizer is a helper class that clean ($_REQUEST, $_GET and $_POST) request data before inserting into the database.

## Sample Usage


```php
<?php
require_once 'Request.php';
$request = new Request();

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

//sample method call for database insertion
User::create($aData);
```

Thanks and enjoy!