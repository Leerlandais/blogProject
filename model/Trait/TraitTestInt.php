<?php
// JE ME SUIS DIT QU'ON UTILISE CECI SOUVENT ALORS POURQUOI PAS LE METTRE ICI ET APPEL À VOLONTE
namespace model\Trait;

trait TraitTestInt
{
    // UTILISATION DE PHP_INT_MAX POUR PERMETTRE TOUT INT AU CAS OU DE NON RECEPTION D'UN ARGUMENT POUR MAX
    protected function verifyInt (?int $testThis, $min = 0, $max = PHP_INT_MAX) : bool|string {
        if ($testThis < $min || $testThis > $max) return false;
        return true;
    }
}