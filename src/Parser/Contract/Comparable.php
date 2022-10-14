<?php

namespace App\Parser\Contract;

interface Comparable
{
    public function equals(Comparable $other): bool;
}