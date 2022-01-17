<?php
declare(strict_types=1);
namespace CollectionHelpers;

use PHPUnit\Framework\TestCase;


class CollectionSetTest extends TestCase
{
    public function testWillSetSingleValue()
    {
        $expected = ['foo' => 'bar'];

        $initial = [];
        Collection::set($initial, 'foo', 'bar');
        $this->assertEquals($expected, $initial);

        $initial = [];
        collection_set($initial, 'foo', 'bar');
        $this->assertEquals($expected, $initial);
    }
    public function testWillOverwriteExistingValue()
    {
        $initial = ['foo' => 'bar'];
        Collection::set($initial, 'foo', 'noor');
        $this->assertEquals(
            ['foo' => 'noor'],
            $initial
        );
    }
    public function testWillSetUsingDotNotation()
    {
        $initial = [];
        Collection::set($initial, "hi.all.php", 'developers');
        $this->assertEquals(
            [
                'hi' => [
                    "all" => [
                        'php' => 'developers'
                    ],
                ],
            ],
            $initial
        );
    }
    public function testWillOnlyPartiallyOverwriteUsingDotNotation()
    {
        $initial = [
            'i' => [
                "can't" => [
                    'do' => [
                        'any' => [
                            'work' => 'today',
                        ]
                    ]
                ]
            ]
        ];
        Collection::set($initial, "i.can't.go.to", 'work');
        $this->assertEquals(
            [
                'i' => [
                    "can't" => [
                        'do' => [
                            'any' => [
                                'work' => 'today',
                            ],
                        ],
                        'go' => [
                            'to' => 'work',
                        ],
                    ],
                ],
            ],
            $initial
        );
    }
}