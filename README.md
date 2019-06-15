# PHP Mock Mail

mocking `mail` function library

## Usage

```bash
$ composer require php-mock-mail
```

```php
<?php

require_once 'vendor/autoload.php';

use MockMail\MockMail;

MockMail::enable();

// load file with mail function and call function.

MockMail::disable();

var_dump(MockMail::getMails());
```

