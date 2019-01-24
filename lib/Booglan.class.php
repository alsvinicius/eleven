<?php
require_once "Utils.class.php";
require_once "Preposition.class.php";
require_once "Verb.class.php";

Class Booglan {

    private $originalText;
    private $splitText;
    private $orderedText;
    private static $alphabet;

    public $preposition;
    public $verb;

    public function __construct($originalText) {
        $this->originalText = $originalText;
        $this->splitText = $this->orderText = explode(" ", $originalText);
        self::setAlphabet(str_split("twhzkdfvcjxlrnqmgpsb"));

        $this->preposition = new Preposition($this->splitText);
        $this->verb = new Verb($this->splitText);
    }

    public static function getAlphabet() {
        return self::$alphabet;
    }

    public static function setAlphabet($alphabet) {
        self::$alphabet = $alphabet;
    }

    public function setOriginalText($text) {
        $this->originalText = $text;
    }

    public function orderText() {
        usort($this->orderText, array("Booglan", "booglanAlphabetCompare"));
        return $this->orderText;
    }

    private static function booglanAlphabetCompare($a, $b) {
        $a = str_split($a);
        $b = str_split($b);
        $letterIndex = 0;

        while(!empty($b[$letterIndex])) {
            if(empty($a[$letterIndex])) {
                return -1;
            }
            if($a[$letterIndex] == $b[$letterIndex]) {
                $letterIndex++;
            } else {
                return (
                        array_search($b[$letterIndex], self::getAlphabet()) 
                        > 
                        array_search($a[$letterIndex], self::getAlphabet())
                    ) ?  -1 : 1;
            }
        }

        return 1;
    }

}