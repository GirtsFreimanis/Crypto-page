<?php

declare(strict_types=1);

namespace App\Models;

class CryptoPair
{
    private string $symbol;
    private float $lastPrice;
    private float $volume;

    public function __construct(
        string $symbol,
        string $lastPrice,
        string $volume
    )
    {
        $this->symbol = $symbol;
        $this->lastPrice = (float)$lastPrice;
        $this->volume = (float)$volume;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getLastPrice(): float
    {
        return $this->lastPrice;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }
}