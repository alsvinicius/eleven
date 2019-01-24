<?php
require_once "lib/Utils.class.php";
require_once "lib/Booglan.class.php";
require_once "textos.php";

header('Content-type: text/plain');

echo "Preposições: \n\nTexto A: {$textoA->preposition->countPrepositions()} Texto B: {$textoB->preposition->countPrepositions()}\n\n";

$verbosA = $textoA->verb->countVerbs();
$verbosB = $textoB->verb->countVerbs();

echo "Verbos: \n\nTexto A: {$verbosA['verb']} Texto B: {$verbosB['verb']}\n\n";
echo "Verbos em primeira pessoa: \n\nTexto A: {$verbosA['firstPerson']} Texto B: {$verbosB['firstPerson']}\n\n";

$textoAAlpha = implode(" ", $textoA->orderText());

echo "Texto A em ordem alfabética:\n\n{$textoAAlpha}\n\n";

$textoBAlpha = implode(" ", $textoB->orderText());

echo "Texto B em ordem alfabética:\n\n{$textoBAlpha}\n\n";

print_r(Booglan::getAlphabet());