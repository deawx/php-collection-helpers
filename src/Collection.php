<?php
declare(strict_types=1);
namespace CollectionHelpers;
/**
 * collection of convenience methos to deal with arrays inspired by Laravel array helpers.
 */
class Collection
{
    /**
     * Get an item from a Collection.
     * @param array $arr
     * @param string $key
     * @param string|null $default
     * @return array
     */
    public static function get(array $arr, string $key,?string $default = null): array| string| null
    {
        if(array_key_exists($key, $arr)) {
            return  $arr[$key];
        }
        if(!str_contains($key, '.')) {
            return $default;
        }

        foreach (explode('.',$key) as $piece) {
            if (is_array($arr) && array_key_exists($piece, $arr)) {
                $arr = $arr[$piece];
            } else {
                return $default;
            }
        }

        return $arr;
    }

    /**
     * Checks if an item is available in a Collection.
     * @param array $array
     * @param string $key
     * @return bool
     */
    public static function has(array $array, string $key): bool
    {
        if (array_key_exists($key, $array)) {
            return true;
        }

        if (!str_contains($key, '.')) {
            return false;
        }

        foreach (explode('.', $key) as $piece) {
            if (is_array($array) && array_key_exists($piece, $array)) {
                $array = $array[$piece];
            } else {
                return false;
            }
        }

        return true;
    }
    /**
     * Set a collection item to a given value using "dot" notation.
     * @param array $arr
     * @param string $key
     * @param string $value
     * @return array
     */
    public static function set(array &$arr, string $key,string $value): array
    {
        $keys = explode('.', $key);
        while(count($keys) > 1) {
            $key = array_shift($keys);
            // If the key doesn't exist at this depth, we will just create an empty array
            if (!isset($arr[$key]) || !is_array($arr[$key])) {
                $arr[$key] = [];
            }
            $arr = &$arr[$key];
        }
        $arr[array_shift($keys)] = $value;
        return $arr;
    }

}