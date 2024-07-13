<?php

namespace model\Trait;

trait TraitCleanString
{
        protected function cleanString (?string $cleanThis) : string {

        return htmlspecialchars(trim(strip_tags($cleanThis)), ENT_QUOTES);
        }
}