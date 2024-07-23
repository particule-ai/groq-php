<?php

namespace LucianoTonet\GroqPHP;

use GuzzleHttp\Psr7\Request;

/**
 * Class Models
 * @package LucianoTonet\GroqPHP
 */
class Models
{
    private Groq $groq;

    /**
     * Models constructor.
     * @param Groq $groq
     */
    public function __construct(Groq $groq)
    {
        $this->groq = $groq;
    }

    /**
     * @return array
     */
    public function list(): array
    {
        $request = new Request('GET', $this->groq->baseUrl() . '/models', [
            'Authorization' => 'Bearer ' . $this->groq->apiKey()
        ]);

        $response = $this->groq->makeRequest($request);
        return json_decode($response->getBody()->getContents(), true);
    }
}