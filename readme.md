# Request Sanitizer

Request sanitizer is a helper class that clean ($_REQUEST, $_GET and $_POST) request data before inserting into the database.

## Installation

```sh
composer require rexon/request-sanitizer
```

or

add this on your *composer.json* file.
```javascript
{
    "require": {
        "rexon/request-sanitizer": "~1.0.0"
    }
}
```
Run composer update
```sh
$ composer update
```
or you can manually download the zip file [here] on github.
 [here]: <https://github.com/xrexonx/Request-Sanitizer>

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

Thanks and enjoy!
