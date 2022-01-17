<?php

declare(strict_types=1);

namespace CollectionHelpers;

use PHPUnit\Framework\TestCase;

class CollectionGetTest extends TestCase
{
  public function testWillReturnDefaultIfNotAvailable()
  {
    $data = [];
    $key = "first";
    $default = "second";
    $result = Collection::get($data, $key, $default);
    $this->assertEquals($default, $result);
    $result = collection_get($data, $key, $default);
    $this->assertEquals($default, $result);
  }

  public function testWillReturnNullIfNoDefaultSpecified()
  {
    $data = [];
    $key = 'first';
    $this->assertNull(Collection::get($data, $key));
    $this->assertNull(collection_get($data, $key));
  }
  public function testWillReturnValueForKey()
  {
    $data = [
      'first' => 'php',
      'second' => 'phpunit',
    ];
    $key = 'first';
    $result = Collection::get($data, $key);
    $this->assertEquals('php', $result);
    $result = collection_get($data, $key);
    $this->assertEquals('php', $result);
  }

  public function testWillFindUsingDotNotation()
  {
    $data = [
      'hi' => [
        "all" => [
          'php' => 'developers'
        ],
      ],
    ];
    $key = "hi.all.php";
    $result = Collection::get($data, $key);
    $this->assertEquals('developers', $result);
    $result = collection_get($data, $key);
    $this->assertEquals('developers', $result);
  }
  public function testWillReturnDefaultWhenDotNotationKeyNotExist()
  {
    $data = [
      'hi' => [
        "all" => [
          'php' => 'developers'
        ],
      ],
    ];
    $key = "yes.i'm.a.developer";
    $this->assertNull(Collection::get($data, $key));
    $this->assertNull(collection_get($data, $key));
  }
}
