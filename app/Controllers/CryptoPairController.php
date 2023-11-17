<?php

declare(strict_types=1);

namespace App\Controllers;

use App\CryptoApi;
use App\Response;

class CryptoPairController
{
    private CryptoApi $api;

    public function __construct()
    {
        $this->api = new CryptoApi();
    }

    public function index(): Response
    {
        $indexPairs = ["BTCUSDT", "ETHUSDT", "XRPUSDT"];
        $cryptoPairs = $this->api->fetchIndexPairs($indexPairs);
        return new Response(
            "CryptoPair/index",
            [
                "cryptoPairs" => $cryptoPairs,
                "header" => "Main"
            ]
        );
    }
}