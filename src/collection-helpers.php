<?php
namespace CollectionHelpers;

/**
 * @param array $array
 * @param string $key
 * @param string|null $default
 * @return array|string|null
 */
function collection_get(array $array, string $key, ?string $default = null):array| string| null
{
    return Collection::get($array, $key, $default);
}

/**
 * @param array $array
 * @param string $key
 * @return bool
 */
function collection_has(array $array, string $key):bool
{
    return Collection::has($array, $key);
}

/**
 * @param array $array
 * @param string $key
 * @param string $value
 * @return array
 */
function collection_set(array &$array, string $key, string $value):array
{
    return Collection::set($array, $key, $value);
}