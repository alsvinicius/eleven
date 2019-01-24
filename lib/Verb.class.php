<?php

Class Verb {

    private $splitText;
    const VERB_MIN_SIZE = 8;

    public function __construct($text) {
        $this->splitText = $text;
    }

    public function isVerb($word) {
        return (
            strlen($word) >= self::VERB_MIN_SIZE &&
            !Utils::endsWithFoo($word)
        );
    }

    public function isFirstPerson($word, $checkVerb = false) {
        return (
            (!$checkVerb || $this->isVerb()) &&
            !Utils::startsWithFoo($word)
        );
    }

    public function countVerbs() {
        $count = 0;
        $countFirstPerson = 0;

        foreach($this->splitText as $word) {
            if ($this->isVerb($word)) {
                $count++;
                if($this->isFirstPerson($word)) {
                    $countFirstPerson++;
                }
            }
        }

        return Array("verb" => $count, "firstPerson" => $countFirstPerson);
    }

}