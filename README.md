# Constant Class for Enum

Base constant class to create constants for enum 
and different other general purposes with some other features like check exist ,get values ,get keys... etc.

## Installation

Require this package with composer:

```
composer require dharmvijay/constant-class-for-enum
```


## Usage

*Create Enum Constant Class*

```

<?php
/**
 * Created by PhpStorm.
 * User: Dharmvijay
 * Date: 27-07-2018
 * Time: 12:21 PM
 */

namespace App\Http\Enum;

use Dharmvijay\ConstantClassForEnum\BaseEnum;

class UnitTest extends BaseEnum
{
    const LATEST_API_VERSION = "v2";
}


```

*Get value by key*

```

$version = UnitTest::getValueByKey('LATEST_API_VERSION');

```

*Use constant and get Value*

```

$version = UnitTest::LATEST_API_VERSION;

```


*Check it has a specific key*

```

$version = $value = UnitTest::hasKey('LATEST_API_VERSION');

```

*Check it has a specific value*

```

$version = $value = UnitTest::hasValue('v2');

```

*Get all keys*

```

$keys = $value = UnitTest::getKeys();

```

*Get all values*

```

$values = $value = UnitTest::getValues();

```

*Get all constants with keys and values*

```

$constants = UnitTest::toDictionary();

```

*Get all constants with keys and values in ascending order by key*

```

$constants = UnitTest::getClassConstantsInAscendingOrder();

```

*Get all constants with keys and values in descending order by key*

```

$constants = UnitTest::getClassConstantsInDescendingOrder();

```

*Checks if a key exists in constant names if yes then return value else return false.*

```

$constants = UnitTest::getValueIfHasKey('LATEST_API_VERSION');

```