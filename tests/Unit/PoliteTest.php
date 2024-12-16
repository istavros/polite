<?php

declare(strict_types=1);

use Istavros\Polite\Polite;

it('tests with object instance', function () {
    $object = new class {
        public int $property = 3;

        public function test() {
            return 1;
        }
    };

    $this->assertEquals(1, Polite::make($object)->couldYouPlease()->test());
    $this->assertEquals(3, Polite::make($object)->couldYouPlease()->property);
});

it('tests with callable', function () {
    $object = function () {
        return new class {
            public int $property = 3;

            public function test() {
                return 1;
            }
        };
    };

    $this->assertEquals(1, Polite::make($object)->couldYouPlease()->test());
    $this->assertEquals(3, Polite::make($object)->couldYouPlease()->property);
});


it('tests with class name', function () {
    class MyClass {
        public int $property = 3;

        public function test() {
            return 1;
        }
    };

    $object = MyClass::class;

    $this->assertEquals(1, Polite::make($object)->couldYouPlease()->test());
    $this->assertEquals(3, Polite::make($object)->couldYouPlease()->property);
});
