# Request Sanitizer

A very lightweight PHP helper class that clean / sanitize ($_REQUEST, $_GET and $_POST) request data before inserting into the database.

## Installation

```sh
composer require rexon/request-sanitizer
```
or you can manually download the zip file [here] on github.
 [here]: <https://github.com/xrexonx/Request-Sanitizer>

##Usage

```php
<?php

//Include
require_once 'Request.php';

//Initialize
$request = new Request();

//Get request Array
$aData = $request->getArray();

//Get request Input name
$aData = [
    'name' => $request->getInput('name'),
    'address' => $request->getInput('address'),
    'number' => $request->getInput('number')
];

//Get request property name according to form data inputs
$aData = [
    'name' => $request->name,
    'address' => $request->address,
    'number' => $request->number
];

//sample method call for database insertion
User::create($aData);

```

## License
MIT © [Rexon A. De los Reyes](http://xrexonx.github.io)

Thanks and enjoy!
