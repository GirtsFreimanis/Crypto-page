<?php

declare(strict_types=1);

namespace App;

use App\Models\CryptoPair;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CryptoApi
{
    private Client $client;
    private const API_URL = "https://api4.binance.com/api/v3/ticker/24hr?symbol=";

    public function __construct()
    {
        $this->client = new Client([
                "verify" => false
            ]
        );
    }

    public function fetchIndexPairs(array $indexPairs): array
    {
        $cryptoPairs = [];
        foreach ($indexPairs as $indexPair) {
            $response = $this->client->get(self::API_URL . $indexPair);
            $data = json_decode((string)$response->getBody());
            $cryptoPairs[] = new CryptoPair(
                $data->symbol,
                $data->lastPrice,
                $data->volume
            );
        }

        return $cryptoPairs;
    }

    public function search(): array
    {
        $cryptoPair = [];
        try {
            $response = $this->client->get(self::API_URL . strtoupper($_GET["symbol"]));
        } catch (GuzzleException $e) {
            return [];
        }
        $data = json_decode((string)$response->getBody());
        $cryptoPair[] = new CryptoPair(
            $data->symbol,
            $data->lastPrice,
            $data->volume
        );
        return $cryptoPair;
    }
}