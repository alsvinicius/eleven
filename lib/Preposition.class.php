<?php

Class Preposition {

    private $splitText;
    const PREPOSITION_SIZE = 5;

    public function __construct($text) {
        $this->splitText = $text;
    }

    public function isPreposition($word) {
        return (
            strlen($word) == self::PREPOSITION_SIZE &&
            !Utils::endsWithFoo($word) &&
            strpos($word, "l") === false
        );
    }

    public function countPrepositions() {
        $count = 0;

        foreach($this->splitText as $word) {
            if ($this->isPreposition($word)) $count++;
        }

        return $count;
    }
}