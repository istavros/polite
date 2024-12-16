# Polite
Let's make our code polite

You can wrap any object in a Polite wrapper and ask it to perform actions politely.

## Installation

```
composer require istavros/polite
```

## Example

```php

class Myclass {
    public function performAction()
    {
        // Do something;
        return 1;
    }
}

$object = Polite::wrap(MyClass::class);

$result = $object->couldYouPlease()->performAction();

// Expected $result == 1
```
