<?php
declare(strict_types=1);
namespace CollectionHelpers;

use PHPUnit\Framework\TestCase;

class CollectionHasTest extends TestCase
{
    public function testWillReturnFalseIfNotAvailable()
    {
        $data = [];
        $key = 'first';
        $this->assertFalse(
            Collection::has($data, $key)
        );
        $this->assertFalse(
            collection_has($data, $key)
        );
    }
    public function testWillReturnTrueIfAvailable()
    {
        $data = [
            'first' => 'php',
            'second' => 'developer',
        ];
        $this->assertTrue(
            Collection::has($data, 'first')
        );
        $this->assertTrue(
            collection_has($data, 'first')
        );
    }
    public function testWillReturnTrueIfFoundUsingDotNotation()
    {
        $data = [
            'hi' => [
                "all" => [
                    'php' => 'developers'
                ],
            ],
        ];
        $key = "hi.all.php";
        $this->assertTrue(
            Collection::has($data, $key)
        );
        $this->assertTrue(
            collection_has($data, $key)
        );
    }
    public function testWillReturnFalseWhenDotNotationKeyNotFound()
    {
        $data = [
            'hi' => [
                "all" => [
                    'php' => 'developers'
                ],
            ],
        ];
        $key = "hi.all.laravel";
        $this->assertFalse(
            Collection::has($data, $key)
        );
        $this->assertFalse(
            collection_has($data, $key)
        );
    }


}