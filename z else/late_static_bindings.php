<?php

/* Limitations of self::
Example #1 self:: usage */

class ParentClass1
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        self::who();
    }
}

class ChildClass1 extends ParentClass1
{
    public static function who()
    {
        echo __CLASS__;
    }
}

ChildClass1::test(); // ParentClass1
echo '<hr>';

/* Late Static Bindings' usage 
Example #2 static:: simple usage */

class ParentClass2
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        static::who();
    }
}

class ChildClass2 extends ParentClass2
{
    public static function who()
    {
        echo __CLASS__;
    }
}

ChildClass2::test(); // ChildClass2