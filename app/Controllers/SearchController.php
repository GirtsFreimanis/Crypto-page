<?php

declare(strict_types=1);

namespace App\Controllers;

use App\CryptoApi;
use App\Response;

class SearchController
{
    private CryptoApi $api;

    public function __construct()
    {
        $this->api = new CryptoApi;
    }

    public function search(array $vars): Response
    {
        $cryptoPairs = $this->api->search();
        if (empty($cryptoPairs)) {
            return new Response(
                "notFound",
                ["searchPair" => $_GET["symbol"]]
            );
        }
        return new Response(
            "CryptoPair/index",
            ["cryptoPairs" => $cryptoPairs]
        );

    }
}