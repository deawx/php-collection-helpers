# Collection Helpers

A collection of convenience methods to deal with collection in php ,inspired by some of the great colllection helper functions in Laravel framework.

## Installation

Installation through composer.

```
composer require tal7aouy/collection-helpers
```

## Usage

### Static

You can choose to use only the static helper methods.

```php
use CollectionHelpers\Collection;

$result = Collection::get($data, $key, $default);
```

### Functional

If you prefer a more functional approach, some namespaced convenience methods are available as well:

```php
use function CollectionHelpers\collection_get;

$result = collection_get($data, $key, $default);
```

### Available helpers

#### Get

This helper allows you to get an item from an collection `(array)` using dot notation.

```php
$data = [
  'first' => [
  'second' => 'third',
  ],
];
Collection::get($data, 'first'); //  ['first' => 'second'];


Collection::get($data, 'first.second'); // 'third';


Collection::get($data, 'abc', 'default'); // 'default';

```

Note that `Collection::get()` can be replaced with `collection_get()` if you prefer a functional approach.

#### Has

This helper checks if an item exists in an collection `(array)` using dot notation.

```php

$data = [
  'first' => [
  'second' => 'third',
  ],
];

Collection::has($data, 'first');//  true;


Collection::has($data, 'first.second'); // true;


Collection::has($data, 'abc');// false;


```

Note that `Collection::has()` can be replaced with `collection_has()` if you prefer a functional approach.

#### Set

This helper sets a certain key in a collection to a certain value.
Dot notation can be used to create a deeply nested key.

```php
$data = [];
Collection::set($data, 'first.second', 'third');

```

`$data` now contains:

```php

[
  'first' => [
  'second' => 'third',
  ],
];

```

Note that `Collection::set()` can be replaced with `collection_set()` if you prefer a functional approach.

## Issues & Suggestions

For any issues or suggestions, please use [GitHub issues](https://github.com/tal7aouy/php-collection-helpers/issues).

## License

[MIT License](LICENSE)
