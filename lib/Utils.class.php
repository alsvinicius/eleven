<?php

Class Utils {

    private static $foo = Array("r", "t", "c", "d", "b");

    public static function strEndsWith($needle, $haystack) {
        if(strlen($haystack) == 0) return false;
        $length = strlen($needle);

        return (substr($haystack, strlen($haystack) - $length, $length) == $needle);
    }

    public static function endsWithFoo($word) {
        return (in_array(substr($word, strlen($word)-1, 1), self::$foo));
    }

    public static function startsWithFoo($word) {
        return (in_array(substr($word, 0, 1), self::$foo));
    }

}