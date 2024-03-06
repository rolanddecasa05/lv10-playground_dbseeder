<?php

namespace App\Pgmodules\Services;

use Illuminate\Support\Str;

class Playground {
    
    public function __construct(public string $currency) {}

    public function charge(int $ammount) {
        return [
            'currency' => $this->currency,
            'ammount' => $ammount,
            'code' => Str::random(5)
        ];
    }
}